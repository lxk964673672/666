<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 课程详情
 */
class DetailController extends Controller
{ 
	public function create(){
		return view('admin.course.detail.create');
	}
	public function store(){
		return view('admin.course.detail.list');
	}
	public function list(){
		return view('admin.course.detail.list');
	}
}
