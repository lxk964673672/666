<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
        # 表名
    protected $table = 'course';

    # 主键
    protected $primaryKey = 'cou_id';

    # 黑名单
    protected $guarded = [];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
