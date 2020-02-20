<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    function login(){
    	return view('login');
    }
    function loginIslem(Request $request){
    	if ($request->method() == 'POST') {
    		$username = $request->input('name');
    		$pass = md5($request->input('password'));

    		$kullanıcı = 
    			DB::table('users')
    						->where('username','=',$username)
    						->where('password','=',$pass)
    						->get('id');
    		if (!empty($kullanıcı)) {
    			$_SESSION['kullanıcı'] = $kullanıcı;
    			
    			return redirect('panel');
    		}
    	}else{
    		return view('login');
    	}
    }
}
