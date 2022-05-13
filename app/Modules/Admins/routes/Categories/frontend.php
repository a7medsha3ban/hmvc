<?php

//Route::get('/index','CategoryController@index')->name('Categories.frontend.index');
//Route::get('/create','CategoryController@create')->name('Categories.frontend.create');
//Route::get('/edit/{id}','CategoryController@edit')->name('Categories.frontend.edit');
//Route::get('/show/{id}','CategoryController@show')->name('Categories.frontend.show');
Route::resource('category','CategoryController',
    ['only' => [
    'index','create','edit'
    ]],
    ['names' => [
        'index' => 'category.index',
        'create' => 'category.create'
    ]]
);
