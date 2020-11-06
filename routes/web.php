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
    Route::get('/index', 'Admin\IndexController@index');
    Route::any('/regist', 'Admin\UserController@regist');
    Route::any('/login', 'Admin\UserController@login');
    Route::any('/powerAdd', 'Admin\PowerController@powerAdd');
    Route::any('/powerList', 'Admin\PowerController@powerList');

    //轮播图
    Route::any('slide/create', 'Admin\SlideController@create');
    Route::any('slide/store', 'Admin\SlideController@store');
    Route::any('slide/list', 'Admin\SlideController@list');

    //课程目录
    Route::any('/course/catalog/create', 'Admin\Course\CatalogController@create');
    Route::any('/course/catalog/store', 'Admin\Course\CatalogController@store');
    Route::any('/course/catalog/list', 'Admin\Course\CatalogController@list');

    //课程分类
    Route::any('/course/category/create', 'Admin\Course\CategoryController@create');
    Route::any('/course/category/store', 'Admin\Course\CategoryController@store');
    Route::any('/course/category/list', 'Admin\Course\CategoryController@list');

    //课程
    Route::any('/course/course/create', 'Admin\Course\CourseController@create');
    Route::any('/course/course/store', 'Admin\Course\CourseController@store');
    Route::any('/course/course/list', 'Admin\Course\CourseController@list');

     //课程分类
    Route::any('/course/detail/create', 'Admin\Course\DetailController@create');
    Route::any('/course/detail/store', 'Admin\Course\DetailController@store');
    Route::any('/course/detail/list', 'Admin\Course\DetailController@list');

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

 
