<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
        // 表名
        protected $table = 'exam_guide';
        // 主键
        protected $primaryKey = 'exam_id';
        // 黑名单
        protected $guarded = [];
        // 关闭laravel自带的时间戳
        public $timestamps = false;
}
