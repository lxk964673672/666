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
    <link rel="stylesheet" href="../../../../admin/status/css/style.css">
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
                                <a href="" data-toggle="tab">课程视频添加</a> 
                                <center><h3 color="red">{{session("get")}}</h3></center>                            
                            </li>                            
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                 
                                    <div class="col-md-2 title">课程</div>
                                    <div class="col-md-10 data">
                                        <select name="cou_id" id="cou_id">
                                            <option value="">---请选择----</option>
                                            @foreach($course as $k=>$a)
                                            <option value="{{$a['cou_id']}}">{{$a['cou_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 title">课程目录</div>
                                    <div class="col-md-10 data">
                                       <select name="catalog_id" id="catalog_id">
                                            <option value="">---请选择----</option>
                                            <option value="1">终结</option>
                                            @foreach($catalog as $k=>$a)
                                            <option value="{{$a['catalog_id']}}">{{$a['catalog_desc']}}</option>
                                            @endforeach
                                       </select>
                                    </div>

									<div class="col-md-2 title">视频名称</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="video_name" ng-model="entity.mobile"  placeholder="视频名称" value="">
                                    </div>

                                    <div class="col-md-2 title">视频</div>
                                    <div class="col-md-10 data">
                                        <input type="file" name="video_img" id="lmg">
                                        <input type="hidden" name="videodesc_img"  value="" id="video_img">
                                    </div>

                                    <div class="col-md-2 title">时长</div>
                                    <div class="col-md-10 data">
                                        <input type="text" class="form-control" name="video_length" ng-model="entity.mobile"  placeholder="所需多少时间（分钟）" value="">
                                    </div>
                                </div>
                            </div>
 
                         </div>
                        <div  class="input-group" id="imgs_desc"></div>
                    </div>
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save">添加</i></button>
				      <a href="" ng-click="submit()"  class="btn btn-danger">清空</a>
				  </div>
            </section>
            <!-- 正文区域 /-->
</body>
</html>
<script src="../../jquery.js"></script>
<link rel="stylesheet" href="../../../../admin/status/uploadify/uploadify.css">
<script src="../../../admin/status/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function(){
		$("#lmg").uploadify({
			uploader:"/admin/course/video/store",
			swf: "../../../admin/status/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
				var images = data;
				$("#video_img").val(images);
                var imgstr = "<embed src='../../../../"+images+"' type=''>";
				$("#imgs_desc").append(imgstr);
			}
		});
		$(".btn-primary").click(function(){
			var cou_id = $("#cou_id").val();
			var catalog_id = $("#catalog_id").val();
			var video_name = $("input[name='video_name']").val();
			var videodesc_img = $("input[name='videodesc_img']").val();
			var video_length = $("input[name='video_length']").val();
			if(cou_id == ""||catalog_id==""||video_name==""||videodesc_img==""||video_length==""){
				alert("请不要丢下我");
				return false;
			}
			var	url = "/admin/course/video/create";
			$.ajax({
				url:url,
				dataType:'json',
				type:"post",
				data:{cou_id:cou_id,catalog_id:catalog_id,video_name:video_name,videodesc_img:videodesc_img,video_length:video_length},
				adync:true,
				success:function(index){
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