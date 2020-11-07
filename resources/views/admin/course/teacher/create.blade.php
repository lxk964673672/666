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
		<label for="firstname" class="col-sm-2 control-label">顶级分类</label>
        <div class="col-sm-8">
            <select name="" id="" class="form-control">
                <option value="">-请选择-</option>
            </select>
		</div>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">二级分类</label>
		<div class="col-sm-8">
            <select name="" id="" class="form-control">
                <option value="">-请选择-</option>
            </select>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师姓名</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" placeholder="讲师姓名">
		</div>
	</div>

    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">讲师个人简历</label>
		<div class="col-sm-8">
            <textarea name="" id="" class="form-control" cols="10" rows="5"></textarea>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">讲师授课风格</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" placeholder="讲师授课风格">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
            <input type="radio" name="" value="1"> 是
            <input type="radio" name="" value="2"> 否
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