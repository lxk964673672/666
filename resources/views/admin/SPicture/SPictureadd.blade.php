<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家完善资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  
    <link rel="stylesheet" href="../../status/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../status/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../../status/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../status/css/style.css">
	<script src="../../status/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../status/plugins/bootstrap/js/bootstrap.min.js"></script>
   
    
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
                                <a href="" data-toggle="tab">轮播图添加</a>                             
                            </li>                            
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                 
                                    <div class="col-md-2 title">轮播图地址</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control"  ng-model="entity.name"  placeholder="轮播图地址" value="">
                                    </div>

									<div class="col-md-2 title">轮播图标题</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" ng-model="entity.mobile"  placeholder="轮播图标题" value="">
                                    </div>

                                    <div class="col-md-2 title">轮播图内容</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control"  ng-model="entity.telephone"  placeholder="轮播图内容" value="">
                                    </div>

                                    <div class="col-md-2 title">轮播图图片</div>
                                    <div class="col-md-10 data">
                                        <input type="file" name="imgs" id="lmg">
                                         <input type="hidden" name="img_path" value="" id="img_paths">
                                    </div>

                                    <div class="col-md-2 title">背景图片</div>
                                    <div class="col-md-10 data">
                                        <input type="file" name="imgs" id="lmg">
                                         <input type="hidden" name="img_path" value="" id="img_paths">
                                    </div>

                                    <div class="col-md-2 title">轮播图权重</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control"  ng-model="entity.telephone"  placeholder="轮播图权重(1)" value="">
                                    </div>

                                    <div class="col-md-2 title">是否展示</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control"  ng-model="entity.telephone"  placeholder="轮播图背景图片" value="">
                                    </div> 
                                </div>
                            </div>
 
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
                    </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button>
				      <a ng-click="submit()" data-toggle="modal" class="btn btn-danger">提交</a>
				  </div>
            </section>
            <!-- 正文区域 /-->
</body>
</html>
<script src="../../jquery.js"></script>
<script>
    $(document).ready(function(){
        
        // location.href="/";
    });
</script>