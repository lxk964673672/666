<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>提问模块</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="/admin/admin/question/createdo" method="post">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">问题标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="one" name="q_title" 
                   placeholder="请输入问题标题">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">浏览量</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="two" name="q_browse" 
                   placeholder="请输入浏览量">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">提问内容</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="three" name="q_name" 
                   placeholder="请输入提问内容">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit"  class="btn btn-info">提问添加</button>
        </div>
    </div>
</form>
</body>
</html>



