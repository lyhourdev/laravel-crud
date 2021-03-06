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
    return view('admin.master');
});



Route::get('/user', 'UserController@List');
Route::post('/user','UserController@Submit');
Route::patch('/user','UserController@update_data');
Route::get('/user/create','UserController@Create');
Route::get('/user/edit/{id}','UserController@edit_data');
Route::delete('/user/{id}','UserController@delete_data');

Route::get('/category', 'CategoryController@list');
Route::post('/category','CategoryController@save_data');

Route::get('/category/crate', 'CategoryController@crate');

Route::delete('/category/{id}','CategoryController@delete_data');
Route::get('/category/edit/{id}', 'CategoryController@edit_data');

Route::patch('/category','CategoryController@update_data');


Route::get('/item', 'ItemController@index');
Route::get('/item/crate', 'ItemController@create');
Route::post('/item', 'ItemController@store');
Route::delete('/item/{id}', 'ItemController@destroy');
Route::get('/item/edit/{id}', 'ItemController@edit');
Route::patch('/item/{id}','ItemController@update');

Route::get('/product', 'ProductController@index');

Route::post('/product', 'ProductController@store');

Route::get('/product/data', 'ProductController@getProductData');
Route::delete('/product', 'ProductController@destroy');
Route::get('/item/edit', 'ProductController@edit');


Route::get('/my-data', 'MyDataController@index');
Route::post('/my-data', 'MyDataController@store');

Route::get('/get/my-data', 'MyDataController@show');
Route::get('/get/my-data/edit', 'MyDataController@edit');

Route::delete('/my-data', 'MyDataController@destroy');



Route::get('/my-data-one', 'MyDataOneController@index');
Route::post('/my-data-one', 'MyDataOneController@store');
Route::get('/get/my-data-one', 'MyDataOneController@getData');
Route::delete('/my-data-one', 'MyDataOneController@delete');
Route::get('/shoe/my-data-one', 'MyDataOneController@show');



