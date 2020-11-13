<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
                              <!-- session拿到当前讲师的id 和 当前讲师的课程id 给这个讲师的这个课程增加章节 自动生成目录（标题，大致描述） 点击进去就是 这一章的详情（标题 具体描述） -->
<style>
  *{
  margin: 0;
    padding: 0;

}
.aa{
  text-align:center;
  color:orange;
}
.bb{
  text-align:center;
  color:red;
}
</style>
<body>
<form class="form-horizontal">
  <div class="form-group">
    <div>
  <h3 class="aa">课程名称：</h3><h3 class="bb" cou_id="{{$data->cou_id}}">{{$data->cou_name}}</h3>
</div>
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">这是第几章 :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="catalog_chapters" name="catalog_chapters" placeholder="请填写阿拉伯数字">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">这一章 标题：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="catalog_name" name="catalog_name" placeholder="目录名称">
    </div>
  </div>

   <div class="form-group">
    <label for="text" class="col-sm-2 control-label">这一章 大致描述：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="catalog_desc" name="catalog_desc" placeholder="大致描述">
    </div>
  </div>

    <div class="form-group">
    <label for="text" class="col-sm-2 control-label">图片上传：</label>
    <div class="col-sm-10">
        <input type="file" name="video_img" id="lmg">
        <input type="hidden" name="videodesc_img"  value="" id="video_img">
    </div>
  </div>
 <div  class="input-group" id="imgs_desc"></div>


 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">上传</button>
    </div>
  </div>

</form>
</body>
</html>
<script src="/admin/js/jquery.js"></script>
<link rel="stylesheet" href="../../../../../admin/status/uploadify/uploadify.css">
<script src="../../../../admin/status/uploadify/jquery.uploadify.js"></script>
<script src="/admin/status/layui/layui.js"></script>
<script>
    $(document).ready(function(){
    $("#lmg").uploadify({
      uploader:"/admin/course/video/store",
      swf: "../../../../admin/status/uploadify/uploadify.swf",
      onUploadSuccess:function(res,data,msg){
        var images = data;
        $("#video_img").val(images);
                var imgstr = "<embed src='../../../../"+images+"' type=''>";
        $("#imgs_desc").append(imgstr);
      }
    });
     $(document).on('click','button',function () {
        var cou_id=$('.bb').attr('cou_id');
        var catalog_chapters = $('[name="catalog_chapters"]').val();
        var catalog_name = $('[name="catalog_name"]').val();
        var catalog_desc = $('[name="catalog_desc"]').val();

  
        var video_img = $('[name="videodesc_img"]').val();
        // var tea_id = $('[name="tea_id"]').val(); session里拿讲师 tea_id
        // // var cou_id = $('[name="cou_id"]').val(); 接收课程 cou_id
        $.ajax({
            url:"{{url('admin/course/catalog/store')}}",
            type:'post',
            data:{cou_id:cou_id,catalog_chapters:catalog_chapters,catalog_name:catalog_name,catalog_desc:catalog_desc,video_img:video_img},
            dataType: "json",
            success:function(res){
                if(res.code == "00000"){
                   layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg(res.msg, {
                        icon: 1,
                        time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                        //do something
                    });   
                });
                    window.location.href=res.url;
                }else{
                    layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg(res.msg, {
                        icon: 1,
                        time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                        //do something
                    });   
                });
                }
            }
        });
    });
    });
</script>
