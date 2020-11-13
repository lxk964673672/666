<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>考试</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>考试添加</h2>

</center>
<form class="form-horizontal" role="form">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">考试名称</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="exam_name" id="lastname" placeholder="考试名称">
			</div>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">开始时间</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="exam_begin_time" id="lastname" placeholder="">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">结束时间</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="exam_end_time" id="lastname" placeholder="">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" id="buuton-he" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>

<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
      $(document).on('click','#buuton-he',function(){
		// alert('测试');
		// 考试名称
		var exam_name = $("input[name='exam_name']").val();
		// alert(exam_name);
		//开始时间
		var exam_begin_time = $("input[name='exam_begin_time']").val();
		// alert(exam_begin_time);
		//结束时间
		var exam_end_time = $("input[name='exam_end_time']").val();
		// alert(exam_end_time);
		$.ajax({
            url:"{{url('/admin/course/exam/store')}}",
            type:"post",
            data:{exam_name:exam_name,exam_begin_time:exam_begin_time,exam_end_time:exam_end_time},
            dataType: "json",
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
        });
       
    });  
</script>