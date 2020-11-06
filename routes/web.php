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
    //资讯
    Route::any('information/create', 'Admin\InformationController@create');
    Route::any('information/store', 'Admin\InformationController@store');
    Route::any('information/list', 'Admin\InformationController@list');
});

?>