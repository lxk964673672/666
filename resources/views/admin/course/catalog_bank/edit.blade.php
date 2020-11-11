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
<h2>题库修改</h2>

</center>
<form class="form-horizontal" method="post" action="{{url('/admin/course/catalog_bank/update/'.$bank->bank_id)}}">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库名称</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" name="bank_name" id="lastname" value="{{$bank->bank_name}}">
		</div> 
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">目录</label>
		<div class="col-sm-8">
            <select name="catalog_id" id="catalog_id" class="form-control">
			<option value="">-请选择-</option>
				@foreach($log as $v)
					<option value="{{$v->catalog_id}}" @if($bank->catalog_id=="$v->catalog_id")selected @endif>{{$v->catalog_name}}</option>
				@endforeach
            </select>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库类型</label>
		<div class="col-sm-8">
            <input type="radio" name="bank_type" id="bank_type" value="1" @if($bank->bank_type==1)checked @endif> php
            <input type="radio" name="bank_type" id="bank_type" value="2" @if($bank->bank_type==2)checked @endif> python
            <input type="radio" name="bank_type" id="bank_type" value="3" @if($bank->bank_type==3)checked @endif> C
            <input type="radio" name="bank_type" id="bank_type" value="4" @if($bank->bank_type==4)checked @endif> C++
            <input type="radio" name="bank_type" id="bank_type" value="5" @if($bank->bank_type==5)checked @endif> Pascal
            <input type="radio" name="bank_type" id="bank_type" value="6" @if($bank->bank_type==6)checked @endif> java
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">题库内容</label>
		<div class="col-sm-8">
            <textarea name="bank_text" id="bank_text" class="form-control" cols="10" rows="5">{{$bank->bank_text}}</textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库难度</label>
		<div class="col-sm-8">
            <input type="radio" name="bank_hard" id="bank_hard" value="1" @if($bank->bank_hard==1)checked @endif> 简单
            <input type="radio" name="bank_hard" id="bank_hard" value="2" @if($bank->bank_hard==2)checked @endif> 普通
            <input type="radio" name="bank_hard" id="bank_hard" value="3" @if($bank->bank_hard==3)checked @endif> 困难
            <input type="radio" name="bank_hard" id="bank_hard" value="4" @if($bank->bank_hard==4)checked @endif> 地狱模式
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库答案</label>
		<div class="col-sm-8">
            <textarea name="bank_key" id="bank_key" class="form-control" cols="10" rows="5">{{$bank->bank_key}}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="buuton-he" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>
