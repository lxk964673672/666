<!DOCTYPE html>
<html>
<head>
	<title>课程分类添加</title>
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
 
  
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">

      <select class="form-control" id='parents_id'>
        <option value="0">--顶级分类--</option>
        @foreach($cate as $k=>$v)
        <option value="{{$v->cate_id}}"{{$category->parents_id==$v->cate_id ? "selected" : ""}}>
            {{$v->cate_name}}
        </option>
        @endforeach
      </select>

    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="hidden" name="cate_id" value="{{$category->cate_id}}">
        <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="分类名称" value="{{$category->cate_name}}">
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
       var parents_id = $('#parents_id').val();
       var cate_name = $("input[name='cate_name']").val();
       var cate_id = $("input[name='cate_id']").val();
       if(cate_name==''){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg('分类名称不能不写', {
                        icon: 5,
                        time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                        //do something
                    });   
                });
           return false;
       }
       // return false;
       var url="/admin/course/category/update/"+cate_id;
       $.ajax({
            url:url,
            type:'post',
            data:{parents_id:parents_id,cate_name:cate_name},
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
  