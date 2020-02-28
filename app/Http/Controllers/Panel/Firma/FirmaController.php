<?php

namespace App\Http\Controllers\Panel\Firma;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirmaController extends Controller{

	
	function firmaListele(){
		$firma = DB::table('companies')->where('status','=','1')->get();	
		return view('panel/other/firmalar',['firmalar'=>$firma]);
	}
	function firmaEkle(Request $request){

		$name 		= $request->input('name');
		$code 		= $request->input('code');
		$address 	= $request->input('address');
		$taxadm 	= $request->input('tax-adm');
		$taxnum 	= $request->input('tax-num');
		$autorized 	= $request->input('autorized');
		$phone 		= $request->input('phone');
		$fax 		= $request->input('fax');
		$gsm 		= $request->input('gsm');
		$web 		= $request->input('web');
		$email 		= $request->input('email');
		$ekle 		= DB::table('companies')->insertGetId([
			'name'				=>	$name,
			'code'				=>	$code,
			'address'			=>	$address,
			'tax_administration'=>	$taxadm,
			'tax_number'		=>	$taxnum,
			'autorized_name'	=>	$autorized,
			'phone'				=>	$phone,
			'fax'				=>	$fax,
			'gsm'				=>	$gsm,
			'web'				=>	$web,
			'email'				=>	$email,
			'status'			=> 1]);
		if($ekle){
			$this->firmaListele();
			return redirect('panel/firmalar');
		}
		else{
			echo "Firma Eklerken Hata oluştu.";
			
		}
	}
	function firmaGuncelle(Request $request){

		$id 		= $request->input('editid');
		$name 		= $request->input('editname');
		$code 		= $request->input('editcode');
		$address 	= $request->input('editaddress');
		$taxadm 	= $request->input('edittax-adm');
		$taxnum 	= $request->input('edittax-num');
		$autorized 	= $request->input('editautorized');
		$phone 		= $request->input('editphone');
		$fax 		= $request->input('editfax');
		$gsm 		= $request->input('editgsm');
		$web 		= $request->input('editweb');
		$email 		= $request->input('editemail');
		$guncelle 	= DB::table('companies')->where('id','=',$id)->update([
			'name'				=>	$name,
			'code'				=>	$code,
			'address'			=>	$address,
			'tax_administration'=>	$taxadm,
			'tax_number'		=>	$taxnum,
			'autorized_name'	=>	$autorized,
			'phone'				=>	$phone,
			'fax'				=>	$fax,
			'gsm'				=>	$gsm,
			'web'				=>	$web,
			'email'				=>	$email,
			'status'			=> 1]);
		if($guncelle){
			$this->firmaListele();
			return redirect('panel/firmalar');
		}
		else{
			echo "Firma bilgisi güncellenirken Hata oluştu.";
			
		}
	}
	function firmaSil($id){
	
		$guncelle 	= DB::table('companies')->where('id','=',$id)->update(['status' => 2]);
		if($guncelle){
			$this->firmaListele();
			return redirect('panel/firmalar');
		}
		else{
			echo "Firma silinirken Hata oluştu.";
			
		}
	}	
}