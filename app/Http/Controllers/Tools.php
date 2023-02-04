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

    /**
     * Handle emails.
     * @param  String  $file
     * @param  String  $path
     * @return String  $image_path
     */
    public static function upload_file_image($request,$file,$path){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image')->store('image', $path);
        
        return $image_path;
    }
}
