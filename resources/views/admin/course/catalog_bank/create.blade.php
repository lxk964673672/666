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
            <input type="text" class="form-control" id="lastname" placeholder="题库名称">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">目录</label>
		<div class="col-sm-8">
            <select name="" id="" class="form-control">
                <option value=""></option>
            </select>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库类型</label>
		<div class="col-sm-8">
            <input type="radio" name="" value="1"> php
            <input type="radio" name="" value="2"> python
            <input type="radio" name="" value="3"> C
            <input type="radio" name="" value="4"> C++
            <input type="radio" name="" value="5"> Pascal
            <input type="radio" name="" value="6"> java
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">题库内容</label>
		<div class="col-sm-8">
            <textarea name="" id="" class="form-control" cols="10" rows="5"></textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库难度</label>
		<div class="col-sm-8">
            <input type="radio" name="" value="1"> 简单
            <input type="radio" name="" value="2"> 普通
            <input type="radio" name="" value="3"> 困难
            <input type="radio" name="" value="4"> 非常困难
            <input type="radio" name="" value="5"> 地狱模式
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">题库答案</label>
		<div class="col-sm-8">
            <textarea name="" id="" class="form-control" cols="10" rows="5"></textarea>
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