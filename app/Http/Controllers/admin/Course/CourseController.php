<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Category;

/**
 * 课程
 */
class CourseController extends Controller
{ 
	public function create(){
		$data = Category::get();
        $data = $this->CreateTree($data);
		return view('admin.course.course.create',['data'=>$data]);
	}
	public function store(){
		$data=request()->all();
		dd($data);
		$data=Course::insert($data);
		if($data){
			$arr=[
			    'code'=>'00000',
                'msg'=>'课程添加成功',
                "url"=>"/admin/course/course/list"
            ];
        }else{
            $arr = [
                'code'=>'00002',
                'msg'=>'课程添加失败'
            ];
        }
        return json_encode($arr,true);
	}
	
	public function list(){

		$data=Course::select();

		return view('admin.course.course.list',['data'=>$data]);
	}
}
