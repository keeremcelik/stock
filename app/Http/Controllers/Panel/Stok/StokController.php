<?php

namespace App\Http\Controllers\Panel\Stok;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StokController extends Controller{

   function listele(){
   	$liste = 1;
   		return view('panel/stok/stokGoruntule',['stokListesi' => $liste]);
   }

}
