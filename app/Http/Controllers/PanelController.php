<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PanelController extends Controller
{

   function index(){
        $veri = DB::table('');
        $kullanıcılar = $this->kullanıcıListesi();
        return view('panel',[
                'veri'=>$veri,
                'kullanıcılar'=>$this->kullanıcıListesi(),
                ''
            ]
        );
   }

   function kullanıcıListesi(){
        return DB::table('users')->get();
   }
   function stokliste()
}
