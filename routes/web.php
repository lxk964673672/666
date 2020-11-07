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
    //首页
    Route::get('/index', 'Admin\IndexController@index');
    //注册
    Route::any('/regist', 'Admin\UserController@regist');
    //登陆   
    Route::any('/login', 'Admin\UserController@login');
    //权限
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
    Route::any('/course/category/delete/{id}', 'Admin\Course\CategoryController@delete');
    Route::any('/course/category/edit/{id}', 'Admin\Course\CategoryController@edit');
    Route::any('/course/category/update/{id}', 'Admin\Course\CategoryController@update');

    //课程
    Route::any('/course/course/create', 'Admin\Course\CourseController@create');
    Route::any('/course/course/store', 'Admin\Course\CourseController@store');
    Route::any('/course/course/list', 'Admin\Course\CourseController@list');


    //资讯
    Route::any('admin/information/create', 'Admin\InformationController@create');
    Route::any('admin/information/createdo', 'Admin\InformationController@createdo');
    Route::any('admin/information/list', 'Admin\InformationController@list');

});

?>