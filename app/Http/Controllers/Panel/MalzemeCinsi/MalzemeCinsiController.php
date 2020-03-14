<?php

namespace App\Http\Controllers\Panel\MalzemeCinsi;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MalzemeCinsiController extends Controller{



	function malzemeCinsiBul($id){
		return DB::table('m_type')->where('id','=',$id)->get('id');
	}

	function malzemeCinsiEkle(Request $request){
		$classid = $request->input('classid');
		$name = $request->input('name');
		$ekle = DB::table('m_type')->insertGetId(['c_id'=>$classid,'name'=>$name,'status'=> '1']);
		if ($ekle) {
			return redirect('panel/mcinsi');
		}else{
			echo "malzeme cinsi eklerken hata olustu!";
			exit();
		}
	}

	function malzemeCinsiSil($id){
		if ($this->malzemeCinsiBul($id)) {
			$sil = DB::table('m_type')->where('id','=',$id)->update(['status'=>'2']);
			if ($sil) {
				return redirect('panel/mcinsi');
			}else{
				echo "silerken hata olustu";
				exit();
			}
		}
	}

	function malzemeCinsiListele(){
		$cinsler = DB::table('m_type')->join('m_class','m_type.c_id','=','m_class.id')->select('m_type.*','m_class.name as cname')->where('m_type.status','=','1')->get();
		$mgruplari = DB::table('m_class')->where('status','=','1')->get();
		return view('panel/other/mcinsi',['mcinsleri' => $cinsler,'mgruplari' => $mgruplari]);
	}

	function malzemeCinsiGuncelle(Request $request){

		$id = $request->input('editid');
		$name = $request->input('editname');
		if ($id && $this->malzemeCinsiBul($id)) {
			$guncelle = DB::table('m_type')->where('id','=',$id)->update(['name'=>$name]);
			if ($guncelle) {
				print_r("guncelleme basarılı");
				return redirect('/panel/mcinsi');
			}else{
				print_r("güncelleme hatalı");
			}
		}
	}
}