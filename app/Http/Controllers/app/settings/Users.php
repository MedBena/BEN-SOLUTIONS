<?php

namespace App\Http\Controllers\app\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
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

    public function addUserForm(){
        $inputs = $request->all();
        $contact = $inputs['contact'];
        $user = $inputs['user'];
        if(isset($contact['first_name']) && !empty($contact['last_name']) && !empty($contact['email']) && !empty($user['username']) && !empty($user['role_id']) && !empty($user['password'])){
            $check = User::where('username',$user['username'])->where('status',1)->count();
            if($check === 0){
                $user['status'] = 1;
                $user['created_by'] = $this->user()->id;
                $user['updated_by'] = $this->user()->id;
                $add = Role::create($role);
                if($add)  return redirect('/settings/roles/list')->with('success', 'Role Added!');
                else return redirect()->back()->with(['error' => 'Server error please try again.']);
            }
            else return redirect()->back()->with(['error' => 'The username is already exist.']);
        }
        else return redirect()->back()->with(['error' => 'Please check the requireds fields.']);
        return redirect()->back()->with(['error' => 'Server error please try again.']);
    }

    /* ---- END USERS FUNCTION  -----*/
}
