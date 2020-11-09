<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>提问模块---展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<table class="table table-striped" border="30">
	<h1><b>提问展示</b></h1>
	<span style="float:right"><a type="button" class="btn btn-primary btn-xs" href="{{'/admin/admin/question/create'}}">返回提问添加</a></span>
						<form>
							<input type="text" name="u_ids" placeholder="请输入用户ID" value="{{$u_ids ?? ''}}">
							<input type="text" name="cou_ids" placeholder="请输入课程ID" value="{{$cou_ids ?? ''}}">
							<input type="text" name="q_titles" placeholder="请输入问题标题" value="{{$q_titles ?? ''}}">	
							<input type="text" name="q_browses" placeholder="请输入浏览量" value="{{$q_browses ?? ''}}">																		
							<input type="submit" value="搜索">
						</form>
	<thead>
		<tr>
			<th width="20px" height="80px">问题ID</th>
			<th width="20px" height="80px">用户ID</th>
			<th width="20px" height="80px">课程ID</th>
			<th width="20px" height="80px">问题标题</th>
			<th width="20px" height="80px">浏览量</th>
			<th width="20px" height="80px">提问内容</th>
			<th width="20px" height="80px">评论时间</th>
			<th width="20px" height="80px">操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($info as $v)
		<tr>
			<td height="80px">{{$v->q_id}}</td>
			<td height="80px">{{$v->u_id}}</td>
			<td height="80px">{{$v->cou_id}}</td>
			<td height="80px">{{$v->q_title}}</td>
			<td height="80px">{{$v->q_browse}}</td>
			<td height="80px">{{$v->q_name}}</td>
			<td height="80px">{{date("Y-m-s H:i:s",$v->q_time)}}</td>
			<td class="text-center" height="80px">		                          
			 <a q_id="{{$v->q_id}}"type="button" class="btn btn-primary del">删除</a>
			  <a href="{{url('/admin/admin/question/update/'.$v->q_id)}}" type="button" class="btn btn-danger">编辑</a>	 
			  <a is_show="{{$v->is_show}}" type="button" class="btn btn-info">是否展示</a>
		    </td>
		</tr>
		@endforeach
		<tr>
			<td colspan="8">{{ $info->appends(['u_ids'=>$u_ids,'cou_ids'=>$cou_ids,'q_titles'=>$q_titles,'q_browses'=>$q_browses])->links() }}</td>
			
		</tr>
	</tbody>
</table>
</center>
</body>
</html>

<script src="../../../jquery.js"></script>
<script>
	$(function(){
		//js删除
		$(".del").click(function(){
			var _this = $(this);
			var q_id = _this.attr("q_id");
			if(window.confirm("你要删除这条数据吗")){
				var url = "/admin/admin/question/del/"+q_id;
				location.href=url;
			}
		});
	});
</script>