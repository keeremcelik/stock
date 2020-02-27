<?php

namespace App\Http\Controllers\Panel\Departman;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmanController extends Controller{

	
	function departmanListele(){
		$departman = DB::table('department')->where('status','=','1')->get();

		return view('panel/other/departman',['departmanlar' => $departman]);
	}
	function departmanEkle(Request $request){

		$name = $request->input('name');
		$ekle = DB::table('department')->insertGetId(['name' => $name,"status"=> 1]);
		if($ekle){
			$this->departmanListele();
			return redirect('panel/departman');
		}
		else{
			echo "Departman Eklerken Hata oluştu.";
			
		}
	}
	function departmanGuncelle(Request $request){

		$id 		= $request->input('editid');
		$name 		= $request->input('editname');
		$guncelle 	= DB::table('department')->where('id','=',$id)->update(['name' => $name]);
		if($guncelle){
			$this->departmanListele();
			return redirect('panel/departman');
		}
		else{
			echo "Departman güncellenirken Hata oluştu.";
			
		}
	}
	function departmanSil($id){
	
		$guncelle 	= DB::table('department')->where('id','=',$id)->update(['status' => 2]);
		if($guncelle){
			$this->departmanListele();
			return redirect('panel/departman');
		}
		else{
			echo "Departman silinirken Hata oluştu.";
			
		}
	}	
}