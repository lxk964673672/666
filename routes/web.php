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

    //课程公告
    Route::any('/course/notice/create','Admin\Course\NoticeController@create');
    Route::any('/course/notice/store','Admin\Course\NoticeController@store');
    Route::any('/course/notice/list','Admin\Course\NoticeController@list');

    //题库管理
    Route::any('/course/catalog_bank/create','Admin\Course\Catalog_bankController@create');
    Route::any('/course/catalog_bank/store','Admin\Course\Catalog_bankController@store');
    Route::any('/course/catalog_bank/list','Admin\Course\Catalog_bankController@list');

    //讲师添加
    Route::any('/course/teacher/create','Admin\Course\TeacherController@create');
    Route::any('/course/teacher/store','Admin\Course\TeacherController@store');
    Route::any('/course/teacher/list','Admin\Course\TeacherController@list');

    //考试添加
    Route::any('/course/exam/create','Admin\Course\ExamController@create');
    Route::any('/course/exam/store','Admin\Course\ExamController@store');
    Route::any('/course/exam/list','Admin\Course\ExamController@list');

    //作业添加
    Route::any('/course/users_job/create','Admin\Course\Users_jobController@create');
    Route::any('/course/users_job/store','Admin\Course\Users_jobController@store');
    Route::any('/course/users_job/list','Admin\Course\Users_jobController@list');










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

 
