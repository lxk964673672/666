<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{
    public function page(){
    	return view('index/page/page');
    }
    public function contact(){
    	return view('index/page/contact');
    }
}