<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Category;
use App\Models\Course\Log;
/**
 * 课程目录
 */
class CatalogController extends Controller
{ 
	public function create($cou_id){
		$data=Course::where('cou_id',$cou_id)->first();

		return view('admin.course.catalog.create',['data'=>$data]);
	}
	public function store(){
		$data = request()->all();

        $str = Log::insert($data);
        // dd($str);
        if($str){
            $arr = [
                'code'=>"00000",
                'msg'=>'课程目录添加成功',
                'url'=>"/admin/course/course/list"
            ];
        }else{
            $arr = [
                'code'=>"00002",
                'msg'=>'课程目录添加失败'
            ];
        }
        return json_encode($arr,true);
	}
	public function list(){
		return view('admin.course.catalog.list');
	}
	public function delete(Request $request ,$catalog_id){
     
            $res = Log::where("catalog_id",$catalog_id)->delete();
            // dd($res);
            if($res){
                return "<script>alert('删除章节成功');location.href='/admin/course/course/list'</script>";
            }else{
                return "<script>alert('删除章节失败');location.href='/admin/course/course/list'</script>";
            }
    }
}
