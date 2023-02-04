<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded = array();     
    
    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function get_statut(){
        if($this->status === 1) return '<span class="badge badge-soft-success">Active</span>';
        else if($this->status === 2) return '<span class="badge badge-soft-danger">Deleted</span>';
        else return '<span class="badge badge-soft-warning">Deactivated </span>';
    }
}
