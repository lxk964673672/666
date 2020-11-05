<?php
//前台首页
Route::any('/','Index\IndexController@index');
//登陆页面
Route::any('/index/login','Index\UserController@login');
//登陆
Route::any('/index/reg','Index\UserController@reg');

 
 

/**
 * 后台
 */
Route::prefix('admin')->group(function () {
    Route::get('/index', 'admin\IndexController@index');
    Route::any('/regist', 'admin\UserController@regist');
    Route::any('/login', 'admin\UserController@login');
    Route::any('/powerAdd', 'admin\UserController@powerAdd');
    Route::any('/powerList', 'admin\UserController@powerList');

    //图片添加 第三方插件
    Route::any('/slide/uploads', 'admin\SlideController@uploads');
    //轮播图
    Route::any('/slide/create', 'admin\SlideController@create');
    Route::any('/slide/store', 'admin\SlideController@store');
    Route::any('/slide/list', 'admin\SlideController@list');
});

Route::any('/index/video','Index\VideoController@video');

//教师
Route::any('/index/teacher/teacher','Index\TeacherController@teacher');
Route::any('/index/teacher/list','Index\TeacherController@list');

Route::any('/index/article/article','Index\ArticleController@article');
Route::any('/index/article/list','Index\ArticleController@list');


Route::any('/index/course/coursecont','Index\CourseController@coursecont');
Route::any('/index/course/coursecont1','Index\CourseController@coursecont1');
Route::any('/index/course/list','Index\CourseController@list');
Route::any('/index/course/mycourse','Index\CourseController@mycourse');

Route::any('/index/page/page','Index\PageController@page');
Route::any('/index/page/contact','Index\PageController@contact');

 
