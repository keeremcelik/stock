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
        
        if ($kullanici->id) {
            echo "<pre>";
                print_r($kullanici->id);
                print_r($kullanici->name." ".$kullanici->surname);
            echo "</pre>";
        }else{
            return redirect()->back()->with('message','hataaa');
            die;
        }
        return $next($request);
    }
}
