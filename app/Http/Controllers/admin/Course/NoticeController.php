<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\NoticeModel;
use App\Models\Course\Course;


/**
 * 课程公告
 */

class NoticeController extends Controller
{
    //添加展示
    public function create(){
        $data = Course::get();
        // dd($data);
        return view('admin/course/notice/create',['data'=>$data]);
    }
    //添加方法
    public function store(){
        $data = request()->all();
        // dd($data);
        $data['create_time'] = time();
        // dd($data);
        $notice = NoticeModel::insert($data);
        // dd($data);
        if($notice){
            $arr = [
                'code' => '0000',
                'msg' => '添加成功',
                "url" => "/admin/course/notice/list",
            ];
        }else{
            $arr = [
                'code' => '00002',
                'msg' => '添加失败',
                "url" => "/admin/course/notice/create",
            ];
        }
        return json_encode($arr,true);
    }
    //展示
    public function list(){
        $cou_name = request()->cou_name;
        // dump($cou_name);
        $where = [];
        if($cou_name){
            $where[] = ["cou_name","like","%$cou_name%"];
        }
        $notice = NoticeModel::join("course","course_notice.cou_id","=","course.cou_id")
        ->where("notice_del","1")
        ->where($where)
        ->paginate(5);
        // dd($notice);
        return view('admin/course/notice/list',['notice'=>$notice,'cou_name'=>$cou_name]);
    }

    //软删除
    public function del(){
        $post = request()->all();
        // dd($post);
        $notice = NoticeModel::where("notice_id",$post)->first();
        // dd($notice);
        $notice->notice_del = 2;
        $res = $notice->save();
        // dd($res);
        return json_encode(["code"=>"0000","msg"=>"删除成功"]);
    }

    //修改
    public function edit($id){
        $data = Course::get();
        $notice = NoticeModel::find($id);
        return view('admin/course/notice/edit',['data'=>$data,'notice'=>$notice]);
    }

    //修改方法
    public function update($id){
        $data =request()->post();
        // dd($data);
        $res = NoticeModel::where("notice_id",$id)->update($data);
        // dd($res);
        if($res!=false){
            return "<script>alert('修改成功');location.href='/admin/course/notice/list'</script>";
        }
    }
}
