<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>资讯模块---资讯表</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('/admin/admin/information/updatedo/'.$information->infor_id)}}" method="post">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="one" name="infor_title" 
                   value="{{$information->infor_title}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="two" name="infor_content" 
                   value="{{$information->infor_content}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">浏览次数</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="three" name="infor_hot" 
                   value="{{$information->infor_hot}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
</body>
</html>

<script type="text/javascript">
    $(document).on("blur","input[name='infor_title']",function(){
        var infor_title = $("input[name='infor_title']").val();
        if(infor_title==""){
            alert("标题不能为空");die;
        }
    });

    //$(document).on("blur","input[name='role_desc']",function(){
        $("#two").blur(function(){
        //alert(7);
        var _this=$(this);
        var infor_content = _this.val();
        if(infor_content==""){
            alert("内容不能为空");die;
        }
    });
         $("#three").blur(function(){
        var _this=$(this);
        var infor_hot = _this.val();
        if(infor_hot==""){
            alert("浏览次数不能为空");die;
        }
    });
</script>   

