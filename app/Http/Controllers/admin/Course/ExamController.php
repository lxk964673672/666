<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\ExamModel;
use App\Models\Course\Catalog_bankModel as Back;
use App\Models\Course\Catalog;
use Illuminate\Support\Facades\DB;

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

    //添加考试题
    public function examBackAdd(){
        if (Request()->ajax()){
            $data = Request()->post();
            $bank_id = implode(',',$data['bank_id']);
            $a = DB::table('shop_exam_bank')->where('exam_id',$data['exam_id'])->first();
            if ($a){
                $res = DB::table('shop_exam_bank')->update(['exam_id'=>$data['exam_id'],'bank_id'=>$bank_id]);
            }else{
                $res = DB::table('shop_exam_bank')->insert(['exam_id'=>$data['exam_id'],'bank_id'=>$bank_id]);
            }
            if ($res){
                return json_encode(['code'=>1,'msg'=>'添加成功','url'=>'/admin/course/exam/list']);
            }else{
                return json_encode(['code'=>2,'msg'=>'添加失败','url'=>'/admin/course/exam/examBackAdd']);
            }
        }
        $id = Request()->get('id');
        if (empty($id)){
            echo "请登录查看详情";die;
        }
        $bank_name = request()->bank_name;
        $catalog_id = request()->catalog_id;
        $where = [];
        if($bank_name){
            $where[]=['bank_name','like',"%$bank_name%"];
        }
        if($catalog_id){
            $where[]=['catalog_name','=',$catalog_id];
        }
        $bank1 = Back::join('course_catalog','catalog_bank.catalog_id','=','course_catalog.catalog_id')
            ->where("bank_del","1")
            ->where($where)
            ->paginate(10);
        $bank = arr($bank1);
        $select = [];
        $catalogData = Catalog::get(['catalog_id','catalog_name']);
        foreach ($bank['data'] as $k=>$v){
            $select[$v['bank_id']][]=explode(',',$v['select1']);
            $select[$v['bank_id']][]=explode(',',$v['select2']);
            $select[$v['bank_id']][]=explode(',',$v['select3']);
            $select[$v['bank_id']][]=explode(',',$v['select4']);
        }
        return view('admin/course/exam/examBackAdd',['exam_id'=>$id,'catalogData'=>$catalogData,'select'=>$select,'bank_name'=>$bank_name,'bank'=>$bank1,'catalog_id'=>$catalog_id]);
    }
    //展示考试题
    public function examBackList(){
        $id = Request()->get('id');
        if (empty($id)){
            echo "请登录查看详情";die;
        }
        $bank_id = DB::table('shop_exam_bank')->where('exam_id',$id)->first('bank_id');
        $bank_id = arr($bank_id);
        $bank_id=explode(',',$bank_id['bank_id']);
        $bank_name = request()->bank_name;
        $catalog_id = request()->catalog_id;
        $where = [];
        if($bank_name){
            $where[]=['bank_name','like',"%$bank_name%"];
        }
        if($catalog_id){
            $where[]=['catalog_name','=',$catalog_id];
        }
        $bank1 = Back::join('course_catalog','catalog_bank.catalog_id','=','course_catalog.catalog_id')
            ->where("bank_del","1")
            ->whereIn('bank_id',$bank_id)
            ->where($where)
            ->paginate(4);
        $bank = arr($bank1);
        $select = [];
        $catalogData = Catalog::get(['catalog_id','catalog_name']);
        foreach ($bank['data'] as $k=>$v){
            $select[$v['bank_id']][]=explode(',',$v['select1']);
            $select[$v['bank_id']][]=explode(',',$v['select2']);
            $select[$v['bank_id']][]=explode(',',$v['select3']);
            $select[$v['bank_id']][]=explode(',',$v['select4']);
        }

        return view('admin/course/exam/examBackList',['catalogData'=>$catalogData,'select'=>$select,'bank_name'=>$bank_name,'bank'=>$bank1]);
    }
}
