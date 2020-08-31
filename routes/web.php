<?php

use Illuminate\Support\Facades\Auth;
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
    return view('login');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/registrasi', 'AuthController@registrasi')->name('registrasi');
    Route::post('/registrasi', 'AuthController@cek_registrasi');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@cek_login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/databarang', 'DatabarangController@index')->name('databarang');
    Route::post('/tambah/barang', 'DatabarangController@store')->name('tambahbarang');
    Route::post('/cekbox_delete', 'DatabarangController@destroy')->name('cekbox_delete');
    Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
    Route::get('/logout', 'AuthController@Logout')->name('logout');
});
