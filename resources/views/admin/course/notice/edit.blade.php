<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>课程公告</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>课程公告添加</h2>

</center>
<form class="form-horizontal" method="post" action="{{url('/admin/course/notice/update/'.$notice->notice_id)}}">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">课程</label>
		<div class="col-sm-8">
			<select class="form-control" id='cou_id' name="cou_id">
				<option value="0">--课程--</option>
				@foreach($data as $k=>$v)
				<option value="{{$v->cou_id}}" @if($notice->cou_id=="$v->cou_id")selected @endif>{{$v->cou_name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">公告内容</label>
		<div class="col-sm-8">
            <textarea name="notice" id="notice" class="form-control" cols="10" rows="5">{{$notice->notice}}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>
