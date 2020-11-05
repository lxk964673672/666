<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Cookie;

class VideoController extends Controller
{
    public function video(){
    	return view('index/video');
    }
}