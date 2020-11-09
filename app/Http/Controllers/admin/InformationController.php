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
        $title=request()->title;
        //dd($title);
        $where=[];
        if($title){
            $where[]=['infor_title','like',"%$title%"];
        }
        $content=request()->content;
        if($content){
            $where[]=['infor_content','like',"%$content%"];
        }
        $infor_hots=request()->infor_hots;
        if($infor_hots){
            $where[]=['infor_hot','like',"%$infor_hots%"];
        }    
    	$info=Information::where("is_del","1")->where($where)->paginate(3);
    	return view("/admin/information/list",["info"=>$info,"title"=>$title,"content"=>$content,"infor_hots"=>$infor_hots]);
    }
    //资讯删除(软删除)
    public function del($id){
    	$informationdel = Information::where("infor_id",$id)->update(["is_del"=>2]);
    		if($informationdel){
    		return redirect("admin/admin/information/list");
    	}
    }
    //资讯修改
    public function update($id){
    	$information=Information::find($id);
        $res=$information->get();
        // dd(123);
        return view('/admin/information/update',['information'=>$information]);
    }
    //资讯修改执行
    public function updatedo(Request $request,$id){
    	$post = $request->except('_token');
        //dd($post);
        $information = new Information;
        $res = $information::where('infor_id',$id)->update($post);
        //dd($res);
        if($res or "1=1"){
            return redirect('admin/admin/information/list');
        }
    }
}
