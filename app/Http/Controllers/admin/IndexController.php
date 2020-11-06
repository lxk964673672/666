<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        // $data = DB::table('list')->get();
        // $data = json_decode(json_encode($data),true);
        // // dd(createTree($data));
        return view('admin.index');
    }
}
