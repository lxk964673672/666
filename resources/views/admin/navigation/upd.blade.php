<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家完善资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  
    <link rel="stylesheet" href="../../../admin/status/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../admin/status/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../../../admin/status/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../../admin/status/css/style.css">
	<script src="../../../admin/status/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../../admin/status/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini" >
            <!-- 正文区域 -->
            <section class="content">

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                       		
                            <li class="active">
                                <a href="" data-toggle="tab">导航栏修改</a>                             
                            </li>                            
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                 
                                    <div class="col-md-2 title">导航栏名称</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="nav_name" ng-model="entity.name"  placeholder="导航栏名称" value="{{$name->nav_name}}">
                                    </div>

                                    <div class="col-md-2 title">导航跳转路径</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="nav_url" ng-model="entity.telephone" value="{{$name->nav_url}}" placeholder="导航跳转路径">
                                    </div>

                                    <div class="col-md-2 title">是否展示</div>
                                    <div class="col-md-10 data">
                                 		<input type="hidden" name="nav_id" value="{{$name->nav_id}}">
                                  		<input type="radio" name="is_show" value="1" id="is_show" @if($name->is_show == 1) checked @endif>是
                                        <input type="radio" name="is_show" value="2" id="is_show" @if($name->is_show == 2) checked @endif>否
                                    </div> 
                                </div>
                            </div>
                         </div>
                    </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save">修改</i></button>
				      <a href="" ng-click="submit()" data-toggle="modal" class="btn btn-danger">清空</a>
				  </div>
            </section>
            <!-- 正文区域 /-->
</body>
</html>
<script src="../../../../jquery.js"></script>
<script src="../../../../../../admin/status/layui/layui.js"></script>
<script>
    $(document).ready(function(){
		$(".btn-primary").click(function(){
			var nav_name = $("input[name='nav_name']").val();
			var nav_url = $("input[name='nav_url']").val();
			var is_show = $("#is_show:checked").val();
			var nav_id = $("input[name='nav_id']").val();
			if(nav_name == ""||nav_url==""||is_show==""){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg('请不要空下选项', {
                        icon: 5,
                        time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                        //do something
                    });   
                });
				return false;
			}
			var	url = "/admin/navigation/upd/"+nav_id;
			$.ajax({
				url:url,
				dataType:'json',
				type:"post",
				data:{nav_name:nav_name,nav_url:nav_url,is_show:is_show},
				adync:true,
				success:function(index){
					if(index.error == 0){
				     	var	uel = index.data;
                        layui.use('layer', function(){
                            var layer = layui.layer;
                                layer.msg(index.msg, {
                                icon: 1,
                                time: 3000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                //do something

                            });   
                        });
						location.href=uel;
					}else{
                        layui.use('layer', function(){
                            var layer = layui.layer;
                                layer.msg(index.msg, {
                                icon: 2,
                                time: 3000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                //do something

                            });   
                        });
					}
				}
			});
		});
        // location.href="/";
    });
</script>