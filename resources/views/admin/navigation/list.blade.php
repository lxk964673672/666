<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>轮播图管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../admin/status/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../admin/status/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../../admin/status/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../admin/status/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../admin/status/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->
                    <div class="box-header with-border">
                        <h3 class="box-title">导航栏管理</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">
                              <!--数据列表-->
                              <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                                  <thead>
                                      <tr>
                                          <th class="sorting_asc">导航栏ID</th>
                                          <th class="sorting">导航栏名称</th>
                                          <th class="sorting">导航栏地址</th>
                                          <th class="sorting">是否展示</th>
                                          <th class="sorting">添加时间</th>                                                      
                                          <th class="text-center">操作</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($name as $k=>$a)
                                    <tr>
                                      <td>{{$a->nav_id}}</td>
                                      <td>{{$a->nav_name}}</td>
                                      <td>{{$a->nav_url}}</td>
                                      <td>{{$a->is_show==1?'是':'否'}}</td>
                                      <td>{{date('Y-m-d H:i:s',$a->add_time)}}</td>
                                      <td>
                                        <button type="button" class="btn bg-olive btn-xs del" nav_id='{{$a->nav_id}}'>删除</button>   
                                        <button type="button" class="btn bg-olive btn-xs upd" nav_id='{{$a->nav_id}}'>修改</button>  
                                      </td>
                                    </tr>
                                    @endforeach
                                    <td colspan="6">
                                          <center>{{$name->links()}}</center>
                                    </td>
                                  </tbody>
                              </table>
                              <!--数据列表/-->                        
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->
</body>
</html>
<script src="../../../jquery.js"></script>
<script src="../../../../../admin/status/layui/layui.js"></script>
<script>
  $(function(){
    //删除
    $(".del").click(function(){
        var _this = $(this);
        var nav_id = _this.attr("nav_id");
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
            layer.close(index);
            });
          //eg2
          layer.confirm('是否删除？', function(index){
            var url = "/admin/navigation/del/"+nav_id;
            location.href=url;
            layer.close(index);
          });    
        });
    });
    //修改
    $(".upd").click(function(){
        var _this = $(this);
        var nav_id = _this.attr("nav_id");
        layui.use('layer', function(){
              var layer = layui.layer;
        layer.confirm('is not?', {icon: 4, title:'提示'}, function(index){
        layer.close(index);
        });
        //eg2
        layer.confirm('是否要修改？', function(index){
          var url = "/admin/navigation/upd/"+nav_id;
          location.href=url;
          layer.close(index);
        });    
        });
    });
    //ajax分页
    $(document).on("click",".page-item a",function(){
      var url = $(this).attr("href");
      $.get(url,function(index){
        $("table").html(index);
      });
      return false;
    })
  });
</script>