<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/lumbungpadi', 'LumbungPadiController@index')->name('lumbungpadi');
Route::post('/lumbungpadi/store', 'LumbungPadiController@store')->name('user.lumbungpadi.store');
Route::get('/sewatratak', 'SewaTratakController@index')->name('sewatratak');
Route::post('/sewatratak/store', 'SewaTratakController@store')->name('user.sewatratak.store');
Route::get('/airbersih', 'AirBersihController@index')->name('airbersih');
Route::get('/cek-tagihan', 'AirBersihController@cekTagihan')->name('cek-tagihan');
Route::post('/airbersih/update', 'AirBersihController@update')->name('user.airbersih.update');
Route::get('/informasi', 'InformasiController@index')->name('informasi');
Route::get('/informasi/{id}', 'InformasiController@detail')->name('user.informasi.detail');
Route::get('/kontak', 'kontakController@index')->name('kontak');
Route::post('/kontak', 'KontakController@kirimPesan')->name('kontak.kirim');





Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){
    
    //settings
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('setting', 'SettingController');        
    });

    
    
    Route::group(['middleware' => ['permission:manajemen users|manajemen roles']], function() {
        Route::get('/roles/search','RoleController@search')->name('roles.search');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        // Route::resource('setting', 'SettingController');        
    });

 // LumbungPadi
Route::group(['middleware' => ['permission:manajemen lumbungpadi']], function() {
    Route::get('/admin/lumbungpadi/search', 'AdminLumbungPadiController@search')->name('admin.lumbungpadi.search');
    Route::get('/admin/lumbungpadi/pdf', 'AdminLumbungPadiController@reportPdf')->name('admin.lumbungpadi.pdf');
    Route::get('/admin/lumbungpadi/export', 'AdminLumbungPadiController@export')->name('admin.lumbungpadi.export');
    Route::post('/admin/lumbungpadi/import', 'AdminLumbungPadiController@import')->name('admin.lumbungpadi.import');
    Route::resource('admin/lumbungpadi', 'AdminLumbungPadiController');        
});

// SewaTratak
Route::group(['middleware' => ['permission:manajemen sewatratak']], function() {
    Route::get('/admin/sewatratak/search', 'AdminSewaTratakController@search')->name('admin.sewatratak.search');
    Route::get('/admin/sewatratak/pdf', 'AdminSewaTratakController@reportPdf')->name('admin.sewatratak.pdf');
    Route::get('/admin/sewatratak/export', 'AdminSewaTratakController@export')->name('admin.sewatratak.export');
    Route::post('/admin/sewatratak/import', 'AdminSewaTratakController@import')->name('admin.sewatratak.import');
    Route::resource('admin/sewatratak', 'AdminSewaTratakController');        
});

// Air Bersih
Route::group(['middleware' => ['permission:manajemen airbersih']], function() {
    Route::get('/admin/airbersih/search', 'AdminAirBersihController@search')->name('admin.airbersih.search');
    Route::get('/admin/airbersih/pdf', 'AdminAirBersihController@reportPdf')->name('admin.airbersih.pdf');
    Route::get('/admin/airbersih/export', 'AdminAirBersihController@export')->name('admin.airbersih.export');
    Route::post('/admin/airbersih/import', 'AdminAirBersihController@import')->name('admin.airbersih.import');
    Route::resource('admin/airbersih', 'AdminAirBersihController');        
});

 //Informasi
 Route::group(['middleware' => ['permission:manajemen informasi']], function() {
    Route::get('/admin/informasi/search','JobPostingController@search')->name('admin.informasi.search');
    Route::get('/admin/informasi/export/', 'JobPostingController@export')->name('admin.informasi.export');
    Route::resource('admin/informasi', 'AdminInformasiController');        
});

    
    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');
   
});

