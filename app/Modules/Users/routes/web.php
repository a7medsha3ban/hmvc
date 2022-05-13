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



$module_name = basename(dirname(__DIR__,1));
Route::namespace(buildControllerNamespace($module_name))->middleware('web')->group(function ()use ($module_name) {
    Route::prefix(buildPrefix($module_name, 'frontend'))->namespace('Products'.DS().'frontend')->group(function () {
        Route::get('/index','ProductController@index')->name('users.product.index');

    });

    Route::prefix(buildPrefix($module_name, 'backend'))->namespace('Products'.DS().'backend')->group(function () {
        Route::get('/search','ProductController@search')->name('users.product.search');
    });

});






