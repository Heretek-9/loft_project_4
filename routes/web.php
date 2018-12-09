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
Route::get('/','_Public\IndexController@show');

Route::post('adduserorder','_Public\OrdersController@addOrder');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('/categories', 'Admin\CategoriesController');
    Route::get('/categories/{category}/destroy', 'Admin\CategoriesController@destroy')->name('categories.drop');

    Route::resource('/products', 'Admin\ProductsController');
    Route::get('/products/{product}/destroy', 'Admin\ProductsController@destroy')->name('products.drop');

    Route::get('/','Admin\OrdersController@index');
    Route::get('orders','Admin\OrdersController@index');

    Route::resource('/settings', 'Admin\SettingsController');
});

Route::get('{cat_name}/{prod_name}','_Public\ProductsController@show');
Route::get('{cat_name}','_Public\CategoriesController@show');
