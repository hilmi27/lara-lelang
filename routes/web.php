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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {

Route::get('dashboard','DashboardController@index')->name('admin.dashboard');

// Manage Wilayah Penangkapan
Route::get('wilayah-penangkapan','WilayahController@index')->name('admin.wilayah');

Route::get('wilayah-penangkapan/create','WilayahController@create')->name('admin.wilayah.create');

Route::post('wilayah-penangkapan/create','WilayahController@store')->name('admin.wilayah.store');

Route::get('wilayah-penangkapan/edit/{id}','WilayahController@edit')->name('admin.wilayah.edit');

Route::post('wilayah-penangkapan/edit/{id}','WilayahController@update')->name('admin.wilayah.update');

Route::delete('wilayah-pengkapan/{id}/destroy','WilayahController@destroy')->name('admin.wilayah.destroy');

// Manage Jenis Ikan

Route::get('jenis-ikan','JenisikanController@index')->name('admin.jenisikan');

Route::get('jenis-ikan/create','JenisikanController@create')->name('admin.jenisikan.create');

Route::post('jenis-ikan/create','JenisikanController@store')->name('admin.jenisikan.store');

Route::get('jenis-ikan/edit/{id}','JenisikanController@edit')->name('admin.jenisikan.edit');

Route::post('jenis-ikan/edit/{id}','JenisikanController@update')->name('admin.jenisikan.update');

Route::delete('jenis-ikan/{id}/destroy','JenisikanController@destroy')->name('admin.jenisikan.destroy');

// Manage Data Nelayan
Route::get('nelayan','NelayanController@index')->name('admin.nelayan');

Route::get('nelayan/create','NelayanController@create')->name('admin.nelayan.create');

Route::post('nelayan/create','NelayanController@store')->name('admin.nelayan.store');

Route::get('nelayan/edit/{id}','NelayanController@edit')->name('admin.nelayan.edit');

Route::post('nelayan/edit/{id}','NelayanController@update')->name('admin.nelayan.update');

Route::delete('nelayan/destroy/{id}','NelayanController@destroy')->name('admin.nelayan.destroy');

Route::get('nelayan/trash','NelayanController@trash')->name('admin.nelayan.trash');

Route::post('nelayan/{id}/restore','NelayanController@restore')->name('admin.nelayan.restore');

Route::delete('nelayan/{id}/delete-permanent','NelayanController@deletePermanent')->name('admin.nelayan.delete-permanent');


});