<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Cookie;

class CourseController extends Controller
{
    public function coursecont1(){
    	return view('index/course/coursecont1');
    }
    public function list(){
    	return view('index/course/list');
    }
    public function mycourse(){
    	return view('index/course/mycourse');
    }
    public function detail(){
        return view('index/course/detail');
    }
}