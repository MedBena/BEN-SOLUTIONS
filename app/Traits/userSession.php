<?php

namespace App\Traits;
use Session;

/**
 * GET USER SESSION
 */
trait userSession
{
    public function user(){
        return Session::get('compte')['data'];
    } 
}
