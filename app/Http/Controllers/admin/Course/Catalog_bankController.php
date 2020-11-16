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
        if (!empty($data['select1'])){
            $data['select1']=implode(',',$data['select1']);
        }
        if (!empty($data['select2'])){
            $data['select2']=implode(',',$data['select2']);
        }
        if (!empty($data['select3'])){
            $data['select3']=implode(',',$data['select3']);
        }
        if (!empty($data['select4'])){
            $data['select4']=implode(',',$data['select4']);
        }
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
        $bank1 = Catalog_bankModel::join('course_catalog','catalog_bank.catalog_id','=','course_catalog.catalog_id')
        ->where("bank_del","1")
        ->where($where)
        ->paginate(4);
        $bank = arr($bank1);
        $select = [];
        foreach ($bank['data'] as $k=>$v){
            $select[$v['bank_id']][]=explode(',',$v['select1']);
            $select[$v['bank_id']][]=explode(',',$v['select2']);
            $select[$v['bank_id']][]=explode(',',$v['select3']);
            $select[$v['bank_id']][]=explode(',',$v['select4']);
        }
        return view('admin/course/catalog_bank/list',['select'=>$select,'bank'=>$bank1,'bank_name'=>$bank_name,'catalog_name'=>$catalog_name]);
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
        $bank = Catalog_bankModel::where('bank_id',$id)->first();
        $bank = arr($bank);
        if (!empty($bank['select1'])){
            $bank['select'][] = explode(',',$bank['select1']);
        }
        if (!empty($bank['select2'])){
            $bank['select'][] = explode(',',$bank['select2']);
        }
        if (!empty($bank['select3'])){
            $bank['select'][] = explode(',',$bank['select3']);
        }
        if (!empty($bank['select4'])){
            $bank['select'][] = explode(',',$bank['select4']);
        }
        // dd($bank);
        return view('admin/course/catalog_bank/edit',['bank_id'=>$id,'log'=>$log,'bank'=>$bank]);
    }
    
    //修改方法
    public function update(){
        $data = request()->all();
        if (!empty($data['select1'])){
            $data['select1']=implode(',',$data['select1']);
        }else{
            $data['select1']='';
        }
        if (!empty($data['select2'])){
            $data['select2']=implode(',',$data['select2']);
        }else{
            $data['select2']='';
        }
        if (!empty($data['select3'])){
            $data['select3']=implode(',',$data['select3']);
        }else{
            $data['select3']='';
        }
        if (!empty($data['select4'])){
            $data['select4']=implode(',',$data['select4']);
        }else{
            $data['select4']='';
        }
        $res = Catalog_bankModel::where('bank_id',$data['bank_id'])->update($data);
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
                "url" => "/admin/course/catalog_bank/list"
            ];
        }
        return json_encode($arr,true);
    }  
}
