<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PanelController extends Controller
{

   function index(){
        $urunSayi = DB::table('products')->count();
        $kullaniciSayi = DB::table('users')->count();
        $kullanıcılar = $this->kullaniciListesi();
        return view('panel',[
                'urunSayi'=>$urunSayi,
                'kullaniciSayi'=>$kullaniciSayi,
                'kullanıcılar'=>$this->kullaniciListesi(),
                'kullanici' => session('kullanici'),
            ]
        );
   }

   function kullaniciListesi(){
        return DB::table('users')->get();
   }
   function stokliste(){}
}
