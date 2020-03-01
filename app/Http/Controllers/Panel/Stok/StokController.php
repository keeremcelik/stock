<?php

namespace App\Http\Controllers\Panel\Stok;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StokController extends Controller{

	function stokListele(){
		$urunler = DB::table('stock')->join('products','products.id','=','stock.p_id')->select('stock.*','products.name as pname')->where('stock.status','=','1')->get();
	
		/*
		echo "<pre>";
		print_r($urunler);
		echo "</pre>";
		exit();*/
		return view('panel/stok/goruntule',['stoklar' => $urunler]);
	}

	function stokGirisCikisGoruntule($islem){
		
		$stoklar 		= DB::table('stock')->where('status','=','1')->get();
		$departmanlar	= DB::table('department')->where('status','=','1')->get();
		$depolar 		= DB::table('stores')->where('status','=','1')->get();
		if($islem =="giris"){

			return view('panel/stok/giris',['stoklar'=>$stoklar,'departmanlar'=>$departmanlar,'depolar'=>$depolar]);	
		}
		else if($islem =="cikis"){
			return view('panel/stok/cikis',['stoklar'=>$stoklar,'departmanlar'=>$departmanlar,'depolar'=>$depolar]);
		}
		
	}

	function stokGiris(Request $request){
		$stok 		= $request->input('stoklar');
		$departman	= $request->input('departmanlar');
		$depo 	 	= $request->input('stores');
		$miktar 	= $request->input('piece');
		$fiyat 		= $request->input('unitprice');
		$aciklama 	= $request->input('description');
		$date		= date('Y.m.d H:i:s');

		$yenistok = DB::table('plugs')->insertGetId([
			'stock_id'=> $stok,
			'dep_id'=> $departman,
			'st_id'=> $depo,
			'amount'=> $miktar,
			'unit_price'=> $fiyat,
			'description'=> $aciklama,
			'plug_date'=> $date,
			'type'=> 1,
			'status'=> 1
		]);


		if($yenistok){
			$guncelle 	= DB::table('stock')->where('id','=',$stok)->increment('piece', $miktar);
			if($guncelle){
				$this->stokListele();
				return redirect('panel/stok');
			}
			else{
			echo "Stok miktarı güncellenirken Hata oluştu.";			
			}
		}
		else{
			echo "Stok girişi yaparken Hata oluştu.";			
		}
		
	}
	function stokCikis(Request $request){
		$stok 		= $request->input('stoklar');
		$departman	= $request->input('departmanlar');
		$depo 	 	= $request->input('stores');
		$miktar 	= $request->input('piece');
		$fiyat 		= $request->input('unitprice');
		$aciklama 	= $request->input('description');
		$date		= date('Y.m.d H:i:s');

		$yenistok = DB::table('plugs')->insertGetId([
			'stock_id'=> $stok,
			'dep_id'=> $departman,
			'st_id'=> $depo,
			'amount'=> $miktar,
			'unit_price'=> $fiyat,
			'description'=> $aciklama,
			'plug_date'=> $date,
			'type'=> 2,
			'status'=> 1
		]);


		if($yenistok){
			$guncelle 	= DB::table('stock')->where('id','=',$stok)->decrement('piece', $miktar);
			if($guncelle){
				$this->stokListele();
				return redirect('panel/stok');
			}
			else{
			echo "Stok miktarı güncellenirken Hata oluştu.";			
			}
		}
		else{
			echo "Stok girişi yaparken Hata oluştu.";			
		}
	}

	function stokEkleGoruntule(){
		$urunler 	= DB::table('products')->where('status','=','1')->get();
		$depolar 	= DB::table('stores')->where('status','=','1')->get();
		$olcubirimi = DB::table('m_unit')->where('status','=','1')->get();
		return view('panel/stok/ekle',['urunler' => $urunler,'depolar' => $depolar,'olcubirimleri' => $olcubirimi]);
	}
	function stokEkle(Request $request){
		$kod 		= $request->input('code');
		$ukod 		= $request->input('products');
		$barkod 	= $request->input('barcode');
		$obirim 	= $request->input('obirim');
		$depo 		= $request->input('stores');
		$raf 		= $request->input('shelfnum');
		$goz 		= $request->input('subshelfnum');
		$kritik 	= $request->input('critical');
		$alis 		= $request->input('buying');
		$satis 		= $request->input('sales');
		$kdv 		= $request->input('kdv');
		$aciklama 	= $request->input('description');
		$date		= date('Y.m.d H:i:s');

		$yenistok = DB::table('stock')->insertGetId([
			'code'=> $kod,
			'p_id'=> $ukod,
			'barkod'=> $barkod,
			'm_id'=> $obirim,
			's_id'=> $depo,
			'shelf_number'=> $raf,
			'sub_shelf'=> $goz,
			'critical'=> $kritik,
			'buying'=> $alis,
			'sales'=> $satis,
			'kdv'=> $kdv,
			'description'=> $aciklama,
			'last_order_date'=> $date,
			'status'=> 1
		]);
		if($yenistok){
			$this->stokListele();
			return redirect('panel/stok');
		}
		else{
			echo "Stok Eklerken Hata oluştu.";			
		}
		
	}
   function stokGuncellemeView(){

   		return view('panel/stok/stokDegisim');
   }

   function stokGuncellemeIslem(){

   }
}