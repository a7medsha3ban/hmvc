<?php


Route::get('/login','AuthController@login')->middleware('notLoggedInSupplier:supplier')->name('Suppliers.frontend.login');


Route::get('/dashboard','AuthController@home')->middleware('supplier:supplier')->name('Suppliers.frontend.dashboard');
