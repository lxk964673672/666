<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    // 表名
    protected $table = 'course_notice';
    // 主键
    protected $primaryKey = 'notice_id';
    // 黑名单
    protected $guarded = [];
    // 关闭laravel自带的时间戳
    public $timestamps = false;
}
