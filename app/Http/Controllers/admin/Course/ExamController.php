<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\ExamModel;

/** 
 * 考试
 * 
*/
class ExamController extends Controller
{
    //添加展示
    public function create(){
        return view('admin/course/exam/create');
    }
    //添加方法
    public function store(){
        $data = request()->post();
        // dd($data);
        $data['exam_time']=time();
        // dump($data);
        $res = ExamModel::insert($data);
        // dd($res);
        if($res){
			$arr = [
			    'code' => '00000',
                'msg' => '添加成功',
                "url" => "/admin/course/exam/list"
            ];
        }else{
            $arr = [
                'code' => '00002',
                'msg' => '添加失败',
                "url" => "/admin/course/exam/create"
            ];
        }
        return json_encode($arr,true);
    }

    //展示
    public function list(){
        $exam_name = request()->exam_name;
        $where = [];
        if($exam_name){
            $where[]=["exam_name","like","%$exam_name%"];
        }
        $exam = ExamModel::where($where)->where("exam_del","1")->paginate(5);
        // dd($exam);
        return view('admin/course/exam/list',['exam'=>$exam,'exam_name'=>$exam_name]);
    }

    //软删除
    public function del(){
        $post = request()->all();
        // dd($post);
        $exam = ExamModel::where("exam_id",$post)->first();
        // dd($exam);
        $exam ->exam_del =2;
        // dd($exam);
        $res = $exam ->save();
        // dd($res);
        return json_encode(["code"=>"0000","msg"=>"删除成功"]);
    }
}
