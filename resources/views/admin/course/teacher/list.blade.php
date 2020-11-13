<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>讲师</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>讲师展示</h2>
<a style="float:right" href="{{url('/admin/course/teacher/create')}}">
            <button type="button" class="btn btn-pink">添加</button>
        </a>
</center>
<form class="form-horizontal" role="form">
	<input type="text" name="tea_name" value="{{$tea_name}}" placeholder="请输入关键字">
	<button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>顶级分类</th>
			<th>讲师姓名</th>
            <th>讲师个人简历</th>
			<th>讲师授课风格</th>
            <th>是否展示</th>
            <th>操作</th>
		</tr>
	</thead>
	@foreach($teacher as $v)
	<tbody>
		<tr>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->tea_name}}</td>
            <td>{{$v->tea_resume}}</td>
            <td>{{$v->tea_style}}</td>
            <td>{{$v->is_show==1?'是':'否'}}</td>
			<td>
				<a href="{{url('/admin/course/teacher/edit/'.$v->tea_id)}}">
					<button type="button" class="btn btn-primary">修改</button>
				</a> 
				<button type="button" class="btn btn-warning del" tea_id="{{$v->tea_id}}" title="Popover title" data-container="body" data-toggle="popover" data-placement="right" data-content="右侧的 Popover 中的一些内容">删除</button>
            </td>
		</tr>
		@endforeach
    </tbody>
</table>
{{$teacher->appends(['tea_name'=>$tea_name])->links()}}

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
//软删除
$(document).on("click",".del",function(){
	// alert(111);
    var tea_id = $(this).attr("tea_id");
    //  alert(tea_id);return;
    var url = "{{url('/admin/course/teacher/del')}}";
    var data = {tea_id:tea_id};
    if(confirm("是否删除")){
            $.ajax({
            url:url,
            data:data,
            dataType:"json",
            async:"false",
            type:"post",
            success:function(res){
				console.log(res);
                if(res.code=="0000"){
                alert(res.msg);
                location.href="{{url('/admin/course/teacher/list')}}";
              }
            }
        })
    }
})
</script>