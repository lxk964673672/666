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
                        <h3 class="box-title">轮播图管理</h3>
                        <center><h3 color="red">{{session("get")}}</h3></center>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">
                              <!--数据列表-->
                              <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                                  <thead>
                                      <tr>
                                          <th class="sorting_asc">轮播图ID</th>
                                          <th class="sorting">轮播图标题</th>
                                          <th class="sorting">轮播图地址</th>
                                          <th class="sorting">轮播图图片</th>
                                          <th class="sorting">轮播图权重</th>
                                          <th class="sorting">是否展示</th>      
                                          <th class="sorting">添加时间</th>                                                        
                                          <th class="text-center">操作</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($name as $v=>$k)
                                    <tr>
                                      <td>{{$k["slide_id"]}}</td>
                                      <td>{{$k["slide_name"]}}</td>
                                      <td>{{$k["slide_url"]}}</td>
                                      <td>
                                        <img src="../../{{$k['silde_log']}}" width="100px">
                                      </td>
                                      <td>{{$k["slide_weight"]}}</td>
                                      <td>{{$k["is_show"]== 1 ? '是' : ''}}</td>
                                      <td>
                                          {{date("Y-m-d H:i:s",$k['slide_time'])}}
                                      </td>
                                      <td>
                                        <button type="button" class="btn bg-olive btn-xs del" slide_id='{{$k["slide_id"]}}'>删除</button>   
                                        <button type="button" class="btn bg-olive btn-xs upd" slide_id='{{$k["slide_id"]}}'>修改</button>    
                                      </td>
                                    </tr>
                                    @endforeach
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
<script>
  $(function(){
    //删除
    $(".del").click(function(){
        var _this = $(this);
        var slide_id = _this.attr("slide_id");
        if(window.confirm("你要删除这条数据吗？")){
          var url = "/admin/slide/del/"+slide_id;
          location.href=url;
        }
    });
    $(".upd").click(function(){
        var _this = $(this);
        var slide_id = _this.attr("slide_id");
        var url = "/admin/slide/upd/"+slide_id;
        location.href=url;
    });
  });
</script>