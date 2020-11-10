<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 题库
 */
class Catalog_bankController extends Controller
{
    //添加题库
    public function create(){
        return view('admin/course/catalog_bank/create');
    }
    //添加方法
    public function store(){
        return view('admin/course/catalog_bank/list');
    }
    //展示
    public function list(){
        return view('admin/course/catalog_bank/list');
    }
}
