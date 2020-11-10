<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin_id = Request()->session()->get('adminData')['admin_id'];
//        $admin_id=5;
        if (!$admin_id){
            return  "<script>alert('请登录');location.href='/admin/login';</script>";die;
        }

        $powerData = rbacData($admin_id);
        $url = url()->full();

        $url = '/'.ltrim($url,'http://www.1912zxjy.com');
        $a = 0;

        foreach ($powerData as $k=>$v){
            foreach ($v['son'] as $kk=>$vv){
                if ($vv['p_web'] === $url){
                    $a=1;
                }
            }
        }

        if ($a = 1){
            return $next($request);
        }else{
            return "<script>alert('没有权限');location.href='/admin/login';</script>";
        }


    }
}
