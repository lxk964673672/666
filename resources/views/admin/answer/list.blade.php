<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>回答模块---展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<table class="table table-striped" border="3">
	<h1><b>回答展示</b></h1>
	<thead>
		<tr>
			<th width="20px" height="80px">回答ID</th>
			<th width="20px" height="80px">用户ID</th>
			<th width="20px" height="80px">课程ID</th>
			<th width="20px" height="80px">问题ID</th>
			<th width="20px" height="80px">回答内容</th>
			<th width="20px" height="80px">回答时间</th>
			<th width="20px" height="80px">操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($info as $v)
		<tr>
			<td height="80px">{{$v->a_id}}</td>
			<td height="80px">{{$v->u_id}}</td>
			<td height="80px">{{$v->cou_id}}</td>
			<td height="80px">{{$v->q_id}}</td>
			<td height="80px">{{$v->a_content}}</td>
			<td height="80px">{{date("Y-m-s H:i:s",$v->q_time)}}</td>
			<td class="text-center" height="80px">		                          
			 <a a_id="{{$v->a_id}}" class="btn bg-olive btn-xs del">删除</a>
			  <a href="{{url('/admin/admin/information/update/'.$v->a_id)}}" class="btn bg-olive btn-xs ">编辑</a>	 
		    </td>
		</tr>
		@endforeach
	</tbody>
</table>
</center>
</body>
</html>

