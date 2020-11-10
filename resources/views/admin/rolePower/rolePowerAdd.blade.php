<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基本表单</title>
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
                    <h5>角色权限添加</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="form_basic.html#">选项1</a>
                            </li>
                            <li><a href="form_basic.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="/admin/rolePowerAdd" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">角色选择</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="role_id">
                                    <option value="0">请选择角色</option>
                                    @foreach($roleData as $k=>$v)
                                    <option value={{$v['role_id']}}>{{$v['role_name']}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div><h3 >权限选择</h3></div>
                        <div class="hr-line-dashed"></div>
                        @foreach($powerData as $k=>$v)
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><input type="checkbox" class="click1" value={{$v['p_id']}} name="p_id[]" id="inlineCheckbox1">{{$v['p_name']}}</label>
                            <div class="col-sm-10 ">
                                @foreach($v['son'] as $kk=>$vv)
                                <label class="checkbox-inline">
                                    <input type="checkbox" value={{$vv['p_id']}} class="click2" name="p_id[]" id="inlineCheckbox1">{{$vv['p_name']}}</label>
                                    @endforeach
                            </div>
                        </div>
                        @endforeach
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存内容</button>
                                <button class="btn btn-white" type="submit">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="/admin/js/content.js?v=1.0.0"></script>

<!-- iCheck -->
<script src="/admin/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('.click1').click(function () {
            var checked = $(this).prop('checked');
            if (checked == true){
                $(this).parent().next().find('input').prop('checked',true);
            }else{
                $(this).parent().next().find('input').prop('checked',false);
            }
        });
        $('.click2').click(function () {
                var check=0;
                $(this).parent().siblings().find('input').each(function () {
                    if ($(this).prop('checked') == true){
                        check=1;
                    }
                });
                if ($(this).prop('checked') == true){
                    $(this).parents('div').prev().find('input').prop('checked',true);
                }else{
                    if (check != 1){
                        $(this).parents('div').prev().find('input').prop('checked',false);
                    }
                }
        });
    });
</script>




</body>

</html>
