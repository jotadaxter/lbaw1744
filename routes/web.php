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

Route::get('/', function () {return view('index');});

/* Module M01: Authentication and Individual Profile */

//Profile
Route::get('profile', 'ProfileController@showRegisted');
Route::get('profile/{user_id}', 'ProfileController@show');
Route::get('profile/{user_id}/edit', 'ProfileController@showEdit')->name('edit');
Route::post('profile/{user_id}/edit', 'ProfileController@update');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


/* Module M02: Products */

//Products
Route::get('products', 'ProductsController@show');

//Product
Route::get('product/{product_id}', 'ProductController@show');

/* Module M03: Reviews and Wish list */


/* Module M04: Cart and Checkout */


/* Module M05: User Administration */


/* Module M06: Static Pages */
//Home Page
Route::get('/home', function () { return view('index');});

//About Page
Route::get('/about', function () {return view('about');});

//Contacts Page
Route::get('/contacts', function () {return view('contacts');});

//Terms Page
Route::get('/terms', function () {return view('terms');});

//Privacy Page
Route::get('/privacy', function () {return view('privacy');});

//404 Page
Route::get('/404', function () {return view('404');});