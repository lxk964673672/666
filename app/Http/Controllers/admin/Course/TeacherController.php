<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Category;
use App\Models\Course\TeacherModel;

/**
 * 讲师
 */
class TeacherController extends Controller
{
    //添加页面
    public function create(){
        $a=Request()->session()->get('adminData');
        $admin_id=$a['admin_id'];
        $where=[
           ['tea_del','=','1'],
           ['admin_id','=',$admin_id]
        ];
        $res=TeacherModel::where($where)->first();
        if($res){
       return "<script>alert('资料已经填写过');location.href='/admin/course/teacher/list'</script>";

    }

        $data = Category::get();
        $data = $this->CreateTree($data);
        return view('admin/course/teacher/create',['data'=>$data]);
    }
    //添加方法
    public function store(){

        $data = request()->post();
        $a=Request()->session()->get('adminData');
        $b=$a['admin_id'];
        
        $data['admin_id']=$b;
        // dd($post);
        $data = TeacherModel::insert($data);
        // dd($data);
        if($data){
			$arr = [
			    'code' => '00000',
                'msg' => '讲师添加成功',
                "url" => "/admin/course/teacher/list"
            ];
        }else{
            $arr = [
                'code' => '00002',
                'msg' => '讲师添加失败',
                "url" => "/admin/course/teacher/create"
            ];
        }
        return json_encode($arr,true);
    }
    
    //展示
    public function list(){
         $a=Request()->session()->get('adminData');
        $admin_id=$a['admin_id'];
        
        //搜索
        $tea_name = request()->tea_name;
        // dump($tea_name);
        $where=[];
        if($tea_name){
            $where[]=['tea_name','like',"%$tea_name%"];

        }
        $wheres=[
           ['admin_id','=',$admin_id],
           ['tea_del','=','1']
        ];
        $teacher = TeacherModel::join('course_category','teacher.cate_id','=','course_category.cate_id')
        ->where($wheres)
        ->where($where)
        ->paginate(4);
        // dd($teacher);
        return view('admin/course/teacher/list',['teacher'=>$teacher,'tea_name'=>$tea_name]);
    }

    //删除
    public function del(){
        $post = request()->all();
        // dd($post);
        $teacher = TeacherModel::where("tea_id",$post)->first();
        // dd($teacher);
        $teacher->tea_del = 2;
        // dd($teacher);
 		$res = $teacher->save();
 		return json_encode(["code"=>"0000","msg"=>"删除成功"]);
    }

    //修改页面
    public function edit($id){
        $category = Category::all();
        $data = $this->CreateTree($category);
        // dd($category);
        $teacher = TeacherModel::find($id);
        // dd($teacher);
        return view('admin/course/teacher/edit',['data'=>$data,'teacher'=>$teacher]);
    }

    //修改方法 
    public function update($id){
        $data = request()->post();
        // dd($data);
        $res = TeacherModel::where('tea_id',$id)->update($data);
        // dd($res);
        if($res!==false){
            return "<script>alert('修改成功');location.href='/admin/course/teacher/list'</script>";

        }
    }
}

