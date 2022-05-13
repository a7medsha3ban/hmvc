<?php

//route to login
Route::post('/login','AuthController@login')->middleware('notLoggedInSupplier:supplier')->name('Suppliers.backend.login');

//route to logout
Route::post('/logout','AuthController@logout')->middleware('supplier:supplier')->name('Suppliers.backend.logout');
