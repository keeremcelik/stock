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
		$menu = $this->menuGetir();
		/*
		echo "<pre>";
		var_dump($menu);
		echo "</pre>";
		*/
		/*
		foreach ($menu as $key => $value) {
			$menu[$value->name] = 
			DB::table('modules')->where('m_id','=',$value->id)->get();
			unset($menu[$key]);
		}
		echo "<pre>";
		print_r($menu);
		echo "</pre>";*/
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
		if ($this->kullaniciBul($request->input('editid'))) {
			$update = DB::table('users')->where('id','=',$request->input('editid'))->update(['email'=>$request->input('editname')]);
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
	
	function menuGetir(){
		$data = DB::table('modules')->select('*')->get();
		$menu = array();

		foreach ($data as $key => $value) {
			if ($value->m_id == 0) {
				$menu[$value->id]['name'] = $value->name;
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
		/*
		echo "<pre>";
		print_r($ustMenu);
		echo "</pre>";
		*/
		/*
		//echo "<select>";
		foreach ($ustMenu as $key => $value) {
		//	echo '<optgroup label="'.$value['name'].'">';
			if (is_array($value['elements'])) {
				foreach ($value['elements'] as $k => $v) {
		//			print_r($v);
		//			echo '<option>'.$v['name'].'</option>';
				}
			}
		//	echo '</optgroup>';
		}
		//echo "</select>";
*/
	}
}