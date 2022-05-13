<?php

//Route::post('/store','CategoryController@store')->name('Categories.backend.store');
//Route::post('/delete','CategoryController@destroy')->name('Categories.backend.destroy');
//Route::post('update','CategoryController@update')->name('Categories.backend.update');
Route::resource('category','CategoryController',
    ['only' => [
    'store', 'update','destroy'
    ]],

    ['names' => [
        'store' => 'category.store',
        'update' => 'category.update',
        'destroy' => 'category.destroy'
    ]]
);
