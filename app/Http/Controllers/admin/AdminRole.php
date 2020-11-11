<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRole extends Controller
{
    public function adminRoleAdd()
    {
        if (Request()->post()){
            $data = Request()->post();
            $role_id = implode(',',$data['role_id']);
            $res = DB::table('shop_admin_role')->where('admin_id',$data['admin_id'])->first();
            if ($res){
                $a = DB::table('shop_admin_role')->where('admin_id',$data['admin_id'])->update(['role_id'=>$role_id]);
            }else{
                $a = DB::table('shop_admin_role')->insert(['admin_id'=>$data['admin_id'],'role_id'=>$role_id]);
            }
            if ($a){
                return "<script>alert('添加成功');location.href='/admin/adminRoleAdd';</script>";
            }
        }
        $adminData = DB::table('shop_admin')->get();
        $adminData = arr($adminData);
        $roleData = DB::table('shop_role')->get();
        $roleData = arr($roleData);
        return view('admin.adminRole.adminRoleAdd',['roleData'=>$roleData,'adminData'=>$adminData]);
    }
    public function adminRoleList()
    {
        $data = DB::table("shop_admin_role")->get();

        return view('admin.adminRole.adminRoleList');
    }
}
