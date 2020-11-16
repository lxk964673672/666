<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//角色权限
class RolePower extends Controller
{
    public function rolePowerAdd()
    {
        if (Request()->post()){
            $data = Request()->input();
//            $i=0;
//            foreach ($data['p_id'] as $k=>$v){
//                $res=DB::table('shop_role_power')->insert(['role_id'=>$data['role_id'],'p_id'=>$v]);
//                if (!$res){
//                    $i=1;
//                }
//            }
            $p_id = implode(',',$data['p_id']);
            $res = DB::table('shop_role_power')->where('role_id',$data['role_id'])->first();
            if ($res){
                $a = DB::table('shop_role_power')->where('role_id',$data['role_id'])->update(['role_id'=>$data['role_id'],'p_id'=>$p_id]);
            }else{
                $a = DB::table('shop_role_power')->insert(['role_id'=>$data['role_id'],'p_id'=>$p_id]);
            }
            if ($a){
                echo "<script>alert('添加成功');location.href='/admin/rolePowerAdd';</script>";
            }
        }
        $roleData = DB::table('shop_role')->get(['role_id','role_name']);
        $roleData = arr($roleData);
        $powerData = DB::table('shop_power')->get(['p_id','p_name','pid']);
        $powerData = arr($powerData);
        $powerData = $this->powerDesc($powerData);
        return view('admin.rolePower.rolePowerAdd',['roleData'=>$roleData,'powerData'=>$powerData]);
    }
    public function rolePowerList()
    {
        return view('admin.rolePower.rolePowerList');
    }
    public function powerDesc($powerData)
    {
        static $arr = [];
        foreach ($powerData as $k=>$v){
            if ($v['pid'] == 0){
                $arr[$v['p_id']] = $v;
            }else{
                $arr[$v['pid']]['son'][]=$v;
            }
        }
        return $arr;
    }
}
