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

Route::get('/home', 'HomeController@index')->name('home');

//Produse Routes
Route::resource('produse', 'ProduseController');
Route::patch('/produse/stare/{id}', 'ProduseController@status')->middleware('auth');

//Categorie Routes
Route::get('/categorii', 'CategorieController@index')->middleware('auth');
Route::post('/categorii', 'CategorieController@store')->middleware('auth');
Route::delete('/categorii/{id}', 'CategorieController@destroy')->middleware('auth');

//Shop Routes
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/{sort}', 'ShopController@sort');
Route::get('/shop/categorie/{id}', 'CategorieController@cat');
Route::get('/shop/categorie/{id}/{sort}', 'CategorieController@sort');
Route::get('/shop/produs/{id}', 'ShopController@show');
Route::get('/shop/produs/{id}/addtocart', 'CartController@addToCart');

//Cart Routes
Route::delete('/cart/{id}', 'CartController@delFromCart');
Route::get('/checkout', 'CartController@checkout')->middleware('checkcartnotempty');
Route::post('/final-comanda', 'CartController@finalizare')->middleware('checkcartnotempty');





// Route::get('/test', 'CartController@finalizare');

