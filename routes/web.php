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
//Client
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
//Category_product
Route::get('/category/{category_id}','CategoryProduct@showCategory_home');
//Brand_product
Route::get('/brand/{brand_id}','BrandProduct@showBrand_home');
//Admin
Route::get('/dashboard','loginController@showdashboard');
Route::get('login','loginController@index');
Route::get('/logout','loginController@logout');
Route::post('/User_Dashboard','loginController@dashboard');
//Category Product

Route::get('addCategory','CategoryProduct@add_category');
Route::get('listCategory','CategoryProduct@all_category');
Route::get('editCategory/{category_id}','CategoryProduct@edit_category');
Route::get('deleteCategory/{category_id}','CategoryProduct@delete_category');

Route::get('/unactive/{category_id}','CategoryProduct@unactive');
Route::get('/active/{category_id}','CategoryProduct@active');

Route::post('/save_category_product','CategoryProduct@save_category_product');
Route::post('/update_category_product/{category_id}','CategoryProduct@update_category_product');
//Brand Product

Route::get('addBrand','BrandProduct@add_brand');
Route::get('listBrand','BrandProduct@all_brand');
Route::get('editBrand/{brand_id}','BrandProduct@edit_brand');
Route::get('deleteBrand/{brand_id}','BrandProduct@delete_brand');

Route::get('/unactive_brand/{brand_id}','BrandProduct@unactive_brand');
Route::get('/active_brand/{brand_id}','BrandProduct@active_brand');

Route::post('/save_brand_product','BrandProduct@save_brand_product');
Route::post('/update_brand_product/{brand_id}','BrandProduct@update_brand_product');

//Product

Route::get('addProduct','ProductController@add_product');
Route::get('listProduct','ProductController@all_product');
Route::get('editProduct/{product_id}','ProductController@edit_product');
Route::get('deleteProduct/{Product_id}','ProductController@delete_product');

Route::get('/unactive_Product/{brand_id}','ProductController@unactive_product');
Route::get('/active_Product/{brand_id}','ProductController@active_product');

Route::post('/save_product','ProductController@save_product');
Route::post('/update_product/{Product_id}','ProductController@update_product');