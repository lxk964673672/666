<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Cookie;

class CourseController extends Controller
{
    public function coursecont(){
    	return view('index/course/coursecont');
    }
    public function coursecont1(){
    	return view('index/course/coursecont1');
    }
    public function list(){
    	return view('index/course/list');
    }
    public function mycourse(){
    	return view('index/course/mycourse');
    }
}