<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//课程视频表
class Video extends Model
{
    //表名
    protected $table = 'course_video';

    //主键
    protected $primaryKey = 'video_id';

    //黑名单
    protected $guarded = [];

    //关闭laravel自带的时间戳
    public $timestamps = false;
}
