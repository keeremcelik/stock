<?php

namespace App\Http\Controllers\Panel\Urun;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrunController extends Controller{



	function urunBul($id){
		return DB::table('products')->where('id','=',$id)->get('id');
	}

	function urunEkle(Request $request){
		echo "<pre>";
		print_r($request->input());
		echo "</pre>";
		if (!empty($request->file('urunImg')) && $img = $this->imgUpload($request->file('urunImg'))) {
			echo "img yüklendi";
		}else{
			$img = "default.jpg";
		}
		$type = $request->input('type');
		$code = $request->input('code');
		$name = $request->input('name');
		$ekle = DB::table('products')->insertGetId(['code'=>$code,'name'=>$name,'type'=>$type,'img'=>$img,'status'=> '1']);
		if ($ekle) {
			return redirect('panel/urunler');
		}else{
			echo "malzeme cinsi eklerken hata olustu!";
			exit();
		}
	}
	
	function imgUpload($file){
		$name = $file->getClientOriginalName();
		if ($path = $file->storeAs('public/img',$name)) {
			return $name;
		}else{
			echo "resim yüklemede hata olustu";
			return false;
		}

		print_r($name);
		echo "<pre>";
		print_r($file);
		echo "</pre>";
	}


	function urunSil($id){
		if ($this->urunBul($id)) {
			$sil = DB::table('products')->where('id','=',$id)->update(['status'=>'2']);
			if ($sil) {
				return redirect('panel/urunler');
			}else{
				echo "silerken hata olustu";
				exit();
			}
		}
	}

	function urunListele(){
		$urunler = DB::table('products')->join('m_type','m_type.id','=','products.type')->select('products.*','m_type.name as typename')->where('products.status','=','1')->get();
		$types = DB::table('m_type')->where('status','=','1')->get();
		return view('panel/other/urunler',['urunler' => $urunler,'mgrup'=>$types]);
	}

	function urunGuncelle(Request $request){

		$id = $request->input('editid');
		$name = $request->input('editname');
		$type = $request->input('edittype');
		$code = $request->input('editcode');
		if ($id && $this->urunBul($id)) {
			$guncelle = DB::table('products')->where('id','=',$id)->update(['name'=>$name,'code'=>$code,'type'=>$type]);
			if ($guncelle) {
				print_r("guncelleme basarılı");
				return redirect('/panel/urunler');
			}else{
				print_r("güncelleme hatalı");
			}
		}
	}


}