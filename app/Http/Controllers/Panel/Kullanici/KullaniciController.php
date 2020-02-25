<?php

namespace App\Http\Controllers\Panel\Kullanici;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KullaniciController extends Controller{

	
	function kullaniciEkle(){
		return view('panel/kullanici/ekle');
	}

	function kullaniciGuncelle(){
		return view('panel/kullanici/guncelle');
	}

	function kullaniciSil(){
		return view('panel/kullanici/sil');
	}

	

	
}