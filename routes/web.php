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

//Admin
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

Route::get('/unactive/{brand_id}','BrandProduct@unactive');
Route::get('/active/{brand_id}','BrandProduct@active');

Route::post('/save_brand_product','BrandProduct@save_brand_product');
Route::post('/update_brand_product/{brand_id}','BrandProduct@update_brand_product');