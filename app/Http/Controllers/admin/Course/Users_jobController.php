<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



/** 
 * 作业
*/
class Users_jobController extends Controller
{
    //添加展示
    public function create(){
        return view('admin/course/users_job/create');
    }
    //添加方法
    public function store(){
        return view('admin/course/users_job/list');
    }
    //展示
    public function list(){
        return view('admin/course/users_job/list');
    }
}
