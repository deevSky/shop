<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public/index');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CategoryController@categories');

Route::group(['middleware' => ['auth']], function(){

//category
    Route::get('/category', 'CategoryController@index');
    Route::post('/category/create', 'CategoryController@create');
    Route::get('/category/{category}/edit', 'CategoryController@edit');
    Route::post('/category/{category}/update', 'CategoryController@update');
    Route::get('/category/{category}/delete', 'CategoryController@destroy');

//products
    Route::get('/product', 'ProductController@index');
    Route::post('/product/create', 'ProductController@create');
    Route::get('/product/{product}/edit', 'ProductController@edit');
    Route::post('/product/{product}/update', 'ProductController@update');
    Route::get('/product/{product}/delete', 'ProductController@destroy');


    Route::get('/logout', 'HomeController@logout');


    Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
});
