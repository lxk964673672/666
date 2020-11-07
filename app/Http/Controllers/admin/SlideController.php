<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
//轮播图
class SlideController extends Controller
{
    public function create()
    {
       if(request()->isMethod("get")){
         $swei = Slide::orderBY("slide_weight",'desc')->first("slide_weight");
         $name = $swei->slide_weight+1;
         return view('admin.slide.create',["name"=>$name]);
       }
       if(request()->isMethod("post")){
            $slide_url = request()->post("slide_url");
            $Silde_name = request()->post("Silde_name");
            $silde_weight = request()->post("silde_weight");
            $is_show = request()->post("is_show");
            //地址
            $url = $_SERVER["SERVER_NAME"];
            $img_path = request()->post("img_path");
            $silde_log  = $url."/".$img_path;
            $slide_time = time();
            $namedesc = Slide::where("slide_weight",$silde_weight)->first();
            if(!empty($namedesc)){
                $username = [
                    "error"=>1,
                    "msg"=>"权重已存在，请更换",
                ];
                return json_encode($username);
            }
            $namedescs = Slide::where("slide_name",$Silde_name)->first();
            if(!empty($namedescs)){
                $username = [
                    "error"=>1,
                    "msg"=>"标题已存在，请更换",
                ];
                return json_encode($username);
            }
            $namedescsd = Slide::where("slide_url",$slide_url)->first();
            if(!empty($namedescsd)){
                $username = [
                    "error"=>1,
                    "msg"=>"地址已存在，请更换",
                ];
                return json_encode($username);
            }
            $data = [
                "slide_url"=>$slide_url,
                //权重
                "slide_weight"=>$silde_weight,
                //图片上传路径
                "silde_log"=>$img_path,
                //是否显示
                "is_show"=>$is_show,
                //添加时间
                "slide_time"=>$slide_time,
                //标题
                "slide_name"=>$Silde_name,
            ];
            $name = Slide::insert($data);
            if($name){
                $username = [
                    "error"=>0,
                    "msg"=>"添加成功",
                    "data"=>"/admin/slide/list",
                ];
                return json_encode($username);
            }else{
                $username = [
                    "error"=>1,
                    "msg"=>"添加失败",
                ];
                return json_encode($username);
            }
       }
    }
     //上传图片
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
        $newfilePath = "uploads/".$newfileName;
        // 函数将上传的文件移动到新位置
        move_uploaded_file($name,$newfilePath);
        //返回参数
        echo $newfilePath;
	}
    //展示
    public function list()
    {
        $name = Slide::where("is_del",1)->get()->toArray();
        return view('admin.slide.list',["name"=>$name]);
    }
    //删除
    public function del($id){
        $fgid="/^[0-9]*$/";
        if(!preg_match($fgid,$id)){
            return redirect("/admin/slide/list")->with("get","请不要测试我的耐性！");
        }
        $name = Slide::where("slide_id",$id)->update(["is_del"=>2]);
        if($name){
            return redirect("/admin/slide/list")->with("get","删除成功");
        }else{
            return redirect("/admin/slide/list")->with("get","抱歉，请尊重PHP");
        }
    }
    //修改数据
    public function upd($id){
        $fgid="/^[0-9]*$/";
        if(!preg_match($fgid,$id)){
            return redirect("/admin/slide/list")->with("get","请不要测试我的耐性！");
        }
        if(request()->isMethod('get')){
            $name = Slide::where("is_del",'1')->first();
            $swei = Slide::orderBY("slide_weight",'desc')->first("slide_weight");
            return view("admin.slide.upd",["name"=>$name,"swei"=>$swei]);
        }
        if(request()->isMethod("post")){
            $slide_url = request()->post("slide_url");
            $Silde_name = request()->post("Silde_name");
            $silde_weight = request()->post("silde_weight");
            $is_show = request()->post("is_show");
            $img_path = request()->post("img_path");
            $slide_time = time();
            $data = [
                "slide_url"=>$slide_url,
                //权重
                "slide_weight"=>$silde_weight,
                //图片上传路径
                "silde_log"=>$img_path,
                //是否显示
                "is_show"=>$is_show,
                //添加时间
                "slide_time"=>$slide_time,
                //标题
                "slide_name"=>$Silde_name,
            ];
            $name = Slide::where("slide_id",$id)->update($data);
            if($name){
                $username = [
                    "error"=>0,
                    "msg"=>"修改成功",
                    "data"=>"/admin/slide/list",
                ];
                return json_encode($username);
            }else{
                $username = [
                    "error"=>1,
                    "msg"=>"修改失败",
                ];
                return json_encode($username);
            }
        }
    }





}
