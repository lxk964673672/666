<?php
//前台首页
Route::any('/','Index\IndexController@index');
//登陆页面
Route::any('/index/login','Index\UserController@login');
//登陆
Route::any('/index/reg','Index\UserController@reg');