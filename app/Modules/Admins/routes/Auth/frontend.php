<?php



Route::get('/login','AuthController@login')->middleware('notLoggedIn:admin')->name('Admins.frontend.login');


Route::get('/dashboard','AuthController@home')->middleware('admin:admin')->name('Admins.frontend.dashboard');
