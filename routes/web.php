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
Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();
*/

Route::get('/index', 'AdvertentieController@index');

Route::get('/plaatsen', 'AdvertentieController@plaatsen');

Route::post('/index', 'AdvertentieController@invoeren');

Route::post('/plaatsen', 'AdvertentieController@foto_uploaden');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
