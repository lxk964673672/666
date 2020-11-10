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

function powerDesc($powerData)
{
    static $arr = [];
    foreach ($powerData as $k=>$v){
        if ($v['pid']==0){
            $arr[$v['p_id']]=$v;
        }else{
            $arr[$v['pid']]['son'][]=$v;
        }
    }
    return $arr;
}

function rbacData($admin_id)
{
//        Request()->session()->flush();die;
    if (Request()->session()->get('powerData'.$admin_id)){
        $powerData=Request()->session()->get('powerData'.$admin_id);
    }else{
        $admin=DB::table('shop_admin')->where('admin_id',$admin_id)->first('type');
        $admin=arr($admin);
        if ($admin['type'] == 1){
            $powerData = DB::table('shop_power')->get();
            $powerData = arr($powerData);
            $powerData = powerDesc($powerData);
            Request()->session()->put('powerData'.$admin_id,$powerData);
        }else{
            $role = DB::table('shop_admin_role')->where('admin_id',$admin_id)->first();
            $role = arr($role);
            $roleId=explode(',',$role['role_id']);
            $powerId = [];
            foreach ($roleId as $k=>$v){
                $power = DB::table('shop_role_power')->where('role_id',$v)->first();
                $power=arr($power);
                $p_id=explode(',',$power['p_id']);
                foreach ($p_id as $vv){
                    if (!empty($vv)){
                        array_push($powerId,$vv);
                    }
                }
            }
            $powerId=array_unique($powerId);
            $powerData = DB::table('shop_power')->whereIn('p_id',$powerId)->get();
            $powerData = arr($powerData);
            $powerData = powerDesc($powerData);
            Request()->session()->put('powerData'.$admin_id,$powerData);
        }
    }

    return $powerData;
}
