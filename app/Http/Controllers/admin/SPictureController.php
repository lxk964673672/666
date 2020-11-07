<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//轮播图
class SPictureController extends Controller
{
    //添加
    public function create(){
    	if(Request()->isMethod("get")){
    		return view("/admin/SPicture/SPictureadd");
    	}
    	if(Request()->isMethod("post")){
    		dd(request()->post);
    	}
    }
    //展示
    public function list(){
    	return view("/admin/SPicture/SPictureshow");
    }








}
