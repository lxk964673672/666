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
                'success'=>true,
                'msg'=>'课程分类添加成功'
            ];
        }else{
            $arr = [
                'success'=>false,
                'msg'=>'课程分类添加失败'
            ];
        }
        return json_encode($arr,true);
	}
	public function list(){
		$cate = Category::get();
        $cateInfo = $this->CreateTree($cate);

        return view("admin.course.category.list",compact("cateInfo"));
	}
    public function delete(Request $request ,$id){
        
        $cate = Category::where("parents_id",$id)->first();
        // dd($cate);
        if($cate){
            return "<script>alert('该分类下有子分类');location.href='/admin/course/category/list'</script>";

                    }else{
            $res = Category::where("cate_id",$id)->delete();
            // dd($res);
            if($res){
                return redirect("/admin/course/category/list");
            }else{
                return redirect("/admin/course/category/list");
            }
        }
    }
    public function edit($id){
        $cate = Category::get();
        $cate = $this->CreateTree($cate);
        $category = Category::where("cate_id",$id)->first();
        return view("admin.course.category.edit",compact("category","cate"));
    }
    public function update(Request $request, $id){
        // dd($id); 
        $post = $request->except('_token');
        // dd($post);
        $cate = Category::where('cate_id',$id)->update($post);
        // dd($cate);
        if($cate!==false){
            return "<script>alert('修改成功');location.href='/admin/course/category/list'</script>";

        }
    }
}
