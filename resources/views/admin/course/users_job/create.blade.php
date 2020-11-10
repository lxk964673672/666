<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>作业</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>作业添加</h2>

</center>
<form class="form-horizontal" role="form">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">课程</label>
        <div class="col-sm-8">
            <select name="" id="" class="form-control">
                <option value="">-请选择-</option>
            </select>
		</div>
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作业名称</label>
		<div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" placeholder="作业名称">
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">状态</label>
		<div class="col-sm-8">
            <input type="radio" name="" value="1"> 开始作业
            <input type="radio" name="" value="2"> 继续作业
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