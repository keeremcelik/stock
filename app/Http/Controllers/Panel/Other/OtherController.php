<?php

namespace App\Http\Controllers\Panel\Other;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherController extends Controller{

	
	function departmanListele(){
		$departman = DB::table('department')->where('status','=','1')->get();
		return view('panel/other/departman',['departmanlar' => $departman]);
	}

	function depoListele(){
		$depo = DB::table('stores')->where('status','=','1')->get();	
		return view('panel/other/depo',['depolar' => $depo]);
	}

	function firmaListele(){
		$firma = DB::table('companies')->where('status','=','1')->get();	
		return view('panel/other/firmalar',['firmalar'=>$firma]);
	}

	function mcinsiListele(){
		$mcinsi = DB::table('m_type')->where('status','=','1')->get();	
		return view('panel/other/mcinsi',['mcinsleri'=>$mcinsi]);
	}

	function mgrupListele(){
		$mgrup = DB::table('m_class')->where('status','=','1')->get();	
		return view('panel/other/mgrup',['mgrupları'=>$mgrup]);
	}

	function olcubirimListele(){
		$olcubirim = DB::table('m_unit')->where('status','=','1')->get();	
		return view('panel/other/olcubirim',['olcubirimleri'=>$olcubirim]);
	}
	
	function urunlerListele(){
		$urun = DB::table('products')->where('status','=','1')->get();	
		return view('panel/other/urunler',['urunler'=>$urun]);
	}

	
}