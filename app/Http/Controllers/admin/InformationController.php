<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
class InformationController extends Controller
{
	//资讯添加
    public function create(){
    	 $information = Information::all();
    	return view("/admin/information/create");
    }
    //资讯添加方法
    public function createdo(Request $request){
    	$post = $request->except('_token');
        $post["infor_time"]=time();
        $post["infor_title"] = request()->input('infor_title');
        $post["infor_content"] = request()->input('infor_content');
        $post["infor_hot"] = request()->input('infor_hot');
        $data = Information::insert($post);
        // dd($data);
        if($data){
            return redirect('admin/admin/information/list');
        }
    	
    }
     //资讯展示
    public function list(){
    	$info=Information::get();
    	return view("/admin/information/list",["info"=>$info]);
    }
}
