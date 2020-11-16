<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基础表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>考试题添加</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_basic.html#">选项1</a>
                            </li>
                            <li><a href="table_basic.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-5 m-b-xs">
                            <select class="input-sm form-control input-s-sm inline" name="catalog_id">
                                <option value="0">目录</option>
                                @foreach($catalogData as $v)
                                <option value={{$v['catalog_id']}}>{{$v['catalog_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" placeholder="请输入关键词" name="bank_name" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                            </div>
                        </div>
                        <div>
                            <button type="button"  class="btn btn-primary self">自动选题</button>
                        </div>
                        <div>
                            <button type="button"  class="btn btn-primary quit">取消选题</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th></th>
                                <th>题库名称</th>
                                <th>目录</th>
                                <th>题库类型</th>
                                <th>问题</th>
                                <th>选择答案</th>
                                <th>题库难度</th>
                                <th>正确答案</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bank as $v)
                            <tr>
                                <td >
                                    <input type="checkbox" bank_number={{$v['bank_number']}} bank_id={{$v['bank_id']}} id="select1"  name="select">
                                </td>
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
                                <td>{{$v->bank_key}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div exam_id={{$exam_id}}><button type="button"  class="btn btn-primary add">添加考试题</button></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- 全局js -->
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>



<!-- Peity -->
<script src="/admin/js/plugins/peity/jquery.peity.min.js"></script>

<!-- 自定义js -->
<script src="/admin/js/content.js?v=1.0.0"></script>


<!-- iCheck -->
<script src="/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>

<!-- Peity -->
<script src="/admin/js/demo/peity-demo.js"></script>

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

    });

    $(document).on('click','.self',function () {
        $('input:checkbox[name=select]').each(function () {
            var bank_number = [];
            bank_number.push(0);
            $('input:checkbox[name=select]:checked').each(function () {
                bank_number.push($(this).attr('bank_number'));
            });
            var number = sum(bank_number);
            if (number < 10){
                $(this).prop('checked',true);
            }
        });
    });
    $(document).on('click','.quit',function () {

            $('input:checkbox[name=select]:checked').each(function () {
                $(this).prop('checked',false);
            });
    });
    $(document).on('click','#select1',function () {
        var bank_number = [];
        $('input:checkbox[name=select]:checked').each(function () {
            bank_number.push($(this).attr('bank_number'));
        });
        var number = sum(bank_number);
        if (number == 10){
            alert('选满10分');
        }
        if (number >10){
            alert('选多了');
            $(this).prop('checked',false);
        }
    });
    function sum(arr){
        return eval(arr.join("+"));
    }
    $(document).on('click','.add',function () {
        var bank_id=[];
        var bank_number = [];
        var exam_id = $(this).parent().attr('exam_id');
        $('input:checkbox[name=select]:checked').each(function () {
            bank_number.push($(this).attr('bank_number'));
            var id = $(this).attr('bank_id');
            bank_id.push(id);
        });
        var number = sum(bank_number);
        if (number != 10){
            alert('分数不满足');
            return false;
        }
        $.ajax({
            url:"/admin/course/exam/examBackAdd",
            data:{bank_id:bank_id,exam_id:exam_id},
            dataType:"json",
            type:'post',
            success:function (res) {
                console.log(res);
                if(res.code=1){
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
        })
    });
</script>




</body>

</html>
