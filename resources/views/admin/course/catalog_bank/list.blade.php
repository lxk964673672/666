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
			<th>试题名称</th>
			<th>目录</th>
			<th>试题类型</th>
            <th>问题</th>
            <th>选择答案</th>
			<th>试题难度</th>
			<th>试题分数</th>
            <th>正确答案</th>
            <th>操作</th>
		</tr>
	</thead>
	@foreach($bank as $v)
	<tbody>
		<tr>
			<td><input type="checkbox"></td>
			<td>{{$v->bank_name}}</td>
			<td>{{$v->catalog_name}}</td>
            <td>@if($v->bank_type==1)单选择题
				@elseif($v->bank_type==2)多选题
				@endif
			</td>
            <td>{{$v->bank_text}}</td>
            <td>
                @foreach($select[$v['bank_id']] as $vv)
                    @if($vv[0] == 1)A :{{$vv[1]}},
                    @elseif($vv[0]==2)B :{{$vv[1]}},
                    @elseif($vv[0]==3)C :{{$vv[1]}},
                    @elseif($vv[0]==4)D :{{$vv[1]}},
                    @endif
                    @endforeach
            </td>
            <td>@if($v->bank_hard==1)简单  
				@elseif($v->bank_hard==2)普通  
				@elseif($v->bank_hard==3)困难
				@elseif($v->bank_hard==4)地狱模式
				@endif
			</td>
            <td>{{$v->bank_number}}</td>
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
                if(res.code=="0000"){
                	alert(res.msg);
                	location.href="{{url('/admin/course/catalog_bank/list')}}";
              	}
            }
        })
    }
})
</script>
