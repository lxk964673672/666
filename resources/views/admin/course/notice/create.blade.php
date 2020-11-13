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
<form class="form-horizontal" role="form">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">课程</label>
		<div class="col-sm-8">
			<select class="form-control" id='cou_id' name="cou_id">
				<option value="0">--课程--</option>
				@foreach($data as $k=>$v)
				<option value="{{$v->cou_id}}">{{$v->cou_name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">公告内容</label>
		<div class="col-sm-8">
            <textarea name="notice" id="notice" class="form-control" cols="10" rows="5"></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
      $(document).on('click','button',function(){
		// alert(111);
       var cou_id = $('#cou_id').val();
		// alert(cou_id);
	   var notice = $("#notice").val();
		// alert(notice);
		$.ajax({
			url:"{{url('/admin/course/notice/store')}}",
			type:"post",
			data:{cou_id:cou_id,notice:notice},
			dataType:"json",
			async:true,
			success:function(res){
				console.log(res);
					if(res.code="00000"){
						layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg(res.msg, {
							icon: 1,
							time: 3000 //2秒关闭（如果不配置，默认是3秒）
							}, function(){
							//do something
						});   
					});
						window.location.href=res.url;
					}else{
						layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg(res.msg, {
							icon: 5,
							time: 3000 //2秒关闭（如果不配置，默认是3秒）
							}, function(){
							//do something
						});   
					});
                }
			}
		})
       
    });  
</script>