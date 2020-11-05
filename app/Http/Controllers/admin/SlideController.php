<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function create()
    {
        return view('admin.slide.create');
    }
    public function slideImg(Request $request){
		$arr = $_FILES["Filedata"];
    	$tmpName = $arr['tmp_name'];
    	$ext  = explode(".",$arr['name'])[1];
    	$newFileName = md5(time()).".".$ext;
    	$newFilePath = "./uploads/".$newFileName;
    	move_uploaded_file($tmpName, $newFilePath);
    	$newFilePath = trim($newFilePath,".");
    	echo $newFilePath;
	}

	public function addimg(){
		$data=request()->all();
		$data['add_time']=time();
//		dd($data);
//		dd(request()->slide_log);
		$slidemodel=new SlideModel();
		$res=$slidemodel->insert($data);
		if($res){
			$arr=[
				'code'=>'00000',
				'msg'=>"添加成功",
				'url'=>"/admin/slide/list"
			];
		}else{
			$arr=[
				'code'=>'00001',
				'msg'=>"添加失败"
			];
		}
		return json_encode($arr);
	}

    public function list()
    {
        return view('admin.slide.list');
    }
}
