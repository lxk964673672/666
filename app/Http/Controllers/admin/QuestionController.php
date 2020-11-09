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
        $u_ids=request()->u_ids;
        //dd($u_ids);
        $where=[];
        if($u_ids){
            $where[]=['u_id','like',"%$u_ids%"];
        }
        $cou_ids=request()->cou_ids;
        if($cou_ids){
            $where[]=['cou_id','like',"%$cou_ids%"];
        }
        $q_titles=request()->q_titles;
        if($q_titles){
            $where[]=['q_title','like',"%$q_titles%"];
        }  
        $q_browses=request()->q_browses;
        if($q_browses){
            $where[]=['q_browse','like',"%$q_browses%"];
        }    
    	$info=Question::where(["is_del"=>"1","is_show"=>"1"])->where($where)->paginate(3);
    	return view("/admin/question/list",["info"=>$info,"u_ids"=>$u_ids,"cou_ids"=>$cou_ids,"q_titles"=>$q_titles,"q_browses"=>$q_browses]);   
    }
    //提问删除
     public function del($id){
        $questiondel = Question::where("q_id",$id)->update(["is_del"=>2]);
            if($questiondel){
            return redirect("admin/admin/question/list");
        }
    }
    //提问修改
    public function update($id){
        $question=Question::find($id);
        $res=$question->get();
        // dd(123);
        return view('/admin/question/update',['question'=>$question]);
    }
    //提问修改执行
    public function updatedo(Request $request,$id){
        $post = $request->except('_token');
        //dd($post);
        $question = new Question;
        $res = $question::where('q_id',$id)->update($post);
        //dd($res);
        if($res or "1=1"){
            return redirect('admin/admin/question/list');
        }
    }
}
