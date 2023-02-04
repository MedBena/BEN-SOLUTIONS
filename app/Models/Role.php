<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Role extends Model
{
    use HasFactory;
    protected $guarded = array();   

    public function createdBy(){
        return $this->created_by != NULL ? ucfirst(User::where('id',$this->created_by)->select('username')->first()->username) : "-";
    }

    public function updatedBy(){
        return $this->updated_by != NULL ? ucfirst(User::where('id',$this->updated_by)->select('username')->first()->username) : "-";
    }

    public function deletedBy(){
        return $this->deleted_by != NULL ? ucfirst(User::where('id',$this->deleted_by)->select('username')->first()->username) : "-";
    }
}
