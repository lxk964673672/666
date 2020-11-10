 @include('top.detail')
<style>
 .aa{
color:orange;
}
.s{
    width: 100px;
    height: 40px;
}
.a{
    color: red;
     float: left;
}
.b{
    color: orange;
     float: left;
}
</style>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
    <!-- 放course表的图片 -->
	<div class="course_img"><img src="/index/images/c1.jpg" width="500"></div>

    <div class="coursetitle">
        <!-- 状态 -->
   		<div class="s"><div class='a'>{{$data->is_sj==1?'未上架':'已上架'}}：</div><div class="b">{{$data->cou_status==1?'连载':'完结'}}</div></div></h3>
        <!-- 标题 -->
    	<h2 class="courseh2">{{$data->cou_name}}</h2>    
        <!-- <p class="courstime">总课时：<span class="course_tt">30课时</span></p>
		<p class="courstime">课程时长：<span class="course_tt">3小时20分</span></p> -->

        <!-- 浏览量 -->
        <p class="courstime">学习人数：<span class="course_tt"><!-- {{$data->lll}}-->100人</span></p>
        <!-- 讲师 -->
		<p class="courstime">{{$data->tea_id}}</p>

		<p class="courstime">课程评价：<img width="71" height="14" src="/index/images/evaluate5.png">&nbsp;&nbsp;<span class="hidden-sm hidden-xs">5.0分（10人评价）</span></p>
        <a href="{{url('admin/course/catalog/create/'.$data->cou_id)}}"><h2 class="aa">点击更新章节</h3></a>
       
		<div style="clear:both;"></div>
	 
    </div>
    <div class="clearh"></div>
</div>

<div class="clearh"></div>
<div class="coursetext">
	<h3 class="leftit">课程简介</h3>
    <p class="coutex">{{$data->cou_desc}}</p>
	<div class="clearh"></div>


	<h3 class="leftit">课程目录</h3>
    <dl class="mulu">
        @foreach($log as $k=>$v)
    	<dt>第{{$v->catalog_chapters}}章&nbsp;&nbsp;<a href="{{url('/admin/course/course/details/'.$v->catalog_id)}}">{{$v->catalog_name}}</a></dt>
        <dd>{{$v->catalog_desc}}</dd>
        <dd></a>  
        <a href="{{url('admin/course/catalog/delete/'.$v->catalog_id)}}">删除</a></dd>
        @endforeach
   
    </dl>
    <dt>{{$log->links()}}</dt>
</div>
 
<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
