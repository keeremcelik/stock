<?php

namespace App\Http\Controllers\Panel\Kullanici;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KullaniciController extends Controller{
	private $baseViewUrl = 'panel/kullanici/listele';
	private $reUrl = 'panel/kullanici/liste';

	function kullaniciListele(){
		$liste = DB::table('users')->where('status','=','1')->get();
		return view($this->baseViewUrl,['kullanicilar' => $liste]);
	}
	
	function kullaniciEkle(Request $request){
		$name = $request->input('name');
		$password = $request->input('password');
		$repassword = $request->input('repassword');
		if ($password === $repassword) {
			$pass = md5($password);
			$ekle = DB::table('users')->insertGetId([
							'username'=>$name,
							'password'=>$pass,
							'status'=> 1,
							'authority'=> 0	
			]);
			if ($ekle) {
				$data = ['status' => 'success','message'=>'Kullanıcı Başarıyla Eklendi.'];
			}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Eklenemedi. Sorgu Hatası.'];
			}
		}else{
			$data = ['status' => 'danger','message'=>'Kullanıcı Eklenemedi. Parolalar Eşleşmiyor.'];
		}
		return $this->yonlendir($this->reUrl,$data);
	}

	function kullaniciGuncelle(Request $request){
		if ($this->kullaniciBul($request->input('editid'))) {
			$update = DB::table('users')->where('id','=',$request->input('editid'))->update(['username'=>$request->input('editname')]);
			if ($update) {
				$data = ['status' => 'success','message'=>'Kullanıcı Başarıyla Güncellendi.'];	
			}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Güncellenemedi.'];
			}	
		}
		return $this->yonlendir($this->reUrl,$data);
	}

	function kullaniciSil($id){
		if ($this->kullaniciBul($id)) {
			$update = DB::table('users')->where('id','=',$id)->update(['status'=>2]);
			if ($update) {
				$data = ['status' => 'success','message'=>'Kullanıcı Başarıyla Silindi.'];
			}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Silinemedi.'];
			}
		}
		return $this->yonlendir($reUrl,$data);
	}

	function kullaniciBul($id){
		return DB::table('users')->where('id','=',$id)->where('status','=',1)->first();
	}
	
	function pr($string){
		echo "<pre>";
		print_r($string);
		echo "</pre>";
		exit();
	}

	function yonlendir($url,$data){
		return redirect($url)->with($data);
	}
	
}