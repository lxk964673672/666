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
    
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>给我点支烟</h5>
                    </div>

                        <script src="/uploadify/jquery.min.js"></script>
                        <link rel="stylesheet" href="/uploadify/uploadify.css">
                        <script src="/uploadify/jquery.uploadify.js"></script>


                    <div class="ibox-content">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片:</label>
                                <div class="col-sm-8">
                                     <input type="file"  id="slide_log" name="slide_log">
                        <div class="showimg"></div>
                        <input type="hidden" id="img_url" name="img_path">
                                </div>
                            
                            </div>
                          
                             <div class="form-group">
                                <label class="col-sm-3 control-label">地址</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="地址" class="form-control" name='slide_url' id="slide_url">
                                </div>
                            </div>

                               <div class="form-group">
                                <label class="col-sm-3 control-label">是否展示</label>
                                <div class="col-sm-8">
                                    <input type="radio" value="1" id='is_show' name='is_show' checked>是
                                    <input type="radio" value="2" id='is_show' name='is_show'>否
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">权重</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="权重" class="form-control" id='slide_weight' name='slide_weight'>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                       <button class="btn btn-primary" ng-click="setEditorValue();save()">添加</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
      
    </div>

   

    <!-- 全局js -->
    <!-- <script src="/admin/js/jquery.min.js?v=2.1.4"></script> -->
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
        });
</script>
<script>
   $(document).ready(function(){
        $("#slide_log").uploadify({
            uploader: "/admin/slide/uploads",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr= "<img src='"+imgPath+"'style='width: 50px;height: 50px;'>";
                $("input[name='slide_log']").val(imgPath);
                $(".showimg").append(imgstr);
                $("#img_url").val(data);
            }
            });
    });
 
    </script>
    <script>
 $(document).on('click','button',function(){
        var slide_log=$("#img_url").val();
        var slide_url=$("#slide_url").val();
        var is_show = $("input[name='is_show']").val();
        var slide_weight=$("#slide_weight").val();

        if(slide_log==''){
           alert('图片不能为空');
            return false;
        }
        if(slide_url==''){
           alert('地址不能为空');
            return false;
        }
        if(slide_weight==''){
           alert('权重不能为空');
            return false;
        }
        $.ajax({
            url:"{{url('/admin/slide/store')}}",
            data:{slide_log:slide_log,slide_url:slide_url,is_show:is_show,slide_weight:slide_weight},
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code=='00000'){
                    alert(res.msg);
                    window.location.href=res.url;
                }else{
                    alert(res.msg);
                }
            }
        });

        
    });
</script>

    
    

</body>

</html>
