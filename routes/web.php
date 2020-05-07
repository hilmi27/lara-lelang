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

Route::get('jenis-ikan','JenisikanController@index')->name('admin.jenisikan');

Route::get('jenis-ikan/create','JenisikanController@create')->name('admin.jenisikan.create');

Route::post('jenis-ikan/create','JenisikanController@store')->name('admin.jenisikan.store');

Route::get('jenis-ikan/edit/{id}','JenisikanController@edit')->name('admin.jenisikan.edit');

Route::post('jenis-ikan/edit/{id}','JenisikanController@update')->name('admin.jenisikan.update');

Route::delete('jenis-ikan/{id}/destroy','JenisikanController@destroy')->name('admin.jenisikan.destroy');

});