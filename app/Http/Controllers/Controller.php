<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function CreateTree($data,$parents_id=0,$level=1){
        if(!$data){
            return ;
        }
        static $newarray = [];
        foreach($data as $k=>$v){
            if($v->parents_id == $parents_id){
                $v->level = $level;
                $newarray[] = $v;
                //调用自身
                $this->CreateTree($data,$v->cate_id,$level+1);
            }
        }
        return $newarray;
    }
}
