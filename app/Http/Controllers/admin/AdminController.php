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
        $data = DB::table('shop_admin')->get();
        $data = arr($data);
        return view('admin.admin.adminList',['data'=>$data]);
    }
}
