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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','IndexController@index');

//Category listing page
Route::get('/products/{url}','ProductsController@products');

//Detail page
Route::get('/product/{id}','ProductsController@Product');

//Get product attribute price
Route::get('/get-product-price','ProductsController@getProductPrice');




//User Register/Login Page
 Route::get('/login-register','UsersController@userLoginRegister');

 Route::post('/user-register','UsersController@register');

 Route::post('/user-login','UsersController@login');

 Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');

 Route::match(['get','post'],'/confirm/{code}','UsersController@confirmAccount');


 Route::get('/user-logout','UsersController@logout');

 Route::group(['middleware' => ['frontlogin']],function(){

 Route::post('/check-user-pwd','UsersController@chkUserPasswowd');

 Route::post('/update-user-pwd','UsersController@updatePassword');

 Route::match(['get','post'],'/account','UsersController@account');

 Route::match(['get','post'],'/checkout','ProductsController@checkout');

 //Add to cart
Route::match(['get','post'],'/add-cart','ProductsController@addtocart');

Route::match(['get','post'],'/cart','ProductsController@cart');

Route::get('/cart/delete-cart/{id}','ProductsController@deleteCartProduct');

 Route::get('cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

 Route::match(['get','post'],'/order-review','ProductsController@orderReview');


 Route::match(['get','post'],'/place-order','ProductsController@placeOrder');

 Route::get('/thanks','ProductsController@thanks');



});


Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
  //dashboard
Route::get('/admin/dashboard','AdminController@dashboard');
//Settings
Route::get('/admin/settings','AdminController@settings');

Route::get('/admin/check-pwd','AdminController@chkPassword');

Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');


//Categories Routes (Admin)
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');

Route::get('/admin/view-categories','CategoryController@viewCategories');

Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');

Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');

Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');

Route::get('/admin/view-products','ProductsController@viewProducts');

Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@deleteProduct');

Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');

Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');

Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');

Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

});




//logout
Route::get('/logout','AdminController@logout');






