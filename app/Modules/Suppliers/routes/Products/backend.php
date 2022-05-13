<?php

Route::resource('product','ProductController',
    ['only' => [
    'store', 'update','destroy'
    ]],

    ['names' => [
        'store' => 'product.store',
        'update' => 'product.update',
        'destroy' => 'product.destroy'
    ]]
);

Route::post('/search','ProductController@search')->name('product.search');
