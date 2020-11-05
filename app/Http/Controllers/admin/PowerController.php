<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    public function powerAdd()
    {
        return view('admin.power.powerAdd');
    }
    public function powerList()
    {
        return view('admin.power.powerList');
    }
}
