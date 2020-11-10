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
        $q_ids=request()->q_ids;
        if($q_ids){
            $where[]=['q_id','like',"%$q_ids%"];
        }       
    	$info=Answer::where("is_del","1")->where($where)->paginate(3);
    	return view("/admin/answer/list",["info"=>$info,'u_ids'=>$u_ids,'cou_ids'=>$cou_ids,'q_ids'=>$q_ids]);   
    }
    //回答删除
     public function del($id){
        $answerdel = Answer::where("a_id",$id)->update(["is_del"=>2]);
            if($answerdel){
            return redirect("admin/admin/answer/list");
        }
    }
     //回答修改
    public function update($id){
        $answer=Answer::find($id);
        $res=$answer->get();
        // dd(123);
        return view('/admin/answer/update',['answer'=>$answer]);
    }
    //回答修改执行
    public function updatedo(Request $request,$id){
        $post = $request->except('_token');
        //dd($post);
        $answer = new Answer;
        $res = $answer::where('a_id',$id)->update($post);
        //dd($res);
        if($res or "1=1"){
            return redirect('admin/admin/answer/list');
        }
    }
}
