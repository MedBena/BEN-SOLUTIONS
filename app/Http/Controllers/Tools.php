<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tools
{
     /**
     * Handle emails.
     * @param  String  $object
     * @param  String  $recipient
     * @param  Array   $content
     */
    public static function send_mail($object,$recipient,$content){
        \Mail::send('email', $content, function ($message) use ($object,$recipient) {
            // $message->from("contact@psyphone.ma",'Psyphone');
            $message->to($recipient)->subject($object);
        }); 
    }

    /**
     * Handle an incoming request url by passing position and return parametre.
     * 3 => location
     * 4 => controller
     * 5 => function
     * @param  Int  $position
     * @return String $parametre
     */
    public static function _urlRequest($position){
        $url = explode('/',url()->current());   
        if(array_key_exists($position,$url)) return $url[$position];
        else return NULL;
          
    }
}
