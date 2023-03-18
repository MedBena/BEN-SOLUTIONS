<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools;
use Illuminate\Http\Request;
use App\Models\User;
 
class Authentification extends Controller
{ 

    public function authentification(Request $request){
       $inputs = $request->all();
       $username = trim($inputs['username']);
       $password = trim($inputs['password']);
       if(!empty($username) and !empty($password)) return $this->_auth($username,$password);
       else return json_encode(['errors' => "The username and password is required."],JSON_UNESCAPED_UNICODE);     
    }

    public function forgotPassword(Request $request){
        $inputs = $request->all();
        $email = trim($inputs['email']);
        if(isset($email) && !empty($email)){
            $check = User::select('id','contact_id')
                           ->whereHas('contact',function($q) use ($email){
                                $q->select('id','email')->where('email',$email);
                           })->first();
            if($check === NULL) return json_encode(['errors' => ["field"=>"email","msg"=>"This email does not exist."]],JSON_UNESCAPED_UNICODE);
            $user['remember_token'] = (string) \Str::uuid();
            $update = User::find($check->id)->update($user);
            if($update){
                $data =[
                    "data"=>[
                        "p1"=>["title"=>"Reset your Ben Solutions password",
                        "content"=>[
                            'Hello',
                            "We've received a request to reset the password for the Ben Solutions account associated with ".$check->contact->email.". No changes have been made to your account yet.",
                            "You can reset your password by clicking the link below:",
                            '<a href="'.url('reset-password/'.$user['remember_token']).'">LINK</a>',
                            "If you did not request a new password,please let us know immediately by replying to this email.",
                            "You can find answers to most questions and get in touch with us at 'bensolution.ma'. We're here to help you at any step along the way.",
                            "BEN SOLUTIONS TEAM"
                        ]
                    ],
                ]]; 
                Tools::send_mail("Reset your Ben Solutions password",$check->contact->email,$data);
                return json_encode(['success' => true],JSON_UNESCAPED_UNICODE);     
            }
            
        }
        else return json_encode(['errors' => "The email is required."],JSON_UNESCAPED_UNICODE);     
    }
    public function log_out(){
        request()->session()->forget('compte');
        return redirect('/');
    }

    public function resetPasswordView($token){
        if(isset($token) && $token != NULL && $token != ""){
            $check = User::where('remember_token',$token)->count();
            if($check == 1){
                $retour = ['check' => true , 'token'=>$token];
            }
            else $retour = ['check' => false , 'token'=>$token];
            return view('reset-password',$retour);
        }
        else return "ERROR EMPTY";
    }

    public function resetPassword(Request $request){
        $inputs = $request->all();
        $new_password = trim($inputs['new_password']);
        $confirm_password = trim($inputs['confirm_password']);
        $token = trim($inputs['token']);
        if(isset($new_password) && isset($confirm_password) && isset($token)){
            if($new_password === $confirm_password){
                $user = [
                    "password" => \Hash::make($new_password),
                    "remember_token" => NULL
                ];
                $update = User::where('remember_token',$token)->update($user);
                if($update) return $this->_auth($this->_getUserAccesById($update),$new_password);
                else return json_encode(['errors' => "Server error ! Please try again."],JSON_UNESCAPED_UNICODE);  
            } 
            else return json_encode(['errors' => ["field"=>"confirm-password-input","msg"=>"Please enter a correct confirm password."]],JSON_UNESCAPED_UNICODE);  
        }
        else return json_encode(['errors' => "Server error ! Please try again."],JSON_UNESCAPED_UNICODE);  
    }

    function _getUserAccesById($id){
        return User::select('username')->where('id',$id)->first()->username;
    }

    function _auth($username,$password){
        $validate = User::where('username',$username)
                            ->with('contact','role')
                            ->first();
        if($validate==NULL) return json_encode(['errors' => ["field"=>"username","msg"=>"The username is incorrect."]],JSON_UNESCAPED_UNICODE);            
        if($validate && \Hash::check($password,$validate->password)){    
            if(isset($inputs['remember']) && $inputs['remember'] === "remember"){
                \Cookie::queue('username', $username, 1440*60); // 3 Month
                \Cookie::queue('password', $password, 1440*60); // 3 Month
            }           
            $array = [
                "data" => $validate
            ];
            request()->session()->put('compte',$array);    
            $response = ['success' => "Welcome back"];  
            return json_encode($response,JSON_UNESCAPED_UNICODE);              
        }
        else return json_encode(['errors'=> ["field"=>"password","msg"=>"The password is incorrect."]],JSON_UNESCAPED_UNICODE);  
    }
}
