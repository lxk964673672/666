<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NavigationController extends Controller
{
    //
    public function create(){
    	if(request()->isMethod("get")){
			return view("/admin/navigation/create");
    	}
    	if(request()->isMethod("post")){
    		$nav_name = request()->post("nav_name");
    		$nav_url = request()->post("nav_url");
    		$is_show = request()->post("is_show");
    		$time = time();
    		$names = DB::table("nav")->where("nav_name",$nav_name)->first();
			if(!empty($names)){
				return json_encode(["error"=>1,"msg"=>'请不要添加重复的名称']);
			}
			$nameas = DB::table("nav")->where("nav_url",$nav_url)->first();
			if(!empty($nameas)){
				return json_encode(["error"=>1,"msg"=>'请不要添加重复的路径']);
			}
    		$data = [
    			"nav_name"=>$nav_name,
    			"nav_url"=>$nav_url,
    			"is_show"=>$is_show,
    			"add_time"=>$time,
    		];
    		$name = DB::table("nav")->insert($data);
    		if($name){
    			return json_encode(["error"=>0,"msg"=>'添加成功',"data"=>"/admin/navigation/list"]);
    		}else{
    			return json_encode(["error"=>1,"msg"=>'添加失败']);
    		}
    	}
    }
    public function list(){
    	$name = DB::table("nav")->where("is_del",'1')->paginate(5);
    	if(request()->ajax()){
    		return view("/admin/navigation/ajaxlist",["name"=>$name]);
    	}
    	return view("/admin/navigation/list",["name"=>$name]);
    }
    public function del($id){
    	$name = DB::table("nav")->where(["nav_id"=>$id])->update(["is_del"=>'2']);
    	if($name){
    		return redirect("/admin/navigation/list");
    	}else{
    		return redirect("/admin/navigation/list");	
    	}
    }
    public function upd($id){
    	if(request()->isMethod("get")){
    		$name = DB::table("nav")->where("nav_id",$id)->first();
			return view("/admin/navigation/upd",["name"=>$name]);
    	}
    	if(request()->isMethod("post")){
    		$nav_name = request()->post("nav_name");
    		$nav_url = request()->post("nav_url");
    		$is_show = request()->post("is_show");
    		$time = time();
    		$data = [
    			"nav_name"=>$nav_name,
    			"nav_url"=>$nav_url,
    			"is_show"=>$is_show,
    			"add_time"=>$time,
    		];
    		$where=["nav_id"=>$id];
    		$name = DB::table("nav")->where($where)->update($data);
    		if($name){
    			return json_encode(["error"=>0,"msg"=>'修改成功',"data"=>"/admin/navigation/list"]);
    		}else{
    			return json_encode(["error"=>1,"msg"=>'修改失败']);
    		}
    	}
    }
}
