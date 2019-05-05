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
    return view('welcome', ['title' => 'homepage']);
});

Auth::routes();

Route::resource('produse', 'ProduseController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ShopController@index')->name('shop');

Route::get('/categorie/{id}', 'CategorieController@cat');
