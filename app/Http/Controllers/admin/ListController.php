<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function listAdd()
    {
        if (Request()->post()){
            $data = Request()->input();
            $res = DB::table('list')->insert($data);
            if ($res){
                return redirect('/admin/index');die;
            }
        }
        $data = DB::table('list')->where('pid',0)->get();
        return view('admin.listAdd',['data'=>$data]);
    }
}
