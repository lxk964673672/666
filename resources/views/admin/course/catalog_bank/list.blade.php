<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>题库</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>题库展示</h2>
<a style="float:right" href="{{url('/admin/course/catalog_bank/create')}}">
            <button type="button" class="btn btn-pink">添加</button>
        </a>
</center>
<form class="form-horizontal" role="form">
	<input type="text" name="bank_name" value="{{$bank_name}}" placeholder="请输入题库名称关键字">
	<input type="text" name="catalog_name" value="{{$catalog_name}}" placeholder="请输入目录关键字">
	<button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
			<th><input type="checkbox"></th>
			<th>题库名称</th>
			<th>目录</th>
			<th>题库类型</th>
            <th>题库内容</th>
			<th>题库难度</th>
            <th>题库答案</th>
            <th>操作</th>
		</tr>
	</thead>
	@foreach($bank as $v)
	<tbody>
		<tr>
			<td><input type="checkbox"></td>
			<td>{{$v->bank_name}}</td>
			<td>{{$v->catalog_name}}</td>
            <td>@if($v->bank_type==1)php  
				@elseif($v->bank_type==2)python  
				@elseif($v->bank_type==3)C
				@elseif($v->bank_type==4)C++
				@elseif($v->bank_type==5)Pascal 
				@elseif($v->bank_type==6)java 
				@endif
			</td>
            <td>{{$v->bank_text}}</td>
            <td>@if($v->bank_hard==1)简单  
				@elseif($v->bank_hard==2)普通  
				@elseif($v->bank_hard==3)困难
				@elseif($v->bank_hard==4)地狱模式
				@endif
			</td>
            <td>{{$v->bank_key}}</td>
			<td>
				<a href="{{url('/admin/course/catalog_bank/edit/'.$v->bank_id)}}">
					<button type="button" class="btn btn-primary">修改</button>
				</a>
				<button type="button" class="btn btn-warning del" bank_id="{{$v->bank_id}}" 
				title="Popover title" data-container="body" data-toggle="popover" data-placement="right" 
				data-content="右侧的 Popover 中的一些内容">删除</button>

            </td>
		</tr>
    </tbody>
	@endforeach
</table>
{{$bank->appends(['bank_name'=>$bank_name,'catalog_name'=>$catalog_name])->links()}}

</body>
</html>
<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
//软删除
$(document).on("click",".del",function(){
	// alert(111);
    var bank_id = $(this).attr("bank_id");
    //  alert(bank_id);return;
    if(confirm("是否删除")){
            $.ajax({
            url:"{{url('/admin/course/catalog_bank/del')}}",
            data:{bank_id:bank_id},
            dataType:"json",
            async:"false",
            type:"post",
            success:function(res){
				console.log(res);
                if(res.code=="0000"){
                	alert(res.msg);
                	location.href="{{url('/admin/course/catalog_bank/list')}}";
              	}
            }
        })
    }
})
</script>