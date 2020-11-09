<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function roleAdd()
    {
        if (Request()->post()){
            $data = Request()->input();
            $res = DB::table('shop_role')->insert($data);
            if ($res){
              return  "<script>alert('添加成功');location.href='/admin/roleAdd'</script>";
            }
        }
        return view('admin.role.roleAdd');
    }
    public function roleList()
    {
        $data = DB::table('shop_role')->get();
        $data = arr($data);
        return view('admin.role.roleList',['data'=>$data]);
    }
}
