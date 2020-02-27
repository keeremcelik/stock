<?php

namespace App\Http\Controllers\Panel\OlcuBirim;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OlcuBirimController extends Controller{

	
	function olcubirimListele(){
		$olcubirim = DB::table('m_unit')->where('status','=','1')->get();	
		return view('panel/other/olcubirim',['olcubirimleri'=>$olcubirim]);
	}
	function olcubirimEkle(Request $request){

		$name = $request->input('name');
		$ekle = DB::table('m_unit')->insertGetId(['name' => $name,"status"=> 1]);
		if($ekle){
			$this->olcubirimListele();
			return redirect('panel/olcubirim');
		}
		else{
			echo "Ölçü birimi Eklerken Hata oluştu.";
			
		}
	}
	function olcubirimGuncelle(Request $request){

		$id 		= $request->input('editid');
		$name 		= $request->input('editname');
		$guncelle 	= DB::table('m_unit')->where('id','=',$id)->update(['name' => $name]);
		if($guncelle){
			$this->olcubirimListele();
			return redirect('panel/olcubirim');
		}
		else{
			echo "Ölçü birimi güncellenirken Hata oluştu.";
			
		}
	}
	function olcubirimSil($id){
	
		$guncelle 	= DB::table('m_unit')->where('id','=',$id)->update(['status' => 2]);
		if($guncelle){
			$this->olcubirimListele();
			return redirect('panel/olcubirim');
		}
		else{
			echo "Ölçü birimi silinirken Hata oluştu.";
			
		}
	}	
}