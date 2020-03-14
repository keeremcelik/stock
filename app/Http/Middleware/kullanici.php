<?php

namespace App\Http\Middleware;

use Closure;

class kullanici
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
        $kullanici = $request->session()->get('kullanici');
        
<<<<<<< HEAD
        if (isset($kullanici->id)) {
            echo "<pre>";
                print_r($kullanici->id);
                print_r($kullanici->name." ".$kullanici->surname);
            echo "</pre>";
=======
        if ($kullanici->id) {
           
>>>>>>> d6b7fd31b40643edec00a58b51339b52b98af0f2
        }else{
            return redirect()->back()->with('message','hataaa');
            die;
        }
        return $next($request);
    }
}
