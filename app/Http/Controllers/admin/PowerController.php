<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
    public function powerAdd()
    {
        if (Request()->post()){
            $data = Request()->input();
            $res = DB::table('shop_power')->insert($data);
            if ($res){
                return redirect('/admin/powerList');
            }
        }
        $data = DB::table('shop_power')->where('pid',0)->get();
        $data = json_decode(json_encode($data),true);
        return view('admin.power.powerAdd',['data'=>$data]);
    }
    public function powerList()
    {
        $data1 = DB::table('shop_power')->paginate(3);
        $data = json_decode(json_encode($data1),true);
        $data = createTree($data['data']);
        return view('admin.power.powerList',['data'=>$data,'data1'=>$data1]);
    }
}
