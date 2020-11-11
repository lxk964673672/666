<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>讲师</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>讲师修改</h2>
</center>
<form class="form-horizontal" method="post" action="{{url('/admin/course/teacher/update/'.$teacher->tea_id)}}">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">所属分类</label>
        <div class="col-sm-8">
			<select class="form-control" id='cate_id' name="cate_id">
				<option value="0">--顶级分类--</option>
				@foreach($data as $k=>$v)
				<option value="{{$v->cate_id}}" @if($teacher->cate_id=="$v->cate_id")selected @endif>{{str_repeat('|————',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>

		</div>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师姓名</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="tea_name" id="lastname" value="{{$teacher->tea_name}}">
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">讲师个人简历</label>
		<div class="col-sm-8">
            <textarea name="tea_resume" id="tea_resume" class="form-control tea_resume" cols="10" rows="5">{{$teacher->tea_resume}}</textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师授课风格</label>
		<div class="col-sm-8">
            <input type="text" name="tea_style" class="form-control" id="lastname" value="{{$teacher->tea_style}}">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
            <input type="radio" name="is_show" id="is_show" value="1" @if($teacher->is_show==1)checked @endif > 是
            <input type="radio" name="is_show" id="is_show" value="2" @if($teacher->is_show==2)checked @endif > 否
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
