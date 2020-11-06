<?php
/*
*前台
*/ 
//前台首页
Route::any('/','Index\IndexController@index');
Route::prefix('/index')->group(function () {
	//登陆页面
	Route::any('/login','Index\UserController@login');
	//登陆
	Route::any('/reg','Index\UserController@reg');
	//讲师
	Route::any('/teacher/list','Index\TeacherController@list');
	//讲师详情
	Route::any('/teacher/teacher','Index\TeacherController@teacher');
	// 咨询
	Route::any('/article/list','Index\ArticleController@list');
	//咨询详情
	Route::any('/article/article','Index\ArticleController@article');
	//课程首页
	Route::any('/course/list','Index\CourseController@list');
	//课程首页
	Route::any('/course/coursecont','Index\CourseController@coursecont');
	//加入学习
	Route::any('/course/coursecont1','Index\CourseController@coursecont1');

	Route::any('/page/page','Index\PageController@page');
	Route::any('/page/contact','Index\PageController@contact');

	Route::any('/course/mycourse','Index\CourseController@mycourse');


	Route::any('/index/video','Index\VideoController@video');
});















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

?>