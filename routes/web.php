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

Route::get('/test', 'CategoryController@index');
Route::get('/category', 'CategoryController@index');
Route::post('/create', 'CategoryController@create');
Route::get('/category/{category}/delete', 'CategoryController@destroy');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::post('/category/{category}/update', 'CategoryController@update');










Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
