<?php

namespace App\Http\Controllers\Panel\Kullanici;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KullaniciController extends Controller{
	private $baseViewUrl = 'panel/kullanici/listele';
	private $reUrl = 'panel/kullanici';

	function kullaniciListele(){
		$liste = DB::table('users')->where('status','=','1')->get();
		$menu = $this->menuGetir();
		return view($this->baseViewUrl,['kullanicilar' => $liste,'menu'=>$menu]);
	}
	
	function kullaniciEkle(Request $request){
		$name = $request->input('name');
		$surname = $request->input('lastname');
		$email = $request->input('email');
		$phone = $request->input('phone');
		$password = $request->input('password');
		$repassword = $request->input('repassword');
		if ($password === $repassword) {
			$pass = md5($password);
			$ekle = DB::table('users')->insertGetId([
							'email'=>$email,
							'name'=>$name,
							'surname'=>$surname,
							'phone'=>$phone,
							'dep_id'=>1,
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
		$id = $request->input('editid');
		$name = $request->input('editname');
		$surname = $request->input('editlastname');
		$email = $request->input('editemail');
		$phone = $request->input('editphone');
		
		if ($this->kullaniciBul($id)) {
			$update = DB::table('users')
				->where('id','=',$id)
				->update([
					'email'=> $email,
					'name' => $name,
					'surname' => $surname,
					'phone' => $phone
				]);
			if ($update) {
				$data = ['status' => 'success','message'=>'Kullanıcı Başarıyla Güncellendi.'];	
			}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Güncellenemedi.'];
			}	
		}else{
			$data = ['status' => 'danger','message'=>'Kullanıcı Bulunamadı!'];
		}
			return $this->yonlendir($this->reUrl,$data);
	}

	function kullaniciYetkilendir(Request $request){
		$modul = $request->input('modul');
		$ekle = $request->input('ekle');
		$sil = $request->input('sil');
		$guncelle = $request->input('guncelle');
		$listele = $request->input('listele');
		$id = $request->input('yetkiId');
		
		if ($this->kullaniciBul($id)) {
			$oldAuth = json_decode($this->kullaniciBul($id)->authority);
			$authority = $oldAuth ? $oldAuth : new \stdClass();
			$authority->$modul = array(
				$ekle,
				$sil,
				$guncelle,
				$listele,
			);
			if (empty(array_filter($authority->$modul))) {
				unset($authority->$modul);
			}
			$authority = json_encode($authority);
			
			$update = DB::table('users')
					->where('id','=',$id)
					->update(['authority'=>$authority]);
			
			if ($update) {
				$data = ['status' => 'success','message'=>'Kullanıcı Başarıyla Güncellendi.'];	
			}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Güncellenemedi.'];
			}	
		}else{
				$data = ['status' => 'danger','message'=>'Kullanıcı Bulunamadı.'];
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
	function kullaniciYetkiBul(Request $request){
		$id = $request->input('id');
		$auth = $request->input('auth');
		$veri = DB::table('users')->where('id','=',$id)->where('status','=',1)->get('authority')->first()->authority;
		$veri = json_decode($veri);
		
		if (isset($veri->$auth)) {
			return response()->json($veri->$auth);
		}else{
			return response()->json(array(0,0,0,0));
		}
		
		return;
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
	
	function menuGetir(){
		$data = DB::table('modules')->select('*')->get();
		$menu = array();

		foreach ($data as $key => $value) {
			if ($value->m_id == 0) {
				$menu[$value->id]['name'] = $value->name;
				$menu[$value->id]['id'] = $value->id;
				$m_name = $value->name;
			}else{
				$menu[$value->m_id]['elements'][] = array(
					'id'=>$value->id,
					'url'=>$value->url,
					'name'=>$value->name
				);
			}
		}
		return $menu;
	}
}