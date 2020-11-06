<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 课程
 */
class CourseController extends Controller
{ 
	public function create(){
		return view('admin.course.course.create');
	}
	public function store(){
		return view('admin.course.course.list');
	}
	public function list(){
		return view('admin.course.course.list');
	}
}
