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

Route::get('/', [
    
    'uses' => 'FrontEndController@index',
    'as' => 'index'
    
]);



Route::get('/product/{id}', [
    
    'uses' => 'FrontEndController@single',
    'as' => 'product.single'
    
]);



Route::post('/cart/add', [
    
    'uses' => 'ShoppingController@add',
    'as' => 'cart.add'
    
]);



Route::get('/cart', [
    
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
    
]);


Route::get('/cart/delete/{id}', [
    
    'uses' => 'ShoppingController@delete',
    'as' => 'cart.delete'
    
]);



Route::get('/cart/increment/{id}/{qty}', [
    
    'uses' => 'ShoppingController@increment',
    'as' => 'cart.increment'
    
]);


Route::get('/cart/decrement/{id}/{qty}', [
    
    'uses' => 'ShoppingController@decrement',
    'as' => 'cart.decrement'
    
]);





Route::get('/cart/rapid/add/{id}', [
    
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
    
]);



Route::get('/checkout', [
    
    'uses' => 'ShoppingController@checkout',
    'as' => 'checkout'
    
]);




    
Route::resource('products', 'ProductsController');


Auth::routes();



Route::get('home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



