<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function regist()
    {
        return view('admin.regist');
    }
    public function login()
    {
        return view('admin.login');
    }
}