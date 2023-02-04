<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Tools;

class Application
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Session::has('compte')){
            $array = [
                'location' => Tools::_urlRequest(3),
                'controller' => Tools::_urlRequest(4),
                'function' => Tools::_urlRequest(5),
            ];
            $request->attributes->add($array);
            return $next($request);
        } 
        else return redirect('/');
    }    
}
