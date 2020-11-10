<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          <!-- session显示讲师名称 id -->
</head>
<body>
	<table class="table">
   <tr>
   	<td>课程id</td>
   	<td>课程名称</td>
   	<!-- <td>讲师名称</td> -->
   	<td>课程介绍</td>
   	<td>所属分类</td>
   	<td>添加时间</td>
   	<td>状态</td>
      <td>操作</td>
   </tr>

   @foreach($data as $k=>$v)
   <tr>
      <td>{{$v->cou_id}}</td>
      <td>{{$v->cou_name}}</td>
      <!-- <td>$v->tea_name</td> -->
      <td>{{$v->cou_desc}}</td>
      <td>{{$v->cate_name}}</td>

      <td>{{date('Y-m-d H:i:s',$v->cou_time)}}</td>
      <td>{{$v->cou_status==1?'连载':'完结'}}</td>
      <td>
         <a href="JavaScript:;">
              <button type="button" class="btn bg-olive btn-xs edit" cou_id="{{$v->cou_id}}">修改</button>
         </a>  
          <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs del" cou_id="{{$v->cou_id}}">删除</button>
         </a>
         <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs detail" cou_id="{{$v->cou_id}}">详情</button>
         </a>
      </td>
   </tr>
   @endforeach
</table>
</table>{{$data->links()}}
</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script src="/admin/status/layui/layui.js"></script>
<script>
  $(".edit").click(function(){
    var _this = $(this);
    var cou_id = _this.attr("cou_id");
    layui.use('layer', function(){
    var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
          layer.close(index);
        });
        //eg2
        layer.confirm('是否修改该课程？', function(index){
          var url = "/admin/course/course/edit/"+cou_id;
          location.href=url;
          layer.close(index);
        });
    });
});

 $(".del").click(function(){
    var _this = $(this);
    var cou_id = _this.attr("cou_id");
    layui.use('layer', function(){
    var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
        layer.close(index);
        });
        //eg2
        layer.confirm('是否删除该课程？', function(index){
          var url = "/admin/course/course/delete/"+cou_id;
          location.href=url;
          layer.close(index);
        });
    });
});

  $(".detail").click(function(){
    var _this = $(this);
    var cou_id = _this.attr("cou_id");
    layui.use('layer', function(){
    var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
        layer.close(index);
        });
        //eg2
        layer.confirm('是否进入详情?', function(index){
          var url = "/admin/course/course/detail/"+cou_id;
          location.href=url;
          layer.close(index);
        });
    });
});

   

</script>