<?php

namespace App\Http\Controllers\app\settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Contact;
use App\Traits\userSession;

class Users extends Controller
{
    use userSession;

    /* ---- BEGIN ROLES FUNCTION -----*/
    
        public function index_roles(){
            $roles = Role::select('id','name','created_at')->where('status',1)->get();
            return view('app.settings.roles.list',['roles'=>$roles]);
        }

        public function viewRole($id){
            if(isset($id) && is_numeric($id)){
                $infos = Role::where(['id'=>$id])->first();
                if($infos) return view('app.settings.roles.view',['infos'=>$infos]);
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'Server error please try again.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        public function addRole(){
            return view('app.settings.roles.add');
        }

        public function addRoleForm(Request $request){
            $inputs = $request->all();
            $role = $inputs['role'];
            if(isset($role['name']) && !empty($role['name'])){
                $check = Role::where('name',$role['name'])->where('status',1)->count();
                if($check === 0){
                    $role['status'] = 1;
                    $role['created_by'] = $this->user()->id;
                    $role['updated_by'] = $this->user()->id;
                    $add = Role::create($role);
                    if($add)  return redirect('/settings/roles/list')->with('success', 'Role Added!');
                    else return redirect()->back()->with(['error' => 'Server error please try again.']);
                }
                else return redirect()->back()->with(['error' => 'The role name is already exist.']);
            }
            else return redirect()->back()->with(['error' => 'The role name is required.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        public function deleteRole($id,$trash = false){
            if(isset($id) && is_numeric($id)){
                $role = Role::where('id',$id);
                if($role){
                    if($trash) $action = $role->delete();                
                    else{
                        $roleValue['status'] = 2;
                        $roleValue['deleted_by'] = $this->user()->id;
                        $roleValue['deleted_at'] = date('Y-m-d H:i:s');
                        $action = $role->update($roleValue);
                    }
                    if($action) return redirect('/settings/roles/list')->with('success', 'Role Deleted!');
                    else return redirect()->back()->with(['error' => 'Server error please try again.']);
                }            
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'Server error please try again.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        public function updateRole($id){
            if(isset($id) && is_numeric($id)){
                $infos = Role::where(['id'=>$id])->first();
                if($infos) return view('app.settings.roles.update',['infos'=>$infos]);
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'Server error please try again.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        function updateRoleForm(Request $request){
            $inputs = $request->all();
            $role = $inputs['role'];
            if(isset($role['name']) && !empty($role['name'])){
                $check = Role::where('name',$role['name'])->where('id','!=',$inputs['ref'])->count();
                if($check === 0){
                    $role['updated_by'] = $this->user()->id;
                    $update = Role::find($inputs['ref']);
                    $status = $update->status; 
                    $update->update($role);
                    if($update)  return redirect('/settings/roles/'.($status == 1 ? 'list' : 'trash'))->with('success', 'Role Updated!');
                    else return redirect()->back()->with(['error' => 'Server error please try again.']);
                }
                else return redirect()->back()->with(['error' => 'The role name is already exist.']);
            }
            else return redirect()->back()->with(['error' => 'The role name is required.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        public function trashRoles(){
            $roles = Role::select('id','name','deleted_at','deleted_by','created_at')->where('status',2)->get();
            return view('app.settings.roles.trash',['roles'=>$roles]);
        }

        public function backRole($id){
            if(isset($id) && is_numeric($id)){
                $role = Role::where('id',$id);
                if($role){
                    $roleValue['status'] = 1;
                    $roleValue['deleted_by'] = NULL;
                    $roleValue['deleted_at'] = NULL;
                    $action = $role->update($roleValue);
                    if($action) return redirect('/settings/roles/list')->with('success', 'Role Back!');
                    else return redirect()->back()->with(['error' => 'Server error please try again.']);
                }            
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'Server error please try again.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        } 
    /* ---- END ROLES FUNCTION  -----*/

    /* ---- BEGIN USERS FUNCTION -----*/

        public function index_users(){
            $users = User::select('id','username','contact_id','status','created_at')
                        ->with(['contact'=>function($q){
                            $q->select('id','first_name','last_name','email');
                        }])
                        ->get();
            return view('app.settings.users.list',['users'=>$users]);
        }

        public function addUser(){
            $roles = Role::select('id','name')->where('status',1)->get();
            return view('app.settings.users.add',['roles'=>$roles]);
        }

        public function addUpdUserForm(Request $request){
            $inputs = $request->all();
            $refs = isset($inputs['refs']) ? explode(',',$inputs['refs']) : [];
            $contact = $inputs['contact'];
            $user = $inputs['user'];
            if(count($refs)>0) {
                if(empty($contact['first_name']) && empty($contact['last_name']) && empty($contact['email']) && empty($user['username']) && empty($user['role_id']))
                    return redirect()->back()->with(['error' => 'Please check the requireds fields.']);                    
                $check = User::where('username',$user['username'])->where('status',1)->where('id','<>',$refs[0])->count();
            }
            else {
                if(isset($contact['first_name']) && empty($contact['last_name']) && empty($contact['email']) && empty($user['username']) && empty($user['role_id']) && empty($user['password']))
                    return redirect()->back()->with(['error' => 'Please check the requireds fields.']);
                $check = User::where('username',$user['username'])->where('status',1)->count();
            }
            if($check === 0){
                if(isset($inputs['profil_pic'])){
                    $user['profil_pic'] = Tools::upload_file_image($request->profil_pic,'users');
                }
                if(count($refs)>0) {
                    $user['updated_by'] = $this->user()->id;
                    $action = Contact::find($refs[1])->update($contact);  
                    $action = User::find($refs[0])->update($user); 
                    $url = '/settings/users/view/'.$refs[0];
                    $message = 'User updated !'; 
                }
                else{
                    $user['status'] = 1;
                    $user['created_by'] = $this->user()->id;
                    $user['updated_by'] = $this->user()->id;
                    $user['password'] = \Hash::make($user['password']);  
                    $add_contact = Contact::create($contact);  
                    $action = $add_contact->user()->create($user);
                    $url = '/settings/users/list';
                    $message = 'User Added!';
                }                
                if($action)  return redirect($url)->with('success',$message);
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'The username is already exist.']);

            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

        public function viewUser($id){
            if(isset($id) && is_numeric($id)){
                $infos = User::where(['id'=>$id])->with('contact')->first();
                if($infos == NULL) return redirect()->back()->with(['error' => 'Server error please try again.']); 
                $public_path = Tools::UPLOAD_PATH;
                $roles = Role::select('id','name')->where('status',1)->get();
                $status = User::STATUS;
                if($infos) return view('app.settings.users.view',['infos'=>$infos,'public_path'=>$public_path,'roles'=>$roles,'status'=>$status]);
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'Server error please try again.']);
            return redirect()->back()->with(['error' => 'Server error please try again.']);
        }

    /* ---- END USERS FUNCTION  -----*/
}
