<?php

Route::resource('product','ProductController',
    ['only' => [
    'index','create','edit'
    ]],
    ['names' => [
        'index' => 'product.index',
        'create' => 'product.create',
        'edit' => 'product.edit'
    ]]
);
