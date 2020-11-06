<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function create()
    {
        return view('admin.slide.create');
    }
	public function store(){
	}

    public function list()
    {
        return view('admin.slide.list');
    }
}
