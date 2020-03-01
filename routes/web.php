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
Route::post('/panel/depo/ekle', 		'Panel\Depo\DepoController@depoEkle');
Route::post('/panel/depo/guncelle', 	'Panel\Depo\DepoController@depoGuncelle');
Route::get('/panel/depo/sil/{id}', 		'Panel\Depo\DepoController@depoSil');

Route::get('/panel/mcinsi', 			'Panel\MalzemeCinsi\MalzemeCinsiController@malzemecinsiListele');
Route::post('/panel/mcinsi/ekle', 		'Panel\MalzemeCinsi\MalzemeCinsiController@malzemeCinsiEkle');
Route::post('/panel/mcinsi/guncelle', 	'Panel\MalzemeCinsi\MalzemeCinsiController@malzemeCinsiGuncelle');
Route::get('/panel/mcinsi/sil/{id}', 	'Panel\MalzemeCinsi\MalzemeCinsiController@malzemeCinsiSil');


Route::get('/panel/urunler', 			'Panel\Urun\UrunController@urunListele');
Route::post('/panel/urun/ekle', 		'Panel\Urun\UrunController@UrunEkle');
Route::post('/panel/urun/guncelle', 	'Panel\Urun\UrunController@UrunGuncelle');
Route::get('/panel/urun/sil/{id}', 		'Panel\Urun\UrunController@UrunSil');

Route::get('/panel/stok', 				'Panel\Stok\StokController@stokListele');
Route::get('/panel/stok/ekle', 			'Panel\Stok\StokController@stokEkleGoruntule');
Route::get('/panel/stok/transfer', 		'Panel\Stok\StokController@stokTransferGoruntule');
Route::get('/panel/stok/{islem}', 		'Panel\Stok\StokController@stokGirisCikisGoruntule');

Route::post('/panel/stok/transfer', 	'Panel\Stok\StokController@stokTransfer');
Route::post('/panel/stok/ekle', 		'Panel\Stok\StokController@stokEkle');
Route::post('/panel/stok/giris', 		'Panel\Stok\StokController@stokGiris');
Route::post('/panel/stok/cikis', 		'Panel\Stok\StokController@stokCikis');


Route::get('/panel/kullanici/liste', 	'Panel\Kullanici\kullaniciController@kullaniciListele');
Route::post('/panel/kullanici/ekle', 	'Panel\Kullanici\kullaniciController@kullaniciEkle');
Route::post('/panel/kullanici/guncelle','Panel\Kullanici\kullaniciController@kullaniciGuncelle');
Route::get('/panel/kullanici/sil/{id}', 'Panel\Kullanici\kullaniciController@kullaniciSil');