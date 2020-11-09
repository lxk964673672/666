<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>回答模块</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
	<form class="form-horizontal" role="form" action="{{url('/admin/admin/answer/updatedo/'.$answer->a_id)}}" method="post">
	    <div class="form-group">
	        <label for="firstname" class="col-sm-2 control-label">回答内容</label>
	        <div class="col-sm-10">
	            <input type="text" class="form-control" id="one" name="a_content"  
	                 value="{{$answer->a_content}}">
	        </div>
	    </div>  
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-info">回答修改</button>
	        </div>
	    </div>
	</form>
	</body>
</html>



