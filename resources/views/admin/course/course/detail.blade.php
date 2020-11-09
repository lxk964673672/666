 @include('top.detail')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
    <!-- 放course表的图片 -->
	<div class="course_img"><img src="/index/images/c1.jpg" width="500"></div>

    <div class="coursetitle">
        <!-- 状态 -->
   		<a class="state">{{$data->cou_status==1?'连载':'完结'}}</a>
        <!-- 标题 -->
    	<h2 class="courseh2">{{$data->cou_name}}</h2>    
        <!-- <p class="courstime">总课时：<span class="course_tt">30课时</span></p>
		<p class="courstime">课程时长：<span class="course_tt">3小时20分</span></p> -->

        <!-- 浏览量 -->
        <p class="courstime">学习人数：<span class="course_tt">{{$data->lll}}人</span></p>
        <!-- 讲师 -->
		<p class="courstime">{{$data->tea_id}}</p>

		<p class="courstime">课程评价：<img width="71" height="14" src="/index/images/evaluate5.png">&nbsp;&nbsp;<span class="hidden-sm hidden-xs">5.0分（10人评价）</span></p>
          
       
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
    	<dt><a href="{{url('/index/course/coursecont1')}}" class="graylink">第一章&nbsp;&nbsp;总论</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
   
    
    	<dt><a href="#" class="graylink">第二章&nbsp;&nbsp;会计要素与会计等式</a></dt>
        <dd>内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列。内容包括会计基础、财经法规和职业道德、电算化三科视频课程全系列</dd>
    
    </dl>
</div>

<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
