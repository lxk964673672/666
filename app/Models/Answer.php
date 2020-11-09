<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     # 表名
    protected $table = 'answer';

    # 主键
    protected $primaryKey = 'a_id';

    # 黑名单
    protected $guarded = [];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
