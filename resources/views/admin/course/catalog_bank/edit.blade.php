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
    <h2>题库修改</h2>

</center>
<form class="form-horizontal" role="form">

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">题库名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="bank_name" value={{$bank['bank_name']}} id="lastname" placeholder="题库名称">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">目录</label>
        <div class="col-sm-8">
            <select name="catalog_id" id="catalog_id" class="form-control">
                <option value="">-请选择-</option>
                @foreach($log as $v)
                    <option @if($bank['catalog_id'] == $v['catalog_id']) selected="selected" @endif value={{$v->catalog_id}}>{{$v->catalog_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">题库类型</label>
        <div class="col-sm-8">
            <input type="radio" name="bank_type" id="bank_type" @if($bank['bank_type'] == 1) checked @endif value="1">单选题
            <input type="radio" name="bank_type" id="bank_type" @if($bank['bank_type'] == 2) checked @endif value="2"> 多选题
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">问题</label>
        <div class="col-sm-8">
            <textarea name="bank_text" bank_text={{$bank['bank_text']}} id="bank_text" class="form-control" cols="10" rows="5">{{$bank['bank_text']}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">选择答案</label>
        <div class="col-sm-10" name="choose">
            @foreach($bank['select'] as $v)
            <div class="input-group m-b">
                <div class="col-sm-10" style="width: 101px" >
                    <select class="form-control m-b" name="select[]" style="width: 100px">
                        <option @if($v[0] == 1) selected="selected" @endif value="1">A</option>
                        <option @if($v[0] == 2) selected="selected" @endif value="2">B</option>
                        <option @if($v[0] == 3) selected="selected" @endif value="3">C</option>
                        <option @if($v[0] == 4) selected="selected" @endif value="4">D</option>
                    </select>
                </div>
                <span count_num="1"></span>
                <input type="text" name="select[]" value={{$v[1]}} class="form-control" style="width: 870px">
                @if($v[0] == 1)<button type="button" class="btn btn-primary add">增加</button>@endif
            </div>
                @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">分数</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value=2 name="bank_number" id="bank_number" placeholder="分数">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">题库难度</label>
        <div class="col-sm-8">
            <input type="radio" name="bank_hard" id="bank_hard" value="1" checked> 简单
            <input type="radio" name="bank_hard" id="bank_hard" value="2"> 普通
            <input type="radio" name="bank_hard" id="bank_hard" value="3"> 困难
            <input type="radio" name="bank_hard" id="bank_hard" value="4"> 地狱模式
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">正确答案</label>
        <div class="col-sm-8">
            <textarea name="bank_key" id="bank_key" class="form-control" cols="10" rows="5">{{$bank['bank_key']}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10" bank_id={{$bank_id}}>
            <button type="button" id="buuton-he"  class="btn btn-default">修改</button>
        </div>
    </div>
</form>

</body>

<div class="input-group m-b" style="display:none;" id="tpl">
    <div class="col-sm-10" style="width:101px">
        <select class="form-control m-b" name="select[]" style="width: 100px">
            <option value="1">A</option>
            <option value="2">B</option>
            <option value="3">C</option>
            <option value="4">D</option>
        </select>
    </div>
    <span></span>
    <input type="text" class="form-control" name="select[]" style="width: 870px">
</div>

</html>
<script src="/admin/js/jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
    $(document).on('click','#buuton-he',function(){
        // alert(111);
        // 题库名称
        var bank_name = $("input[name='bank_name']").val();
        //选择答案
        var select1 = [];
        $('[count_num="1"]').parents('.input-group').find('[name="select[]"]').each(function () {
            select1.push($(this).val());
        });
        var select2 = [];
        $('[count_num="2"]').parents('.input-group').find('[name="select[]"]').each(function () {
            select2.push($(this).val());
        });
        var select3 = [];
        $('[count_num="3"]').parents('.input-group').find('[name="select[]"]').each(function () {
            select3.push($(this).val());
        });
        var select4 = [];
        $('[count_num="4"]').parents('.input-group').find('[name="select[]"]').each(function () {
            select4.push($(this).val());
        });
        //目录
        var catalog_id = $('#catalog_id').val();
        // alert(catalog_id);
        // 题库类型
        var bank_type = $("#bank_type:checked").val();
        // alert(bank_type);
        // 题库内容
        var bank_text = $("#bank_text").val();
        // 分数
        var bank_number = $("#bank_number").val();
        // alert(bank_text);
        // 题库难度
        var bank_hard = $("#bank_hard:checked").val();
        // alert(bank_hard);
        // 题库答案
        var bank_key = $("#bank_key").val();
        var bank_id=$(this).parent().attr('bank_id');
        // alert(bank_key);
        $.ajax({
            url:"{{url('/admin/course/catalog_bank/update')}}",
            type:"post",
            data:{bank_id:bank_id,bank_number:bank_number,select1:select1,select2:select2,select3:select3,select4:select4,bank_name:bank_name,catalog_id:catalog_id,bank_type:bank_type,bank_text:bank_text,bank_hard:bank_hard,bank_key:bank_key},
            dataType: "json",
            async:true,
            success:function(res){
                if(res.code="00000"){
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg(res.msg, {
                            icon: 1,
                            time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            //do something
                        });
                    });
                    window.location.href=res.url;
                }else{
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg(res.msg, {
                            icon: 5,
                            time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            //do something
                        });
                    });
                }
            }
        });
    });
    $(document).on('click','.add',function () {
        var num = $("div[name='choose']").find(".input-group").length;
        num++;
        var obj = $("#tpl").clone();
        obj.find("span").attr("count_num",num);
        obj.show();
        $("div[name='choose']").append(obj);
    });
</script>
