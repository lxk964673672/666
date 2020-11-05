<?php

Route::get('/', function () {
    return view('welcome');
});
Route::any('/index/login','Index\UserController@login');

/**
 * 后台
 */
Route::prefix('admin')->group(function () {
    Route::get('/index', 'admin\IndexController@index');
    Route::any('/regist', 'admin\UserController@regist');
    Route::any('/login', 'admin\UserController@login');
    Route::any('/powerAdd', 'admin\UserController@powerAdd');
    Route::any('/powerList', 'admin\UserController@powerList');
});
