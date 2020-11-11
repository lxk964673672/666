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
        $data1 = DB::table('shop_role')->leftJoin('shop_role_power','shop_role.role_id','=','shop_role_power.role_id')->paginate(2,['shop_role.role_id','shop_role.role_name','shop_role_power.p_id']);
        $data = arr($data1);
        $powerData = [];
        foreach ($data['data'] as $k=>$v){
            if (!empty($v['p_id'])){
                $powerId = explode(',',$v['p_id']);
                foreach ($powerId as $kk=>$vv){
                    $powerData[$v['role_id']][] = DB::table('shop_power')->where('p_id',$vv)->first();
                }
            }
        }
        $powerData = arr($powerData);
        return view('admin.role.roleList',['data'=>$data,'data1'=>$data1,'powerData'=>$powerData]);
    }
}
