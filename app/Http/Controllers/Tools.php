<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tools
{
    public const UPLOAD_PATH = "uploads/";
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

    /**
     * Handle emails.
     * @param  String  $file
     * @param  String  $folder
     * @return String  $image_path
     */
    public static function upload_file_image($file,$folder){
        $image_path = rand(1,99).time().'.'.$file->extension();       
        $file->move(public_path(self::UPLOAD_PATH.$folder), $image_path);
        return $image_path;
    }
}
