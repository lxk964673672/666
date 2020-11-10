<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Log;
use App\Models\Course\Catalog_bankModel;

/**
 * 题库
 */
class Catalog_bankController extends Controller
{
    //添加题库
    public function create(){
            $data = Log::get();
            // dd($data);
        return view('admin/course/catalog_bank/create',['data'=>$data]);
    }

    //添加方法
    public function store(){
        $data = request()->post();
        // dd($data);
        $res = Catalog_bankModel::insert($data);
        // dd($res);
        if($res){
			$arr = [
			    'code' => '00000',
                'msg' => '添加成功',
                "url" => "/admin/course/catalog_bank/list"
            ];
        }else{
            $arr = [
                'code' => '00002',
                'msg' => '添加失败',
                "url" => "/admin/course/catalog_bank/create"
            ];
        }
        return json_encode($arr,true);
    }

    //展示
    public function list(){
        $bank_name = request()->bank_name;
        // dump($bank_name);
        $catalog_name = request()->catalog_name;
        $where = [];
        if($bank_name){
            $where[]=['bank_name','like',"%$bank_name%"];
        }
        if($catalog_name){
            $where[]=['catalog_name','like',"%$catalog_name%"];
        }
        $bank = Catalog_bankModel::join('course_catalog','catalog_bank.catalog_id','=','course_catalog.catalog_id')
        ->where("bank_del","1")
        ->where($where)
        ->paginate(4);
        // dump($bank);
        return view('admin/course/catalog_bank/list',['bank'=>$bank,'bank_name'=>$bank_name,'catalog_name'=>$catalog_name]);
    }

    //软删除
    public function del(){
        $post = request()->all();
        // dd($post);
        $bank = Catalog_bankModel::where("bank_id",$post)->first();
        // dd($bank);
        $bank ->bank_del =2;
        // dd($bank);
        $res = $bank ->save();
        // dd($res);
        return json_encode(["code"=>"0000","msg"=>"删除成功"]);
    }

    //修改
    public function edit($id){
        $log = Log::get();
        // dd($log);
        $bank = Catalog_bankModel::find($id);
        // dd($bank);
        return view('admin/course/catalog_bank/edit',['log'=>$log,'bank'=>$bank]);
    }
    
    //修改方法
    public function update($id){
        $bank = request()->all();
        // dd($bank);
        $res = Catalog_bankModel::where('bank_id',$id)->update($bank);
        // dd($res);
        if($res!=false){
            return "<script>alert('修改成功');location.href='/admin/course/catalog_bank/list'</script>";
        }
    }  
}
