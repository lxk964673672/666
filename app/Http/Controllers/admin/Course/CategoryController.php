<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Category;
/**
 * 课程分类
 */
class CategoryController extends Controller
{ 
	public function create(){
		$data = Category::get();
        $data = $this->CreateTree($data);
		return view('admin.course.category.create',['data'=>$data]);
	}
	public function store(){
		$parents_id = request()->parents_id;
        $cate_name = request()->cate_name;
        $cate_model = new Category();
        $data = [
            'parents_id'=>$parents_id,
            'cate_name'=>$cate_name
        ];
        $str = $cate_model->insert($data);
        // dd($str);
        if($str){
            $arr = [
                'code'=>"00000",
                'msg'=>'课程分类添加成功',
                'url'=>"/admin/course/category/list"
            ];
        }else{
            $arr = [
                'code'=>"00002",
                'msg'=>'课程分类添加失败'
            ];
        }
        return json_encode($arr,true);
	}
	public function list(){

        $parents_id=request()->parents_id??'';
        $where=[];
        if($parents_id){
            $where[]=['parents_id','like',"%$parents_id%"];
        }
       
		$data = Category::where($where)->paginate(5);
        
        //无限极分类
        $cate_data=Category::get();
        $cate_data=$this->CreateTree($cate_data);
        
        // 获取所有搜索条件 
        $query=request()->all();
        return view("admin.course.category.list",['data'=>$data,'cate_data'=>$cate_data,'query'=>request()->all()]);
	}
    public function delete(Request $request ,$cate_id){
        
        $cate = Category::where("parents_id",$cate_id)->first();
        // dd($cate);
        if($cate){
            return "<script>alert('该分类下有子分类');location.href='/admin/course/category/list'</script>";

                    }else{
            $res = Category::where("cate_id",$cate_id)->delete();
            // dd($res);
            if($res){
                return redirect("/admin/course/category/list");
            }else{
                return redirect("/admin/course/category/list");
            }
        }
    }
    public function edit($cate_id){
        $cate = Category::get();
        $cate = $this->CreateTree($cate);
        $category = Category::where("cate_id",$cate_id)->first();
        return view("admin.course.category.edit",compact("category","cate"));
    }
    public function update(Request $request, $cate_id){
        // dd($id); 
        $post = $request->except('_token');
        // dd($post);
        $cate = Category::where('cate_id',$cate_id)->update($post);
        // dd($cate);
        if($cate){
            $arr = [
                'code'=>"00000",
                'msg'=>'课程分类修改成功',
                'url'=>"/admin/course/category/list"
            ];
        }else{
            $arr = [
                'code'=>"00002",
                'msg'=>'课程分类修改失败',
                'url'=>"/admin/course/category/list"
            ];
        }
        return json_encode($arr,true);
    }
}
