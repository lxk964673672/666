<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 数据表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_data_tables.html#">选项1</a>
                            </li>
                            <li><a href="table_data_tables.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>管理员名称</th>
                            <th>管理员角色</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['data'] as $k=>$v)
                            <tr class="gradeX">
                                <td>{{$v['admin_name']}}</td>
                                <td>
                                    @if($v['type'] == 1)
                                        超级管理员(无法更改)
                                    @elseif(isset($roleData[$v['admin_id']]))
                                        @foreach($roleData[$v['admin_id']] as $vv)<span>{{$vv['role_name']}}__</span>@endforeach
                                    @else
                                        空
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-default btn-rounded" id="update">更改用户角色</button>
                                    <button class="btn btn-default btn-rounded" admin_id={{$v['admin_id']}} id="del">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data1->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>



<script src="/admin/js/plugins/jeditable/jquery.jeditable.js"></script>

<!-- Data Tables -->
<script src="/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- 自定义js -->
<script src="/admin/js/content.js?v=1.0.0"></script>


<!-- Page-Level Scripts -->
<script>

        $(document).on('click','#update',function () {
            location.href="/admin/adminRoleAdd";
        });
        $(document).on('click','#del',function () {
            var admin_id = $(this).attr('admin_id');
            $.ajax({
                url:'/admin/adminDel',
                data:{admin_id:admin_id},
                dataType:'json',
                type:'post',
                success:function (res) {
                    if (res['code'] == 1){
                        alert(res['msg']);
                    }else{
                        alert('删除失败');
                    }
                }
            })
        })

</script>




</body>

</html>
