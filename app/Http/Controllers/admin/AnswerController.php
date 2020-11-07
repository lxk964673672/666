<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
class AnswerController extends Controller
{
     //回答添加
    public function create(){
    	$answer = Answer::all();
    	return view("/admin/answer/create");
    }
    //回答添加方法
    public function createdo(Request $request){
    	$post = $request->except('_token');
        $post["a_time"]=time();
        $post["a_content"] = request()->input('a_content');
        $post["u_id"] = request()->input('u_id');
        $post["cou_id"] = request()->input('cou_id');
         $post["q_id"] = request()->input('q_id');
        $data = Answer::insert($post);
        // dd($data);
        if($data){
            return redirect('admin/admin/answer/list');
        }
    }
    //回答展示
    public function list(){
    	$info=Answer::where("is_del","1")->get();
    	return view("/admin/answer/list",["info"=>$info]);
    
}
}
