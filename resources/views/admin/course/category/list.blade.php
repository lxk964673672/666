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

    <form action="">
            <select name='parents_id'>
               <option value="0">--顶级分类--</option>
        @php $cate_id=$query['cate_id']??''; @endphp
        @foreach($cate_data as $k=>$v)
               <option value="{{$v->cate_id}}">
        {{str_repeat('|————',$v->level)}}
        {{$v->cate_name}}
               </option>
        @endforeach
            </select>

                <input type='submit' value="搜索" class="btn btn-default">
        </form>
                

	<table class="table">
    <tr>
   	    <td>分类id</td>
   	    <td>分类名称</td>
   	    <td>父级ID</td>
        <td>操作</td>
    </tr>
  
    @foreach($data as $k=>$v)
    <tr>
        <td>{{$v->cate_id}}</td>
        <td>{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</td>
        <td>{{$v->parents_id}}</td>
        <td>
            <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs edit" cate_id="{{$v->cate_id}}">修改</button>
            </a>  
            <a href="javascript:;">
              <button type="button" class="btn bg-olive btn-xs del"  cate_id="{{$v->cate_id}}">删除</button>
            </a>
        </td>
    </tr>
    @endforeach
       
</table>{{$data->links()}}
</body>
</html>
<script src="../../../jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
  $(".del").click(function(){
    var _this = $(this);
    var cate_id = _this.attr("cate_id");
    layui.use('layer', function(){
    var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
          layer.close(index);
        });
        //eg2
        layer.confirm('是否删除？', function(index){
          var url = "/admin/course/category/delete/"+cate_id;
          location.href=url;
          layer.close(index);
        });
    });
});

  $(".edit").click(function(){
    var _this = $(this);
    var cate_id = _this.attr("cate_id");
    layui.use('layer', function(){
    var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
          layer.close(index);
        });
        //eg2
        layer.confirm('是否修改？', function(index){
          var url = "/admin/course/category/edit/"+cate_id;
          location.href=url;
          layer.close(index);
        });
    });
});

</script>