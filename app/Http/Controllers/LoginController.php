<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    function login(){
    	return view('login');
    }
    function loginIslem(Request $request){
    	if ($request->method() == 'POST') {
    		$username = $request->input('name');
    		$pass = md5($request->input('password'));

    		$kullanici = 
    			DB::table('users')
    						->where('email','=',$username)
    						->where('password','=',$pass)
    						->get()->first();
                            echo "<pre>";
                            print_r($kullanici);
                            echo "</pre>";
            if (!empty($kullanici)) {
                Log::info('Kullanıcı Giriş Yaptı. ID = '.$kullanici->id);
    			$request->session()->put('kullanici',$kullanici);
    			return redirect('panel');
    		}else{
                return redirect('/');
            }
    	}else{
    		return view('login');
    	}
    }
}
