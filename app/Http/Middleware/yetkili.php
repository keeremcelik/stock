<?php

namespace App\Http\Middleware;

use Closure;

class yetkili
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $yetki = $request->session()->get('kullanici')->authority;
       
        if ($yetki == 1) {

        }else{
            die();
        }
        //print_r($request->session()->get('kullanici')->authority == 1);
        return $next($request);
    }
}
