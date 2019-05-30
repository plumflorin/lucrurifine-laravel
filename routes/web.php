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
Route::get('/shop/{sort}', 'ShopController@sort');

Route::get('/shop/categorie/{id}', 'CategorieController@cat');
Route::get('/shop/categorie/{id}/{sort}', 'CategorieController@sort');

Route::get('/shop/produs/{id}', 'ShopController@show');
Route::get('/shop/produs/{id}/addtocart', 'CartController@addToCart');
Route::delete('/cart/{id}', 'CartController@delFromCart');
Route::get('/checkout', 'CartController@checkout');
Route::post('/final-comanda', 'CartController@finalizare');



// Route::get('/test', 'CartController@finalizare');

