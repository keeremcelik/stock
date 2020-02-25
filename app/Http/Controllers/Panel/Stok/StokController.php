<?php

namespace App\Http\Controllers\Panel\Stok;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StokController extends Controller{

	function liste(){
		$urunler = DB::table('stock')->where('status','=','1')->get();
		/*echo "<pre>";
		print_r($urunler);
		echo "</pre>";
		*/
		return view('panel/stok/stokGoruntule',['stoklar' => $urunler]);
	}

	function stokGiris(){
		return view('panel/stok/stokGiris');
	}

	function stokCikis(){
		return view('panel/stok/stokCikis');
	}

	function stokEkle(){
		return view('panel/stok/stokEkle');
	}

   function stokGuncellemeView(){

   		return view('panel/stok/stokDegisim');
   }

   function stokGuncellemeIslem(){

   	DB::table('')->insert();
   }
}