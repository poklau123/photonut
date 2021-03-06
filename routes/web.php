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
    return view('home');
});

Route::get('templates', function(){
    return view('templates');
});

Route::get('price', function(){
    return view('price');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('catalog', 'CatalogController')->middleware('auth');

Route::group(['prefix' => 'catalog/{catalog_id}', 'middleware' => 'auth'], function () {
    Route::resource('post', 'PostController');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('info', 'UserController@info');
    Route::post('setavatar', 'UserController@setAvatar');
});

Route::post('/auth/code', 'Auth\SmsController@requestCode')->name('/auth/code');
Route::get('/auth/password', 'Auth\InfoController@password')->name('/auth/password');
Route::post('/auth/password', 'Auth\InfoController@setpassword')->name('/auth/setpassword');

Route::get('/album', function(){
    return view('album');
});

Route::get('/template', function(){
    return view('templates');
});

Route::get('/contact', 'ContactController@edit')->middleware('auth');
Route::post('/contact', 'ContactController@update')->middleware('auth');

Route::get('test/{id}', function($id){
    Auth::loginUsingId($id);
    return redirect('/home');
});