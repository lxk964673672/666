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
  <!--  <tr>
      <td>1</td>
   	<td>斗罗大陆</td>
   	<td>唐家三少</td>
   	<td>唐家成神</td>
   	<td>玄幻</td>
   	<td>2020</td>
   	<td>连载</td>
      <td>详情</td>
   </tr> -->
   @foreach($data as $k=>$v)
   <tr>
      <td>{{$v->cou_id}}</td>
      <td>{{$v->cou_name}}</td>
      <!-- <td>$v->tea_name</td> -->
      <td>{{$v->cou_desc}}</td>
      <td>{{$v->cate_name}}</td>
      <td>{{$v->cou_time}}</td>
      <td>{{$v->cou_status==1?'连载':'完结'}}</td>
      <td>
         <a href="{{url('admin/course/course/edit/'.$v->cou_id)}}">
              <button type="button" class="btn bg-olive btn-xs" >修改</button>
         </a>  
         <a href="{{url('admin/course/course/delete/'.$v->cou_id)}}">
              <button type="button" class="btn bg-olive btn-xs" >删除</button>
         </a>
         <a href="{{url('admin/course/course/detail/'.$v->cou_id)}}">
              <button type="button" class="btn bg-olive btn-xs" >详情</button>
         </a>
      </td>
   </tr>
   @endforeach
   <td colspan="20">{{$data->links()}}</td>
</table>
</body>
</html>
