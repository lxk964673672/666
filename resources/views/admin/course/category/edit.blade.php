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
<form class="form-horizontal" action="{{url('/admin/course/category/update/'.$category->cate_id)}}" method="post">
 
  
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
  