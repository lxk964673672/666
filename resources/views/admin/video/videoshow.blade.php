<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>课程视频管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../../admin/status/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../admin/status/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../../../admin/status/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../../admin/status/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../../admin/status/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->
                    <div class="box-header with-border">
                        <h3 class="box-title">课程视频管理</h3>
                        <center><h3 color="red">{{session("get")}}</h3></center>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">
                              <!--数据列表-->
                              <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                                  <thead>
                                      <tr>
                                          <th class="sorting_asc">课程视频ID</th>
                                          <th class="sorting">课程</th>
                                          <th class="sorting">课程目录</th>
                                          <th class="sorting">视频名称</th>
                                          <th class="sorting">视频</th>
                                          <th class="sorting">时长</th>      
                                          <th class="sorting">添加时间</th>                                                        
                                          <th class="text-center">操作</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($name as $v=>$k)
                                    <tr center="center">
                                      <td>{{$k["video_id"]}}</td>
                                      <td>{{$k["cou_name"]}}</td>
                                      <td>{{$k["catalog_id"]}}</td>
                                      <td>
                                        {{$k["video_name"]}}
                                      </td>
                                      <td>
                                        <embed src="../../../{{$k['video_img']}}" type="">
                                      </td>
                                      <td>
                                        {{$k["video_length"]}}分钟
                                      </td>
                                      <td>
                                          {{date('Y-m-d H:i:s',$k['time'])}}
                                      </td>
                                      <td>
                                        <button type="button" class="btn bg-olive btn-xs del" video_id='{{$k["video_id"]}}'>删除</button>   
                                        <button type="button" class="btn bg-olive btn-xs upd" video_id='{{$k["video_id"]}}'>修改</button>    
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
        var video_id = _this.attr("video_id");
        if(window.confirm("你要删除这条数据吗？")){
          var url = "/admin/course/video/del/"+video_id;
          location.href=url;
        }
    });
    $(".upd").click(function(){
        var _this = $(this);
        var video_id = _this.attr("video_id");
        var url = "/admin/course/video/upd/"+video_id;
        location.href=url;
    });
  });
</script>