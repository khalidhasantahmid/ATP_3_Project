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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'gallery@index');

////------Gallery---------
	Route::get('/gallery', 'gallery@index')->name('gallery');
	Route::get('/gallery/search', 'gallery@search');
	Route::get('/gallery/searchByTag', 'gallery@searchByTag')->name('gallery.searchByTag');
	Route::get('/gallery/sort', 'gallery@sort')->name('gallery.sort');

Route::get('/singleview', 'singleview@index')->name('singleview');
Route::post('/singleview/postCart', 'singleview@postCart')->name('singleview.postCart');
Route::get('/singleview/getCart', 'singleview@getCart')->name('singleview.getCart');

Route::get('/create', 'create@index')->name('create');
Route::get('/cart', 'cart@index')->name('cart');

/////---------Registration------------
Route::get('/registration', 'registration@index')->name('registration');
Route::post('/registration', 'registration@register')->name('registration.register');

////------login--------
	Route::get('/login', 'login@index')->name('login');
	Route::post('/login', 'login@verify')->name('login.verify');
	Route::get('/logout', 'logout@sessionRemove')->name('logout');

Route::group(['middleware' => ['loginCheck']], function(){

////------home--------
	Route::get('/home', 'home@index')->name('home');
	Route::post('/home/addProduct', 'home@addProduct')->name('home.addProduct');
	Route::get('/home/edit', 'home@editProduct')->name('home.editProduct');
	Route::post('/home/updateProduct', 'home@updateProduct')->name('home.updateProduct');
	Route::get('/home/deleteProduct', 'home@deleteProduct')->name('home.deleteProduct');
	Route::get('/home/orderStatus', 'home@orderStatus')->name('home.orderStatus');
	Route::get('/home/orderDelete', 'home@orderDelete')->name('home.orderDelete');
	Route::post('/home/updateUserAddress', 'home@updateUserAddress')->name('home.updateUserAddress');
	Route::post('/home/updateUserInfo', 'home@updateUserInfo')->name('home.updateUserInfo');
	Route::get('/home/deleteUser', 'home@deleteUser')->name('home.deleteUser');
	Route::get('/ordersPrint','home@ordersPrint')->name('print.orders');
	Route::get('/productsPrint','home@productsPrint')->name('print.products');
	Route::get('/usersPrint','home@usersPrint')->name('print.users');
	Route::get('/profitPrint','home@profitPrint')->name('print.profit');

	Route::get('/invoicePrint','cart@invoicePrint')->name('print.invoice');
	

////-------Cart----------
	Route::post('/cart/placeOrder', 'cart@placeOrder')->name('cart.placeOrder');
});


