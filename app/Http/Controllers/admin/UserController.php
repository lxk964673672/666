<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
        if (Request()->post()){
            $data = Request()->input();
            $res = DB::table('shop_admin')->where('admin_name',$data['admin_name'])->first();
            if (!$res){
                return "<script>alert('账号出错');location.href='/admin/login';</script>";die;
            }
            $res = arr($res);
            if ($res['admin_pwd'] != $data['admin_pwd']){
                return "<script>alert('密码出错');location.href='/admin/login';</script>";die;
            }
            Request()->session()->put('adminData',$res);
            return "<script>alert('登录成功');location.href='/admin/index';</script>";
        }
        return view('admin.login');
    }
}
