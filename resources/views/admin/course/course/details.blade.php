  @include('top.detail')
<div class="coursecont">
<div class="coursepic1">
  
   <div class="course_img1">
	   <img src="/index/images/c1.jpg" height="140">	   
   </div>
   <div class="course_xq">
       <span class="courstime1"><p>课时<br/><span class="coursxq_num">{{$data->catalog_chapters}}</span></p></span>
	   <span class="courstime1"><p>学习人数<br/><span class="coursxq_num">{{$data->lll}}</span></p></span>
	   <span class="courstime1"><p>授课讲师<br/><span class="coursxq_num">{{$data->lll}}</span></p></span>
   </div>
  
    <div class="clearh"></div>
</div>

<div class="clearh"></div>
<div class="coursetext">
	<div class="box demo2" style="position:relative">
			<ul class="tab_menu">
				<li class="current course1">第{{$data->catalog_chapters}}章</li>
			</ul>
			<div class="tab_box">
				<div>
					<dl class="mulu noo">
						<div>
							<div class="a">{{$data->catalog_name}}</div>
						    <div class="b">{{$data->catalog_detail}}</div>
						    
						</div>
						
				 
				</div>
					<div>
				</div>
				
			</div>
		</div>
   
</div>

 