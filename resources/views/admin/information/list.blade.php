<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>资讯模块---展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-striped" border="0">
	<center><h1><b>资讯展示</b></h1></center>
	<span style="float:right"><a type="button" class="btn btn-primary btn-xs" href="{{'/admin/admin/information/create'}}">返回资讯添加</a></span>
	 					<form>
	 						
					            <input type="text" name="title" class="form-control col-sm-3" style="width:200px" placeholder="请输入标题" value="{{$title ?? ''}}">
					            <input type="text" name="content" class="form-control col-sm-3" style="width:200px"  placeholder="请输入内容" value="{{$content ?? ''}}">
							<input type="text" name="infor_hots" class="form-control col-sm-3"  style="width:200px"  placeholder="请输入浏览次数" value="{{$infor_hots ?? ''}}">																	
							<button type="submit" class="btn btn-default">搜索</button>						
						</form>
						<center>
	<thead>
		<tr>
			<th width="20px" height="80px">资讯id</th>
			<th width="20px" height="80px">标题</th>
			<th width="20px" height="80px">内容</th>
			<th width="20px" height="80px">浏览次数</th>
			<th width="20px" height="80px">添加时间</th>
			<th width="20px" height="80px">是否删除</th>
		</tr>
	</thead>
	<tbody>
		@foreach($info as $v)
		<tr>
			<td height="80px">{{$v->infor_id}}</td>
			<td height="80px">{{$v->infor_title}}</td>
			<td height="80px">{{$v->infor_content}}</td>
			<td height="80px">{{$v->infor_hot}}</td>
			<td height="80px">{{date("Y-m-s H:i:s",$v->infor_time)}}</td>
			<td class="text-center" height="80px">		                          
			 <a infor_id="{{$v->infor_id}}" type="button" class="btn btn-warning  del">删除</a>
			  <a href="{{url('/admin/admin/information/update/'.$v->infor_id)}}" type="button" class="btn btn-danger">编辑</a>	 
		    </td>
		</tr>
		@endforeach
		<tr>
			<td colspan="7">{{ $info->appends(['title'=>$title,'content'=>$content,'infor_hots'=>$infor_hots])->links() }}</td>			
		</tr>
	</tbody>
</table>
</center>
</body>
</html>
<script src="../../../jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
	$(function(){
	// 	//js删除
		$(".del").click(function(){
			var _this = $(this);
			var infor_id = _this.attr("infor_id");
			layui.use('layer', function(){
            var layer = layui.layer;
           		layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
        			layer.close(index);
        		});
        		//eg2
        		layer.confirm('确定要抛弃我吗？', function(index){
					var url = "/admin/admin/information/del/"+infor_id;
					location.href=url;
          			layer.close(index);
        	});
       	});
    });
});
</script>