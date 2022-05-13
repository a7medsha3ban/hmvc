<?php

//route to login
Route::post('/login','AuthController@login')->middleware('notLoggedInAdmin:admin')->name('Admins.backend.login');

//route to logout
Route::post('/logout','AuthController@logout')->middleware('admin:admin')->name('Admins.backend.logout');
