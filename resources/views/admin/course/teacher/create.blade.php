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
<h2>讲师添加</h2>
</center>
<form class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">所属分类</label>
        <div class="col-sm-8">
			<select class="form-control" id='cate_id' name="cate_id">
				<option value="0">--顶级分类--</option>
				@foreach($data as $k=>$v)
				<option value="{{$v->cate_id}}">
					{{str_repeat('|————',$v->level)}}
					{{$v->cate_name}}
				</option>
				@endforeach
			</select>

		</div>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师姓名</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="tea_name" id="lastname" placeholder="讲师姓名">
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">讲师个人简历</label>
		<div class="col-sm-8">
            <textarea name="tea_resume" id="tea_resume" class="form-control tea_resume" cols="10" rows="5"></textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师授课风格</label>
		<div class="col-sm-8">
            <input type="text" name="tea_style" class="form-control" id="lastname" placeholder="讲师授课风格">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
            <input type="radio" name="is_show" id="is_show" value="1" checked> 是
            <input type="radio" name="is_show" id="is_show" value="2"> 否
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
<script>
      $(document).on('click','button',function(){
		//alert(111);
       var cate_id = $('#cate_id').val();
		//alert(cate_id);
       var tea_name = $("input[name='tea_name']").val();
		//alert(tea_name);
	   var tea_resume = $("#tea_resume").val();
		//alert(tea_resume);
		var tea_style = $("input[name='tea_style']").val();
		// alert(tea_style);
		var is_show = $("#is_show:checked").val();
		// alert(is_show);
       $.ajax({
            url:"{{url('/admin/course/teacher/store')}}",
            type:"post",
            data:{cate_id:cate_id,tea_name:tea_name,tea_resume:tea_resume,tea_style:tea_style,is_show:is_show},
            dataType: "json",
			async:true,
            success:function(res){
                console.log(res);
                if(res.code="00000"){
                    alert(res.msg);
                    window.location.href=res.url;
                }else{
                    alert(res.msg);
                }
            }
        });
    });  
</script>