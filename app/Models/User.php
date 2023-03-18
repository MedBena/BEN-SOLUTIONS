<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded = array(); 
    
    public const STATUS = [
        'active' => 1,
        'deleted' => 2,
        'deactivated' => 3,
        'default' => NULL
    ];
    
    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function get_statut(){
        if($this->status === self::STATUS['active']) return '<span class="badge badge-soft-success">Active</span>';
        else if($this->status ===  self::STATUS['deleted']) return '<span class="badge badge-soft-danger">Deleted</span>';
        else if($this->status ===  self::STATUS['deactivated']) return '<span class="badge badge-soft-danger">Deactivated</span>';
        else return NULL;
    }
}
