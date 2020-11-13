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

        $a=Request()->session()->get('adminData');
        $b=$a['admin_id'];
        $data['admin_id']=$b;

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
        $a=Request()->session()->get('adminData');
        $b=$a['admin_id'];
        $c=$a['admin_name'];
		$data=Course::where('admin_id',$b)->leftJoin('course_category','course.cate_id','=','course_category.cate_id')->paginate(5);
        
		return view('admin.course.course.list',['data'=>$data,'c'=>$c]);
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
        $data = Course::where('cou_id',$cou_id)->update($post);
        // dd($data);
        // dd($cate); 
        if($data){
            $arr = [
                'code'=>"00000",
                'msg'=>'课程修改成功',
                'url'=>"/admin/course/course/list"
            ];
        }else{
            $arr = [
                'code'=>"00002",
                'msg'=>'课程修改失败',
                'url'=>"/admin/course/course/list"
            ];
        }
        return json_encode($arr,true);
    }
	public function delete(Request $request ,$cou_id){
     
            $res = Course::where("cou_id",$cou_id)->delete();
            // dd($res);
            if($res){
                return redirect("/admin/course/course/list");
            }else{
                return redirect("/admin/course/course/list");
            }
    }
    public function detail($cou_id){
        $a=Request()->session()->get('adminData');
        $b=$a['admin_id'];
        $c=$a['admin_name'];
        $log=Log::where('cou_id',$cou_id)->paginate(5);
        $data=Course::where("cou_id",$cou_id)->first();
        return view('admin.course.course.detail',['data'=>$data,'log'=>$log,'c'=>$c]);

    }
    public function details($catalog_id){
        $data=Log::where('catalog_id',$catalog_id)->first();
        return view('admin.course.course.details',['data'=>$data]);

    }

}
