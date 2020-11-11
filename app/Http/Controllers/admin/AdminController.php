<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminAdd()
    {
        if (Request()->post()){
            $data = Request()->input();
            $res = DB::table('shop_admin')->insert($data);
            if ($res){
                return "<script>alert('添加成功');location.href='/admin/adminAdd';</script>";
            }
        }
        return view('admin.admin.adminAdd');
    }
    public function adminList()
    {
        $data1 = DB::table('shop_admin')->leftJoin('shop_admin_role','shop_admin.admin_id','=','shop_admin_role.admin_id')->paginate(2,['shop_admin.type','shop_admin.admin_id','shop_admin.admin_name','shop_admin_role.role_id']);
        $data = arr($data1);
        $roleData = [];
        foreach ($data['data'] as $k=>$v){
            if (!empty($v['role_id'])){
                $roleId = explode(',',$v['role_id']);
                foreach ($roleId as $kk=>$vv){
                    $roleData[$v['admin_id']][] = DB::table('shop_role')->where('role_id',$vv)->first();
                }
            }
        }
        $roleData = arr($roleData);
        return view('admin.admin.adminList',['data'=>$data,'roleData'=>$roleData,'data1'=>$data1]);
    }
    public function adminDel()
    {
        $admin_id = Request()->admin_id;
        $res = DB::table('shop_admin_role')->where('admin_id',$admin_id)->first();
        if ($res){
            $a = DB::table('shop_admin_role')->where('admin_id',$admin_id)->delete($admin_id);
            $b = DB::table('shop_admin')->where('admin_id',$admin_id)->delete($admin_id);
            if ($a && $b){
                return json_encode(['code'=>1,'msg'=>'删除成功']);
            }
        }
    }
}
