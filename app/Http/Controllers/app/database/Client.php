<?php

namespace App\Http\Controllers\app\database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Client extends Controller
{
    public function index_clients(){
        // $users = Client::select('id','username','contact_id','status','created_at')
        //             ->with(['contact'=>function($q){
        //                 $q->select('id','first_name','last_name','email');
        //             }])
        //             ->get();
        return view('app.database.clients.list'/*,['users'=>$users]*/);
    }

    public function addClient(){
        // $roles = Role::select('id','name')->where('status',1)->get();
        return view('app.database.clients.add'/*,['roles'=>$roles]*/);
    }
}
