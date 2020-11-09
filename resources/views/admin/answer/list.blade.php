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
<table class="table table-striped" border="20">
	<h1><b>回答展示</b></h1>
	<span style="float:right"><a class="btn btn-default" href="{{'/admin/admin/answer/create'}}">返回回答添加</a></span>
						 <form>
							<input type="text" name="u_ids" placeholder="请输入用户ID" value="{{$u_ids ?? ''}}">
							<input type="text" name="cou_ids" placeholder="请输入课程ID" value="{{$cou_ids ?? ''}}">
							<input type="text" name="q_ids" placeholder="请输入问题ID" value="{{$q_ids ?? ''}}">																		
							<input type="submit" value="搜索">
						</form>
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
			 <a a_id="{{$v->a_id}}" type="button" class="btn btn-primary  del">删除</a>
			  <a href="{{url('/admin/admin/answer/update/'.$v->a_id)}}"  type="button" class="btn btn-danger ">编辑</a>	 
		    </td>
		</tr>
		@endforeach
		<tr>
			<td colspan="7">{{ $info->appends(['u_ids'=>$u_ids,'cou_ids'=>$cou_ids,'q_ids'=>$q_ids])->links() }}</td>
			
		</tr>
	</tbody>

</table>
</center>
</body>
</html>

