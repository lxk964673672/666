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
                                        <input type="text" class="form-control" name="slide_url" ng-model="entity.name"  placeholder="轮播图地址" value="{{$name->slide_url}}">
                                    </div>

									<div class="col-md-2 title">轮播图标题</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="Silde_name" ng-model="entity.mobile"  placeholder="轮播图标题" value="{{$name->slide_name}}">
                                    </div>

                                    <div class="col-md-2 title">轮播图图片</div>
                                    <div class="col-md-10 data">
                                        <input type="file" name="imgs" id="lmg">
                                        <input type="hidden" name="img_path"  value="{{$name->silde_log}}" id="img_paths">

                                    </div>

                                    <div class="col-md-2 title">轮播图权重</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="silde_weight"   value="{{$name->slide_weight}}" ng-model="entity.telephone"  placeholder="轮播图权重(最大{{$swei}})">
                                    </div>

                                    <div class="col-md-2 title">是否展示</div>
                                    <div class="col-md-10 data">
                                 
                                  		<input type="radio" name="is_show" value="1" @if($name->is_show == 1) checked @endif>是
                                        <input type="radio" name="is_show" value="2" @if($name->is_show == 2) checked @endif>否
                                    </div> 
                                </div>
                            </div>
 
                         </div>
                        <div  class="input-group" id="imgs_desc">
                            <img src='../../../../{{$name->silde_log}}' id="hide" width='200px'>
                            <input type="hidden" name="slide_id" value="{{$name->slide_id}}">
                        </div>
                    </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save">添加</i></button>
				      <a href="" ng-click="submit()" data-toggle="modal" class="btn btn-danger">清空</a>
				  </div>
            </section>
            <!-- 正文区域 /-->
</body>
</html>
<script src="../../jquery.js"></script>
<link rel="stylesheet" href="../../../status/uploadify/uploadify.css">
<script src="../../status/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function(){
		$("#lmg").uploadify({
			uploader:"/admin/slide/store",
			swf: "../../status/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
				var images = data;
				$("#img_paths").val(images);
				var imgstr = "<img src='../../../"+images+"' width='200px'>";
                $("#hide").hide();
                $("#imgs_desc").append(imgstr);
			}
		});
		$(".btn-primary").click(function(){
			var slide_url = $("input[name='slide_url']").val();
			var Silde_name = $("input[name='Silde_name']").val();
			var img_path = $("input[name='img_path']").val();
			var silde_weight = $("input[name='silde_weight']").val();
			var is_show = $("input[name='is_show']").val();
            var slide_id = $("input[name='slide_id']").val();
			if(slide_url == ""||Silde_name==""||img_path==""||silde_weight==""||is_show==""||slide_id==""){
				alert("请不要丢下我");
				return false;
			}
			var	url = "/admin/slide/upd/"+slide_id;
			$.ajax({
				url:url,
				dataType:'json',
				type:"post",
				data:{slide_url:slide_url,Silde_name:Silde_name,img_path:img_path,silde_weight:silde_weight,is_show:is_show},
				adync:true,
				success:function(index){
					console.log(index);
					if(index.error == 0){
				     	var	uel = index.data;
						alert(index.msg);
						location.href=uel;
					}else{
						alert(index.msg);
					}
				}
			});

		});
        // location.href="/";
    });
</script>