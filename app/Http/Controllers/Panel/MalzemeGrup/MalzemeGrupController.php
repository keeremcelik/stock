<?php

namespace App\Http\Controllers\Panel\MalzemeGrup;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MalzemeGrupController extends Controller{

	
	function malzemeGrupListele(){
		$mgrup = DB::table('m_class')->where('status','=','1')->get();	
		return view('panel/other/mgrup',['mgrupları'=>$mgrup]);

	}
	function malzemeGrupEkle(Request $request){

		$code = $request->input('code');
		$name = $request->input('name');
		$description = $request->input('description');
		$ekle = DB::table('m_class')->insertGetId(['code'=>$code,'name' => $name,'description' => $description,'status'=> 1]);
		if($ekle){
			$this->malzemeGrupListele();
			return redirect('panel/mgrup');
		}
		else{
			echo "Malzeme Grubu Eklerken Hata oluştu.";
			
		}
	}
	function malzemeGrupGuncelle(Request $request){

		$id 		= $request->input('editid');
		$code 		= $request->input('editcode');
		$name 		= $request->input('editname');
		$description 		= $request->input('editdescription');
		$guncelle 	= DB::table('m_class')->where('id','=',$id)->update(['code'=>$code,'name' => $name,'description' => $description]);
		if($guncelle){
			$this->malzemeGrupListele();
			return redirect('panel/mgrup');
		}
		else{
			echo "Malzeme Grubu güncellenirken Hata oluştu.";
			
		}
	}
	function malzemeGrupSil($id){
	
		$guncelle 	= DB::table('m_class')->where('id','=',$id)->update(['status' => 2]);
		if($guncelle){
			$this->malzemeGrupListele();
			return redirect('panel/mgrup');
		}
		else{
			echo "Malzeme Grubu silinirken Hata oluştu.";
			
		}
	}	
}