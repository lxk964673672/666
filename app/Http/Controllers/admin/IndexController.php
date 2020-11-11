<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $admin_id = Request()->session()->get('adminData',true)['admin_id'];
        $powerData = Request()->session()->get('powerData'.$admin_id);
        return view('admin.index',['powerData'=>$powerData]);
    }
}
