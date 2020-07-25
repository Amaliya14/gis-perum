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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','WelcomeController@home');
Route::get('map','WelcomeController@map');
Route::get('mapPerumahan','WelcomeController@mapPerumahan');
Route::get('perumahan','WelcomeController@perumahan');
Route::get('info-perumahan/{id}','WelcomeController@info')->name('info');
Route::get('data-pengembang','WelcomeController@pengembang')->name('pengembang');
Route::get('kontak','WelcomeController@kontak');
Route::get('perumahan/cari','WelcomeController@cari')->name('cari');
// Auth::routes();

Route::group(['prefix' => 'admin'], function(){
	Route::get('login','Admin\AuthAdminController@showLogin')->name('admin.show.login');
	Route::post('login','Admin\AuthAdminController@login')->name('admin.login');
	Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');
	Route::post('logout','Admin\AuthAdminController@logout')->name('admin.logout');

	Route::get('kecamatan', 'Admin\KecamatanController@index')->name('admin.kecamatan');
	Route::get('kec/create','Admin\KecamatanController@create')->name('admin.create');
	Route::post('kec/simpan','Admin\KecamatanController@store')->name('admin.simpan');
	Route::get('kec/edit/{id}', 'Admin\KecamatanController@edit')->name('admin.edit');
    Route::post('kec/update/{id}','Admin\KecamatanController@update')->name('admin.update');
    Route::delete('kec/destroy/{id}','Admin\KecamatanController@destroy')->name('admin.destroy');

	Route::get('pengembang', 'Admin\PengembangController@index')->name('admin.pengembang');
	Route::get('pengembang/create','Admin\PengembangController@create')->name('admin.create');
	Route::post('pengembang/simpan','Admin\PengembangController@store')->name('admin.simpan');
	Route::get('pengembang/edit/{id}', 'Admin\PengembangController@edit')->name('admin.edit');
    Route::post('pengembang/update/{id}','Admin\PengembangController@update')->name('admin.update');
    Route::delete('pengembang/destroy/{id}','Admin\PengembangController@destroy')->name('admin.destroy');

    Route::get('perumahan', 'Admin\PerumahanController@index')->name('admin.perumahan');
	Route::get('perumahan/create','Admin\PerumahanController@create')->name('admin.create');
	Route::post('perumahan/simpan','Admin\PerumahanController@store')->name('admin.simpan');
	Route::get('perumahan/edit/{id}', 'Admin\PerumahanController@edit')->name('admin.edit');
    Route::patch('perumahan/update/{id}','Admin\PerumahanController@update')->name('admin.update');
    Route::delete('perumahan/destroy/{id}','Admin\PerumahanController@destroy')->name('admin.destroy');


});


Route::group(['prefix' => 'admin-perum'], function(){
	Route::get('login','AdminPerum\AuthAdminPerumController@showLogin')->name('admin-perum.show.login');
	Route::post('login','AdminPerum\AuthAdminPerumController@login')->name('admin-perum.login');
	Route::get('dashboard','AdminPerum\DashboardController@index')->name('admin-perum.dashboard');
	Route::post('logout','AdminPerum\AuthAdminPerumController@logout')->name('admin-perum.logout');

    Route::get('infoperum', 'AdminPerum\InfoPerumController@index')->name('admin-perum.infoperum');
	Route::get('create','AdminPerum\InfoPerumController@create')->name('admin-perum.create');
	Route::post('simpan','AdminPerum\InfoPerumController@store')->name('admin-perum.simpan');
	Route::get('edit/{id}', 'AdminPerum\InfoPerumController@edit')->name('admin-perum.edit');
    Route::patch('update','AdminPerum\InfoPerumController@update')->name('admin-perum.update');
    Route::post('destroy/{id}','AdminPerum\InfoPerumController@destroy')->name('admin-perum.destroy');

	Route::get('info', 'AdminPerum\InfoPerumController@edit')->name('info-edit');
});
