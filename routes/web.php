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

Route::get('/', 'StaticPagesController@showHome')->name('index');

/* Module M01: Authentication and Individual Profile */

// Login Form
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Login Action
Route::post('login', 'Auth\LoginController@login');
//Logout Action
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//Register Form
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Register Action
Route::post('register', 'Auth\RegisterController@register');
//View Profile
Route::get('profile/{user_id}', 'ProfileController@show')->name('profile');
//Edit Profile Form
Route::get('profile/{user_id}/edit', 'ProfileController@showEdit')->name('edit');
//Edit Profile Action
Route::post('profile/{user_id}/edit', 'ProfileController@update');
//Reset Password Form
Route::get('password/reset', 'ProfileController@showPasswordReset')->name('passwordReset');
//Reset Password Action
Route::post('password/reset', 'ProfileController@passwordReset');
//Reset Password Confirmation Form
Route::get('password/confirmation', 'ProfileController@showPasswordConfirmation')->name('passwordConfirmation');
//Resend Email with confirmation code
Route::get('password/resendConfirmation/{email}', 'ProfileController@resendConfirmationMail')->name('resendConfirmationMail');
//Reset Password Confirmation Action
Route::post('password/confirmation', 'ProfileController@passwordConfirmation');
//Reset Password Change Form
Route::get('password/change', 'ProfileController@showPasswordChange')->name('passwordChange');
//Reset Password Change Action
Route::post('password/change', 'ProfileController@passwordChange');
//Password Change Success
Route::get('password/changeSuccess', 'ProfileController@showChangeSuccess')->name('changeSuccess');
//Change Profile Avatar
Route::post('profile/{user_id}/avatar', 'ProfileController@changeAvatar');
//Profile Settings
Route::get('profile/{user_id}/settings/', 'ProfileController@showSettings')->name('settings');


/* Module M02: Products */

//Products Search
Route::get('products/search', 'SearchController@showProductSearch')->name('productSearch');
//Products Search By Tag
Route::post('products/search', 'SearchController@showProductsByTag')->name('productsByTag');
//View a Product
Route::get('products/{product_id}', 'ProductController@showProduct')->name('product');
//User Products
Route::get('profile/{user_id}/products/', 'ProfileController@showMyProducts')->name('myProducts');
//Seller Add Products Form
Route::get('profile/{user_id}/products/add/', 'ProfileController@addProduct')->name('addProducts');
//Seller Add Products Action
Route::post('profile/{user_id}/products/add/', 'ProfileController@addProductAction');

/* Module M03: Reviews and Wish list */

Route::get('profile/{user_id}/wishlist', 'ProfileController@showWishList')->name('wishlist');


/* Module M04: Cart and Checkout */

//Show Produts in Cart
Route::get('cart', 'CartController@showCart')->name('cart');
//Add Product To Cart
Route::get('cart/add/{product_id}', 'CartController@addToCart')->name('addProductToCart');
//Remove Product from Cart
Route::post('cart/remove/{product_id}', 'CartController@removeProduct')->name('removeProduct');

/* Module M05: User Administration */

//Admin Page
Route::get('/admin', 'AdminController@showAdminPage')->name('adminPage');
//Admin Page Users
Route::get('/admin/users', 'AdminController@showAdminPageUsers')->name('admin_users');
//Admin Page Products
Route::get('/admin/products', 'AdminController@showAdminPageProducts')->name('admin_products');

//Reset Password Change Action
//Route::post('password/change', 'AdminController@passwordChange');

/* Module M06: Static Pages */
//Home Page
Route::get('/home', 'StaticPagesController@showHome')->name('home');
//About Page
Route::get('/about', 'StaticPagesController@showAbout')->name('about');
//Contacts Page
Route::get('/contacts', 'StaticPagesController@showContacts')->name('contacts');
//Terms Page
Route::get('/terms', 'StaticPagesController@showTerms')->name('terms');
//Privacy Page
Route::get('/privacy', 'StaticPagesController@showPrivacy')->name('privacy');
//404 Page
Route::get('/404', 'StaticPagesController@show404')->name('404');

Route::get('/phpinfo', function() {
    return phpinfo();
});