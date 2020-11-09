<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Category;
use App\Models\Course\Log;

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
		$data['cou_time']=time();
		// dd($data);
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

		$data=Course::leftJoin('course_category','course.cate_id','=','course_category.cate_id')->get();

		return view('admin.course.course.list',['data'=>$data]);
	}
	public function edit($cou_id){
		$cate = Category::get();
        $cate = $this->CreateTree($cate);
         

        $data=Course::leftJoin('course_category','course.cate_id','=','course_category.cate_id')
        ->where("cou_id",$cou_id)
        ->first();

        return view("admin.course.course.edit",compact("data","cate"));
	}

	public function update(Request $request, $cou_id){
        // dd($id); 
        $post = $request->except('_token');
        // dd($post);
        // dd($post);
        $cate = Course::where('cou_id',$cou_id)->update($post);
        // dd($cate);
        if($cate!==false){
            return "<script>alert('修改成功');location.href='/admin/course/course/list'</script>";

        }
    }
	public function delete(Request $request ,$cou_id){
     
            $res = Course::where("cou_id",$cou_id)->delete();
            // dd($res);
            if($res){
                return "<script>alert('删除成功');location.href='/admin/course/course/list'</script>";
            }else{
                return "<script>alert('删除失败');location.href='/admin/course/course/list'</script>";
            }
    }
    public function detail($cou_id){
        $log=Log::where('cou_id',$cou_id)->get();
        $data=Course::where("cou_id",$cou_id)->first();
        return view('admin.course.course.detail',['data'=>$data,'log'=>$log]);

    }
}
