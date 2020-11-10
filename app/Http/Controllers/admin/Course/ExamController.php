<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/** 
 * 考试
 * 
*/
class ExamController extends Controller
{
    //添加展示
    public function create(){
        return view('admin/course/exam/create');
    }
    //添加方法
    public function store(){
        return view('admin/course/exam/list');
    }
    //展示
    public function list(){
        return view('admin/course/exam/list');
    }
}
