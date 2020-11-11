<?php
 











Route::middleware('rbac')->group(function () {
    //后台首页登陆 验证登陆
    Route::any('/', 'Admin\IndexController@Index');
});
//登陆
Route::any('/admin/login', 'Admin\UserController@login');
Route::any('/admin/tc', 'Admin\UserController@tc');
/**
 * 后台
 */
Route::prefix('/admin')->middleware('rbac')->group(function () {
    //首页
    Route::get('/index', 'Admin\IndexController@index');
    //权限
    Route::any('/powerAdd', 'Admin\PowerController@powerAdd');
    Route::any('/powerList', 'Admin\PowerController@powerList');
    //管理员添加
    Route::any('/adminAdd', 'Admin\AdminController@adminAdd');
    Route::any('/adminList', 'Admin\AdminController@adminList');
    //角色添加
    Route::any('/roleAdd', 'Admin\RoleController@roleAdd');
    Route::any('/roleList', 'Admin\RoleController@roleList');
    //角色权限添加
    Route::any('/adminRoleAdd', 'Admin\AdminRole@adminRoleAdd');
    Route::any('/adminRoleList', 'Admin\AdminRole@adminRoleList');
    //管理员角色添加
    Route::any('/rolePowerAdd', 'Admin\RolePower@rolePowerAdd');
    Route::any('/rolePowerList', 'Admin\RolePower@rolePowerList');

    //轮播图
    Route::any('/slide/create', 'admin\SlideController@create');
    Route::any('/slide/store', 'admin\SlideController@store');
    Route::any('/slide/list', 'admin\SlideController@list');
    Route::any('/slide/del/{id}', 'admin\SlideController@del');
    Route::any('/slide/upd/{id}', 'admin\SlideController@upd');

    //课程目录
    Route::any('/course/catalog/create/{cou_id}', 'Admin\Course\CatalogController@create');
    Route::any('/course/catalog/store', 'Admin\Course\CatalogController@store');
    Route::any('/course/catalog/list', 'Admin\Course\CatalogController@list');
    Route::any('/course/catalog/delete/{catalog_id}', 'Admin\Course\CatalogController@delete');

    //课程分类
    Route::any('/course/category/create', 'Admin\Course\CategoryController@create');
    Route::any('/course/category/store', 'Admin\Course\CategoryController@store');
    Route::any('/course/category/list', 'Admin\Course\CategoryController@list');
    Route::any('/course/category/delete/{id}', 'Admin\Course\CategoryController@delete');
    Route::any('/course/category/edit/{cate_id}', 'Admin\Course\CategoryController@edit');
    Route::any('/course/category/update/{cate_id}', 'Admin\Course\CategoryController@update');

    //课程
    Route::any('/course/course/create', 'Admin\Course\CourseController@create');
    Route::any('/course/course/store', 'Admin\Course\CourseController@store');
    Route::any('/course/course/list', 'Admin\Course\CourseController@list');
    Route::any('/course/course/edit/{cou_id}', 'Admin\Course\CourseController@edit');
    Route::any('/course/course/update/{cou_id}', 'Admin\Course\CourseController@update');
    Route::any('/course/course/delete/{cou_id}', 'Admin\Course\CourseController@delete');
    Route::any('/course/course/detail/{cou_id}', 'Admin\Course\CourseController@detail');
    Route::any('/course/course/details/{catalog_id}', 'Admin\Course\CourseController@details');
    
   
    //课程公告
    Route::any('/course/notice/create','Admin\Course\NoticeController@create');
    Route::any('/course/notice/store','Admin\Course\NoticeController@store');
    Route::any('/course/notice/list','Admin\Course\NoticeController@list');

    //题库管理
    Route::any('/course/catalog_bank/create','Admin\Course\Catalog_bankController@create');
    Route::any('/course/catalog_bank/store','Admin\Course\Catalog_bankController@store');
    Route::any('/course/catalog_bank/list','Admin\Course\Catalog_bankController@list');
    Route::any('/course/catalog_bank/del','Admin\Course\Catalog_bankController@del');
    Route::any('/course/catalog_bank/edit/{id}','Admin\Course\Catalog_bankController@edit');
    Route::any('/course/catalog_bank/update/{id}','Admin\Course\Catalog_bankController@update');

    //讲师
    Route::any('/course/teacher/create','Admin\Course\TeacherController@create');
    Route::any('/course/teacher/store','Admin\Course\TeacherController@store');
    Route::any('/course/teacher/list','Admin\Course\TeacherController@list');
    Route::any('/course/teacher/del','Admin\Course\TeacherController@del');
    Route::any('/course/teacher/edit/{id}','Admin\Course\TeacherController@edit');
    Route::any('/course/teacher/update/{id}','Admin\Course\TeacherController@update');


    //考试添加
    Route::any('/course/exam/create','Admin\Course\ExamController@create');
    Route::any('/course/exam/store','Admin\Course\ExamController@store');
    Route::any('/course/exam/list','Admin\Course\ExamController@list');
    Route::any('/course/exam/del','Admin\Course\ExamController@del');

    //作业添加
    Route::any('/course/users_job/create','Admin\Course\Users_jobController@create');
    Route::any('/course/users_job/store','Admin\Course\Users_jobController@store');
    Route::any('/course/users_job/list','Admin\Course\Users_jobController@list');

    //视频课程
    Route::any('/course/video/create', 'admin\VideoController@create');
    Route::any('/course/video/store', 'admin\VideoController@store');
    Route::any('/course/video/list', 'admin\VideoController@list');
    Route::any('/course/video/del/{id}', 'admin\VideoController@del');
    Route::any('/course/video/upd/{id}', 'admin\VideoController@upd');

    //资讯
    Route::any('admin/information/create', 'Admin\InformationController@create');
    Route::any('admin/information/createdo', 'Admin\InformationController@createdo');
    Route::any('admin/information/list', 'Admin\InformationController@list');
    Route::any('admin/information/del/{id}', 'Admin\InformationController@del');
    Route::any('admin/information/update/{id}', 'Admin\InformationController@update');
    Route::any('admin/information/updatedo/{id}', 'Admin\InformationController@updatedo');


    //提问
    Route::any('admin/question/create', 'Admin\QuestionController@create');
    Route::any('admin/question/createdo', 'Admin\QuestionController@createdo');
    Route::any('admin/question/list', 'Admin\QuestionController@list');
    Route::any('admin/question/del/{id}', 'Admin\QuestionController@del');
    Route::any('admin/question/update/{id}', 'Admin\QuestionController@update');
    Route::any('admin/question/updatedo/{id}', 'Admin\QuestionController@updatedo');


    //回答
    Route::any('admin/answer/create', 'Admin\AnswerController@create');
    Route::any('admin/answer/createdo', 'Admin\AnswerController@createdo');
    Route::any('admin/answer/list', 'Admin\AnswerController@list');
    Route::any('admin/answer/del/{id}', 'Admin\AnswerController@del');
    Route::any('admin/answer/update/{id}', 'Admin\AnswerController@update');
    Route::any('admin/answer/updatedo/{id}', 'Admin\AnswerController@updatedo');

});

?>
