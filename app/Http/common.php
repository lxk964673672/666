<?php


function createTree($data,$pid=0)
{
    static $new_arr=[];
    foreach ($data as $k => $v) {
        if ($v['pid']==$pid) {
            $new_arr[]=$v;
            createTree($data,$v['p_id']);
        }
    }
    return $new_arr;
}

function arr($data)
{
    return json_decode(json_encode($data),true);
}
