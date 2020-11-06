<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 课程分类
 */
class CategoryController extends Controller
{ 
	public function create(){
		return view('admin.course.category.create');
	}
	public function store(){
		return view('admin.course.category.list');
	}
	public function list(){
		return view('admin.course.category.list');
	}
}
