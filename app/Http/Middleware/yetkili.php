<?php

namespace App\Http\Middleware;

use Closure;

class yetkili{
/**
* Handle an incoming request.
*
* @param  \Illuminate\Http\Request  $request
* @param  \Closure  $next
* @return mixed
*/
	public function handle($request, Closure $next){
		if ($request) {
			$path = $request->path();
			$d = explode('/', $path);
			unset($d[2]);
			$path = implode('/',$d);
			$links = isset($request->session()->get('kullanici')->links) ? $request->session()->get('kullanici')->links : array() ;
			if (in_array($path, $links)) {
				return $next($request);
			}else{
				return redirect('panel');
			}
		}
	}
}