<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 课程公告
 */

class NoticeController extends Controller
{
    //添加展示
    public function create(){
        return view('admin/course/notice/create');
    }
    //添加方法
    public function store(){
        return view('admin/course/notice/list');
    }
    //展示
    public function list(){
        return view('admin/course/notice/list');
    }
}
