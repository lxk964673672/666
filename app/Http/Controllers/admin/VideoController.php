<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//课程表
use App\Models\Course\Course;
//目录表
use App\Models\Course\Catalog;
//课程视频表
use App\Models\Video;
//课程视频
class VideoController extends Controller
{
    //catalog的视频添加
    public function create(){
    	if(request()->isMethod("get")){
    		$course = Course::where("is_del",'1')->get()->toArray();
    		$catalog  = Catalog::get()->toArray();
         	return view('/admin/video/videoadd',["course"=>$course,"catalog"=>$catalog]);
    	}
    	if(request()->isMethod("post")){
    		$cou_id = request()->post("cou_id");
    		$catalog_id = request()->post("catalog_id");
    		$video_name = request()->post("video_name");
    		$videodesc_img = request()->post("videodesc_img");
    		$video_length = request()->post("video_length");
    		/*
    		*模拟数据老师id
    		*/
    		$tea_id = '1';
    		$time = time();
    		///判断数据
            $namedesc = Video::where("video_name",$video_name)->first();
            if(!empty($namedesc)){
                $username = [
                    "error"=>1,
                    "msg"=>"视频名称已存在，请更换名称！",
                ];
                return json_encode($username);
            }
    		//*******************************************
    		$data = [
    			"cou_id"=>$cou_id,
    			"catalog_id"=>$catalog_id,
    			"video_name"=>$video_name,
    			"video_img"=>$videodesc_img,
    			"video_length"=>$video_length,
    			"tea_id"=>$tea_id,
    			"time"=>$time,
    		];
    		$name = Video::insert($data);
    		if($name){
                $username = [
                    "error"=>0,
                    "msg"=>"添加成功",
                    "data"=>'/admin/course/video/list',
                ];
                return json_encode($username);
    		}else{
                $username = [
                    "error"=>1,
                    "msg"=>"请不要挑战我的耐性！",
                ];
                return json_encode($username);
    		}
    	}
    }
    //展示 ///
    public function list(){
    	$name = Video::where("course_video.is_del",'1')->join('course',"course_video.cou_id","=","course.cou_id")->get()->toArray();
		return view('/admin/video/videoshow',["name"=>$name]);
    }
    //删除 ///
    public function del($id){
        $fgid="/^[0-9]*$/";
        if(!preg_match($fgid,$id)){
            return redirect("/admin/course/video/list")->with("get","抱歉，请尊重PHP");
        }
    	if(request()->isMethod("get")){
	        $name = Video::where("video_id",$id)->update(["is_del"=>2]);
	        if($name){
	            return redirect("/admin/course/video/list")->with("get","删除成功");
	        }else{
	            return redirect("/admin/course/video/list")->with("get","请不要测试我的耐性！");
	        }

    	}
    }
    //修改
    public function upd($id){
        $fgid="/^[0-9]*$/";
        if(!preg_match($fgid,$id)){
            return redirect("/admin/course/video/list")->with("get","请不要测试我的耐性！");
        }
    	if(request()->isMethod("get")){
    		$course = Course::where("is_del",'1')->get()->toArray();
    		$catalog  = Catalog::get()->toArray();
    		$name = Video::where(["course_video.is_del"=>'1',"course_video.video_id"=>$id])->join('course',"course_video.cou_id","=","course.cou_id")->first();
         	return view('/admin/video/videoupd',["course"=>$course,"catalog"=>$catalog,"name"=>$name]);
    	}
    	if(request()->isMethod("post")){
    		$cou_id = request()->post("cou_id");
    		$catalog_id = request()->post("catalog_id");
    		$video_name = request()->post("video_name");
    		$videodesc_img = request()->post("videodesc_img");
    		$video_length = request()->post("video_length");
    		/*
    		*模拟数据老师id
    		*/
    		$tea_id = '1';
    		$time = time();
    		///判断数据
    		$data = [
    			"cou_id"=>$cou_id,
    			"catalog_id"=>$catalog_id,
    			"video_name"=>$video_name,
    			"video_img"=>$videodesc_img,
    			"video_length"=>$video_length,
    			"tea_id"=>$tea_id,
    			"time"=>$time,
    		];
    		$name = Video::where("video_id",$id)->update($data);
    		if($name){
                $username = [
                    "error"=>0,
                    "msg"=>"添加成功",
                    "data"=>'/admin/course/video/list',
                ];
                return json_encode($username);
    		}else{
                $username = [
                    "error"=>1,
                    "msg"=>"请不要挑战我的耐性！",
                ];
                return json_encode($username);
    		}
    	}
    }
    //处理图片
    public function store(){
        //接参数
        $fileCharater = $_FILES["Filedata"];
        //赋变量
        $name =  $fileCharater["tmp_name"];
        //截取后缀名
        $ext = explode('.',$fileCharater["name"])[1];
        //重新赋变量
        $newfileName = MD5(time()).".".$ext;
        //拼接
        $newfilePath = "uploads/mp3/".$newfileName;
        // 函数将上传的文件移动到新位置
        move_uploaded_file($name,$newfilePath);
        //返回参数
        echo $newfilePath;
    }
}
