<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * 讲师
 */
class TeacherController extends Controller
{
    //添加页面
    public function create(){
        return view('admin/course/teacher/create');
    }
    //添加方法
    public function store(){
        return view('admin/course/teacher/list');
    }
    //展示
    public function list(){
        return view('admin/course/teacher/list');
    }
}
