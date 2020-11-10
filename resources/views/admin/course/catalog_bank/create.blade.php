<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>题库</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>题库添加</h2>

</center>
<form class="form-horizontal" role="form">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库名称</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="bank_name" id="lastname" placeholder="题库名称">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">目录</label>
		<div class="col-sm-8">
            <select name="catalog_id" id="catalog_id" class="form-control">
			<option value="">-请选择-</option>
				@foreach($data as $v)
					<option value="{{$v->catalog_id}}">{{$v->catalog_name}}</option>
				@endforeach
            </select>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库类型</label>
		<div class="col-sm-8">
            <input type="radio" name="bank_type" id="bank_type" value="1" checked> php
            <input type="radio" name="bank_type" id="bank_type" value="2"> python
            <input type="radio" name="bank_type" id="bank_type" value="3"> C
            <input type="radio" name="bank_type" id="bank_type" value="4"> C++
            <input type="radio" name="bank_type" id="bank_type" value="5"> Pascal
            <input type="radio" name="bank_type" id="bank_type" value="6"> java
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">题库内容</label>
		<div class="col-sm-8">
            <textarea name="bank_text" id="bank_text" class="form-control" cols="10" rows="5"></textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库难度</label>
		<div class="col-sm-8">
            <input type="radio" name="bank_hard" id="bank_hard" value="1" checked> 简单
            <input type="radio" name="bank_hard" id="bank_hard" value="2"> 普通
            <input type="radio" name="bank_hard" id="bank_hard" value="3"> 困难
            <input type="radio" name="bank_hard" id="bank_hard" value="4"> 地狱模式
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库答案</label>
		<div class="col-sm-8">
            <textarea name="bank_key" id="bank_key" class="form-control" cols="10" rows="5"></textarea>
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
		// alert(111);
		// 题库名称
		var bank_name = $("input[name='bank_name']").val();
		// alert(bank_name);
		//目录
       	var catalog_id = $('#catalog_id').val();
		// alert(catalog_id);
		// 题库类型
		var bank_type = $("#bank_type:checked").val();
		// alert(bank_type);
		// 题库内容
	   	var bank_text = $("#bank_text").val();
		// alert(bank_text);
		// 题库难度
		var bank_hard = $("#bank_hard:checked").val();
		// alert(bank_hard);
		// 题库答案
		var bank_key = $("#bank_key").val();
		// alert(bank_key);
		$.ajax({
            url:"{{url('/admin/course/catalog_bank/store')}}",
            type:"post",
            data:{bank_name:bank_name,catalog_id:catalog_id,bank_type:bank_type,bank_text:bank_text,bank_hard:bank_hard,bank_key:bank_key},
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