<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 						'LoginController@login');
Route::post('/', 						'LoginController@loginIslem');

Route::get('/panel', 					'PanelController@index');

Route::get('/panel/departman/sil/{id}','Panel\Departman\DepartmanController@departmanSil');
Route::post('/panel/departman/ekle',	'Panel\Departman\DepartmanController@departmanEkle');
Route::post('/panel/departman/guncelle','Panel\Departman\DepartmanController@departmanGuncelle');
Route::get('/panel/departman', 			'Panel\Departman\DepartmanController@departmanListele');

Route::get('/panel/olcubirim/sil/{id}',	'Panel\OlcuBirim\OlcuBirimController@olcubirimSil');
Route::post('/panel/olcubirim/ekle',	'Panel\OlcuBirim\OlcuBirimController@olcubirimEkle');
Route::post('/panel/olcubirim/guncelle','Panel\OlcuBirim\OlcuBirimController@olcubirimGuncelle');
Route::get('/panel/olcubirim', 			'Panel\OlcuBirim\OlcuBirimController@olcubirimListele');

Route::get('/panel/firmalar/sil/{id}',	'Panel\Firma\FirmaController@firmaSil');
Route::post('/panel/firmalar/ekle',		'Panel\Firma\FirmaController@firmaEkle');
Route::post('/panel/firmalar/guncelle',	'Panel\Firma\FirmaController@firmaGuncelle');
Route::get('/panel/firmalar', 			'Panel\Firma\FirmaController@firmaListele');

Route::get('/panel/mgrup/sil/{id}',		'Panel\MalzemeGrup\MalzemeGrupController@malzemeGrupSil');
Route::post('/panel/mgrup/ekle',		'Panel\MalzemeGrup\MalzemeGrupController@malzemeGrupEkle');
Route::post('/panel/mgrup/guncelle',	'Panel\MalzemeGrup\MalzemeGrupController@malzemeGrupGuncelle');
Route::get('/panel/mgrup', 				'Panel\MalzemeGrup\MalzemeGrupController@malzemeGrupListele');

Route::get('/panel/depo', 				'Panel\Other\OtherController@depoListele');
Route::get('/panel/mcinsi', 			'Panel\Other\OtherController@mcinsiListele');
Route::get('/panel/urunler', 			'Panel\Other\OtherController@urunlerListele');

Route::get('/panel/stocks', 			'Panel\Stok\StokController@liste');
Route::get('/panel/stokEkle', 			'Panel\Stok\StokController@stokEkle');
Route::get('/panel/stokGiris', 			'Panel\Stok\StokController@stokGiris');
Route::get('/panel/stokCikis', 			'Panel\Stok\StokController@stokCikis');

Route::get('/panel/kullanici/ekle', 	'Panel\Kullanici\kullaniciController@kullaniciEkle');
Route::get('/panel/kullanici/guncelle', 'Panel\Kullanici\kullaniciController@kullaniciGuncelle');
Route::get('/panel/kullanici/sil', 		'Panel\Kullanici\kullaniciController@kullaniciSil');


/*
stok 
	ekle 
	çıkart
	değişim
	listeleme

ik
	özlük
	bordro
	etkinlik
	servis
	*/