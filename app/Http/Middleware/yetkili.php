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
<<<<<<< HEAD
            echo "<br>";
            echo "yekili bey";
=======
          
>>>>>>> d6b7fd31b40643edec00a58b51339b52b98af0f2
        }else{
            die();
        }
        //print_r($request->session()->get('kullanici')->authority == 1);
        return $next($request);
    }
}
