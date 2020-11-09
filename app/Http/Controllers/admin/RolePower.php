<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePower extends Controller
{
    public function rolePowerAdd()
    {
        return view('admin.rolePower.rolePowerAdd');
    }
    public function rolePowerList()
    {
        return view('admin.rolePower.rolePowerList');
    }
}
