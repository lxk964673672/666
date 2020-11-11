<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>考试</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>考试展示</h2>

</center>
<form class="form-horizontal" role="form">
	<input type="text" name="exam_name" value="" placeholder="请输入考试名称关键字">
	<button type="submit" class="btn btn-default">搜索</button>

</form>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>考试名称</th>
			<th>开始时间</th>
            <th>结束时间</th>
			<th>添加时间</th>
            <th>操作</th>
		</tr>
	</thead>
	@foreach($exam as $v)
	<tbody>
		<tr>
            <td>{{$v->exam_name}}</td>
            <td>{{$v->exam_begin_time}}</td>
            <td>{{$v->exam_end_time}}</td>
            <td>{{date("Y-m-d H:i:s",$v->exam_time)}}</td>
			<td>
            <a href="">
                <button type="button" class="btn btn-primary">修改</button>
            </a>
			<button type="button" class="btn btn-warning del" exam_id="{{$v->exam_id}}" 
				title="Popover title" data-container="body" data-toggle="popover" data-placement="right" 
				data-content="右侧的 Popover 中的一些内容">删除</button>
            </td>
		</tr>
    </tbody>
	@endforeach
</table>
{{$exam->appends(['exam_name'=>$exam_name])->links()}}

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
//软删除
$(document).on("click",".del",function(){
	// alert(111);
    var exam_id = $(this).attr("exam_id");
    //  alert(exam_id);return;
    if(confirm("是否删除")){
            $.ajax({
            url:"{{url('/admin/course/exam/del')}}",
            data:{exam_id:exam_id},
            dataType:"json",
            async:"false",
            type:"post",
            success:function(res){
				console.log(res);
                if(res.code=="0000"){
                	alert(res.msg);
                	location.href="{{url('/admin/course/exam/list')}}";
              	}
            }
        })
    }
})
</script>