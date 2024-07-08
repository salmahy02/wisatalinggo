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

Route::get('/', 'HomeController@index');

Route::prefix('login')->group(function(){
  Route::get('/', 'Auth\LoginController@index')->name('login');
  Route::post('/', 'Auth\LoginController@doLogin');
});

Route::prefix('register')->group(function(){
  Route::get('/', 'Auth\RegisterController@index');
  Route::post('/', 'Auth\RegisterController@doRegister');
});

Route::get('/logout', 'HomeController@logout');

Route::prefix('auth')->group(function(){
  Route::get('/{provider}', 'Auth\AuthController@redirectToProvider');
  Route::get('/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::prefix('wisata')->group(function(){
  Route::get('/', 'HomeController@wisata');
  Route::get('/{id}', 'HomeController@wisata_detail');
  Route::get('/{id}/gallery', 'HomeController@wisata');
});

Route::prefix('paket')->group(function(){
  Route::get('/{id}', 'HomeController@paket');
});

Route::prefix('transaksi')->group(function(){
  Route::get('/', 'TransaksiController@transaksi');
  Route::get('/{id}', 'TransaksiController@show');
  Route::post('/', 'TransaksiController@store');
  Route::put('/{id}', 'TransaksiController@update');
  Route::post('/transaksi', 'TransaksiController@store')->name('transaksi.store');
  Route::get('/transaksi/{id}', 'TransaksiController@show')->name('transaksi.show');
  // Route::get('/transaksi/{id}', 'TransaksiController@showDetail')->name('transaksi.detail');

});

Route::prefix('admin')->group(function(){
  Route::prefix('wisata')->group(function(){
    Route::get('/', 'Admin\WisataController@index');
    Route::get('/create', 'Admin\WisataController@create');
    Route::post('/', 'Admin\WisataController@store');
    Route::get('/{id}/edit', 'Admin\WisataController@edit');
    Route::post('/{id}', 'Admin\WisataController@update');
    Route::get('/{id}', 'Admin\WisataController@destroy');
  });
  Route::prefix('transaksi')->group(function(){
    Route::get('/', 'Admin\TransaksiController@index');
    Route::get('/terima/{id}', 'Admin\TransaksiController@terima');
    Route::get('/tolak/{id}', 'Admin\TransaksiController@tolak');
  });

  Route::get('/riwayat', 'Admin\TransaksiController@riwayat');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('paket/index', 'PaketController@index')->name('add.paket');
    Route::get('paket/create', 'PaketController@create')->name('create.paket');
    Route::post('paket/store', 'PaketController@store')->name('store.paket');
    Route::get('paket/{id}/edit', 'PaketController@edit')->name('edit.paket');
    Route::put('paket/{id}', 'PaketController@update')->name('update.paket');
    Route::delete('paket/{id}', 'PaketController@destroy')->name('destroy.paket');
});


Route::get('/', 'PaketController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/pakets/detail/{id}', 'PaketController@showDetail')->name('pakets.detail');
Route::get('paket/{id}/edit', 'PaketController@edit')->name('edit.paket');
