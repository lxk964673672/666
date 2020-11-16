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
    <td style="color: red">当前登陆</td><td style="color: orange"><?php echo $c; ?></td>
   <tr>
   	<td style="color: red;">课程id</td>
   	<td style="color: orange;">课程名称</td>
   	<td style="color: pink;">课程介绍</td>
   	<td style="color: #46A3FF;">所属分类</td>
   	<td style="color: #00FFFF;">添加时间</td>
   	<td style="color: #1AFD9C;">状态</td>
    <td style="color: #28FF28;">操作</td>
   </tr>
 
   @foreach($data as $k=>$v)
   <tr>
      <td style="color: #CF9E9E;">{{$v->cou_id}}</td>
      <td style="color: #C2C287;">{{$v->cou_name}}</td>
      <td style="color: #C4E1E1; width: 450px">{{$v->cou_desc}}</td>
      <td style="color: #B8B8DC;">{{$v->cate_name}}</td>
      <td style="color: #CA8EC2;">{{date('Y-m-d H:i:s',$v->cou_time)}}</td>
      <td style="color: orange;">{{$v->cou_status==1?'连载':'完结'}}</td>
      <td>
         <a href="JavaScript:;">
              <button type="button" class="btn bg-olive btn-xs edit" cou_id="{{$v->cou_id}}" style="color: #FF5151;">修改</button>
         </a>  
          <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs del" cou_id="{{$v->cou_id}}" style="color: #FF5151;">删除</button>
         </a>
         <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs detail" cou_id="{{$v->cou_id}}" style="color: #FF5151;">详情</button>
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