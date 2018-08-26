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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController')->middleware('auth');
Route::resource('catalog', 'CatalogController')->middleware('auth');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('info', 'UserController@info');
    Route::post('setavatar', 'UserController@setAvatar');
});

Route::post('/auth/code', 'Auth\SmsController@requestCode')->name('/auth/code');
Route::get('/auth/password', 'Auth\InfoController@password')->name('/auth/password');
Route::post('/auth/password', 'Auth\InfoController@setpassword')->name('/auth/setpassword');

Route::get('test/{id}', function($id){
    Auth::loginUsingId($id);
    return redirect('/home');
});
