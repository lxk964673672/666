<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>课程公告</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>课程公告展示</h2>
<a style="float:right" href="{{url('/admin/course/notice/create')}}">
            <button type="button" class="btn btn-pink">添加</button>
        </a>
</center>
<form class="form-horizontal" role="form">
<input type="text" name="cou_name" value="{{$cou_name}}" placeholder="请输入课程关键字">
	<button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>课程</th>
			<th>公告内容</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
	</thead>
	@foreach($notice as $v)
	<tbody>
		<tr>
			<td>{{$v->cou_name}}</td>
			<td>{{$v->notice}}</td>
            <td>{{date("Y-m-d H:i:s",$v->create_time)}}</td>
			<td>
            <a href="{{url('/admin/course/notice/edit/'.$v->notice_id)}}">
					<button type="button" class="btn btn-primary">修改</button>
				</a> 
			<button type="button" class="btn btn-warning del" notice_id="{{$v->notice_id}}" title="Popover title" data-container="body" data-toggle="popover" data-placement="right" data-content="右侧的 Popover 中的一些内容">删除</button>

            </td>
		</tr>
	</tbody>
	@endforeach
</table>
{{$notice->appends(['cou_name'=>$cou_name])->links()}}

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script>
//软删除
$(document).on("click",".del",function(){
	// alert(111);
    var notice_id = $(this).attr("notice_id");
    //  alert(notice_id);return;
    var url = "{{url('/admin/course/notice/del')}}";
	var data = {notice_id:notice_id};
	// alert(data);
    if(confirm("是否删除")){
            $.ajax({
				url:url,
				data:data,
				dataType:"json",
				async:"true",
				type:"post",
				success:function(res){
					console.log(res);
					// return false;
					if(res.code=="0000"){
					alert(res.msg);
					location.href="{{url('/admin/course/notice/list')}}";
				}
            }
        })
    }
})
</script>