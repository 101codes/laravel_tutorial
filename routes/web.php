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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE clear cache'; //Return anything
});
Route::get('/seed', function() {
    $exitCode = Artisan::call('migrate:refresh --seed');
    return 'DONE seeding the data'; //Return anything
});
Auth::routes();
Route::get('/home','HomeController@index');
Route::get('/auth/{provdier}', 'Auth\RegisterController@redirectToProvider');
Route::get('/auth/{provdier}/callback', 'Auth\RegisterController@handleProviderCallback');


Route::get('/','WebController@index');
Route::get('/index','WebController@index');
Route::get('/set/language/{km}','WebController@setLanguage');
Route::get('/set/language/{en}','WebController@setLanguage');
Route::get('/category/{id}/{cat}','WebController@cat');
// Route::get('/home', 'WebController@index')->name('Web');
// Route::get('/category/{id}/{name}','MainController@showByCat');
