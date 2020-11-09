<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
    //提问添加
    public function create(){
    	$question = Question::all();
    	return view("/admin/question/create");
    }
    //提问添加方法
    public function createdo(Request $request){
    	$post = $request->except('_token');
        $post["q_time"]=time();
        $post["q_title"] = request()->input('q_title');
        $post["q_browse"] = request()->input('q_browse');
        $post["q_name"] = request()->input('q_name');
        $data = Question::insert($post);
        // dd($data);
        if($data){
            return redirect('admin/admin/question/list');
        }
    }
    //提问展示
    public function list(){
    	$info=Question::where(["is_del"=>"1","is_show"=>"1"])->get();
    	return view("/admin/question/list",["info"=>$info]);
    
}
}
