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
<center>
<table class="table table-striped" border="7">
	<h1><b>资讯展示</b></h1>
	<thead>
		<tr>
			<th>资讯id</th>
			<th>标题</th>
			<th>内容</th>
			<th>浏览次数</th>
			<th>添加时间</th>
			<th>是否删除</th>
		</tr>
	</thead>
	<tbody>
		@foreach($info as $v)
		<tr>
			<td>{{$v->infor_id}}</td>
			<td>{{$v->infor_title}}</td>
			<td>{{$v->infor_content}}</td>
			<td>{{$v->infor_hot}}</td>
			<td>{{$v->infor_time}}</td>
			<td><button id="btn">{{$v->is_del}}删除</button></td>
		</tr>
		@endforeach
	</tbody>
</table>
</center>
</body>
</html>
<script src="../public/uploadify/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#btn").click(function(){
			alert("1232132");
		})
	})
</script>