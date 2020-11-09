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
   	    <td>分类id</td>
   	    <td>分类名称</td>
   	    <td>父级ID</td>
        <td>操作</td>
    </tr>
  
    @foreach($cateInfo as $k=>$v)
    <tr>
        <td>{{$v->cate_id}}</td>
        <td>{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</td>
        <td>{{$v->parents_id}}</td>
        <td>
            <a href="{{url('admin/course/category/edit/'.$v->cate_id)}}">
              <button type="button" class="btn bg-olive btn-xs" >修改</button>
            </a>  
            <a href="{{url('admin/course/category/delete/'.$v->cate_id)}}">
              <button type="button" class="btn bg-olive btn-xs" >删除</button>
            </a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>
