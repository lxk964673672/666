<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Cookie;

class ArticleController extends Controller
{
    public function article(){
    	return view('index/article/article');
    }
    public function list(){
    	return view('index/article/list');
    }
}