<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','HomeController@index')->name('home');
Route::get('/category/{category}','HomeController@allproductspercategory');
Route::get('/product/{id}','HomeController@perproduct');

Route::group(['middleware'=>'auth'],function (){
    //cart routes
    Route::get('/cart','CartController@index')->name('cart');
    Route::post('/addtocart','CartController@addtocart')->name('addtocart');
    Route::post('cart/addqte','CartController@addqte');
    Route::post('cart/minqte','CartController@minqte');
    Route::post('cart/deletecart','CartController@deletecart')->name('deletecart');
    //profile
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/changepassword','ProfileController@changepassword')->name('changepassword');

    // search
    Route::post('/search','SearchController@search')->name('search');
    
});

//order
    Route::group(['middleware'=>'order'],function(){
    Route::get('/order','OrderController@index')->name('order');
    Route::post('/order','OrderController@order')->name('order');
});


Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){
    //product index and crud routes
    Route::get('/', 'AdminController@index')->name('adminindex');
    Route::get('/addproduct', 'ProductController@indexaddproduct')->name('indexaddproduct');
    Route::post('/addproduct', 'ProductController@addproduct')->name('addproduct');
    Route::get('/allproducts','ProductController@indexallproductsforadmin')->name('allproductsforadmin');
    Route::get('/deleteproduct/{id}','ProductController@deleteproduct');
    Route::get('/updateproduct/{id}','ProductController@indexupdateproduct');
    Route::post('/updateproduct/{id}','ProductController@updateproduct');
    Route::get('/allproducts/{category}','ProductController@allproductspercategory');
    Route::post('/updatestatusproduct','ProductController@updatestatusproduct')->name('updatestatusproduct');


    //category index and crud routes
    Route::get('/addcategory', 'CategoryController@indexaddcategory')->name('indexaddcategory');
    Route::post('/addcategory', 'CategoryController@addcategory')->name('addcategory');
    Route::get('/allcategories','CategoryController@indexallcategoriesforadmin')->name('allcategoriesforadmin');
    Route::get('/deletecategory/{id}','CategoryController@deletecategory');
    Route::get('/updatecategory/{id}','ProductController@indexupdatecategory');

    //new checkouts
    Route::get('/newcheckout','CheckoutController@indexNewcheckout')->name('newcheckout');
    Route::get('/percheckout/user/{id}','CheckoutController@indexpercheckout');
    Route::post('/completeorder','CheckoutController@completeorder')->name('completeorder');
    //old checkouts
    Route::get('/allcheckout','CheckoutController@indexallcheckout')->name('allcheckout');
});

Auth::routes();
Route::post('register','auth\RegisterController@create')->name('register');
Route::post('logout','auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
