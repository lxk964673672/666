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
<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">所属分类</label>
        <div class="col-sm-8">
            <select name="cate_id" id="cate_id" class="form-control">
                <option value="">-请选择-</option>
				<option value="1">-请选择-</option>
				<option value="2">-请选择-</option>
				<option value="3">-请选择-</option>
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
            <textarea name="tea_resume" id="" class="form-control" cols="10" rows="5"></textarea>
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
            <input type="radio" name="ls_show" value="1"> 是
            <input type="radio" name="ls_show" value="2"> 否
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script>
      $(document).on('click','button',function(){
		//   alert(111);
       var cate_id = $('#cate_id').val();
	   alert(cate_id);
       var tea_name = $("input[name='tea_name']").val();
	   alert(tea_name);
	   var tea_resume = $("input[name='tea_resume']").val();
		alert(tea_resume);
       if(cate_name==''){
           alert('分类名称不能不写');return false;
       }
       // return false;
       $.ajax({
            url:"{{url('/admin/course/category/store')}}",
            type:'post',
            data:{parents_id:parents_id,cate_name:cate_name},
            dataType: "json",
            success:function(res){
                // console.log(res);
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