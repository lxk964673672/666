<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
        # 表名
    protected $table = 'information';

    # 主键
    protected $primaryKey = 'infor_id';

    # 黑名单
    protected $guarded = [];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
