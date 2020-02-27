<?php

namespace App\Http\Controllers\Panel\Depo;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepoController extends Controller{



	function depoBul($id){
		$depo = DB::table('stores')->where('id','=',$id)->get('id');
		return $depo;
	}

	function depoEkle(Request $request){
		$code = $request->input('code');
		$name = $request->input('name');
		$ekle = DB::table('stores')->insertGetId(['name'=>$name,'code'=>$code,'status'=> '1']);
		if ($ekle) {
			return redirect('panel/depo');
		}else{
			echo "depo eklerken hata olustu!";
			exit();
		}
	}

	function depoSil($id){
		if ($this->depoBul($id)) {
			$sil = DB::table('stores')->where('id','=',$id)->update(['status'=>'2']);
			if ($sil) {
				return redirect('panel/depo');
			}else{
				echo "silerken hata olustu";
				exit();
			}
		}
	}

	function depoListele(){
		$depo = DB::table('stores')->where('status','=','1')->get();	
		return view('panel/other/depo',['depolar' => $depo]);
	}

	function depoGuncelle(Request $request){

		$id = $request->input('editid');
		$code = $request->input('editcode');
		$name = $request->input('editname');
		if ($id && $this->depoBul($id)) {
			$guncelle = DB::table('stores')->where('id','=',$id)->update(['code'=>$code,'name'=>$name]);
			if ($guncelle) {
				print_r("guncelleme basarılı");
				return redirect('/panel/depo');
			}else{
				print_r("güncelleme hatalı");
			}
		}
	}
}