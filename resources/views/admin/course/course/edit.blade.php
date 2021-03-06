<!DOCTYPE html>
<html>
<head>
	<title>课程添加</title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          <!-- session显示讲师名称 id -->
</head>
<body>
<form class="form-horizontal">
  <input type="hidden" name="cou_id" id="cou_id" value="{{$data->cou_id}}">
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">课程名称：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cou_name" name="cou_name" placeholder="课程名称" value="{{$data->cou_name}}">
    </div>
  </div>
  
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">所属分类 :</label>
    <div class="col-sm-10">
     <select class="form-control" id="cate_id" name="cate_id">
        <option value="0">--顶级分类--</option>
        @foreach($cate as $k=>$v)
        <option value="{{$v->cate_id}}" {{$data->cate_id==$v->cate_id ? "selected" : ""}}>
        	{{str_repeat('|————',$v->level)}}
            {{$v->cate_name}}
        </option>
        @endforeach
      </select>

    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">介绍：</label>
    <div class="col-sm-10">
     <textarea class="form-control" rows="3" id="cou_desc" name="cou_desc">{{$data->cou_desc}}</textarea>
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
 <script src="/admin/js/jquery.js"></script>
<script src="/admin/status/layui/layui.js"></script>
<script>
      $(document).on('click','button',function(){
       var cou_id = $("#cou_id").val();
       var cate_id = $("#cate_id").val();
       var cou_name = $("#cou_name").val();
       var cou_desc = $("#cou_desc").val();
       if(cou_name==''){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg('课程名称不能不写', {
                        icon: 5,
                        time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                        //do something
                    });   
                });
           return false;
       }
       // return false;
       var url="/admin/course/course/update/"+cou_id;
       $.ajax({
            url:url,
            type:'post',
            data:{cate_id:cate_id,cou_name:cou_name,cou_desc:cou_desc},
            dataType: "json",
            success:function(res){
                // console.log(res);
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
  