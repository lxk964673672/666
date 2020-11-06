<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 课程目录
 */
class CatalogController extends Controller
{ 
	public function create(){
		return view('admin.course.catalog.create');
	}
	public function store(){
		return view('admin.course.catalog.list');
	}
	public function list(){
		return view('admin.course.catalog.list');
	}
}
