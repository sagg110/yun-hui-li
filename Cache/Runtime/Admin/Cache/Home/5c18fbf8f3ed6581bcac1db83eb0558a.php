<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title></title>
    <link rel="icon" href="/taobaoke/Public/Uploads/img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="/taobaoke/Public/Admin/Css/bootstrap.min.css" rel="stylesheet">
    <script src="/taobaoke/Public/Admin/Js/jquery.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/bootstrap.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/docs.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/ie10-viewport-bug-workaround.js"></script>

    <!-- Font-awesome core CSS -->
    <link href="/taobaoke/Public/Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/taobaoke/Public/Admin/Css/Homepage.css" rel="stylesheet">

    <style type="text/css">
        .choose{
           border-color: #23527C; 
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
        });

        function sendJson(){
            var url = $('#url').val();
            $.ajax({
                type : "POST",
                url : "<?php echo U('Manclothproduction/catchMessage');?>",
                dataType : "json",
                data: "url=" + encodeURIComponent(url),
                success : function (data) {
                    $('#imput a').remove();
                    $("#altput").hide();
                    if(data.title!=null)
                    {
                        $("#name").attr("value",data.title);
                    }
                    if(data.price_original!=null)
                    {
                        $("#price_original").attr("value",data.price_original);
                    }
                    if(data.price_now!=null)
                    {
                        $("#price_now").attr("value",data.price_now);
                    }
                    $.each(data.images, function (i, item) {
                        $("#imput").append('<a name="imageId" onclick="chooseImage(this);" class="thumbnail" style="width:100px;float:left;margin-right:5px;"><img src="http://'+item+'" style="width:100%; display: block;" class="dd"></a>');
                    });
                }
            });
            window.parent.window.parent.window.iFrameHeight();
        }

        function chooseImage(obj){
            $('#imput a').attr("class","thumbnail");;
            var url = obj.childNodes[0].src;
            obj.className = 'thumbnail choose'; 
            $("#img").attr("value",url);
        }

        function callmyModal_1(u){
            window.top.window.myModalImage(u);
        }
    </script>
    
</head>
<body>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">
                修改单品推介
            </h1>
        </div>
    </div>
    <!-- 导航 -->
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="<?php echo U('Manclothproduction/index');?>">男士服装-单品推介</a></li>
              <li class="active">修改单品推介</li>
            </ol>
        </div>
    </div>
    <form class="form-signin" enctype="multipart/form-data" role="form" action="<?php echo U('Manclothproduction/alter_handle');?>" method='post' id="form">
    <!-- 主体 -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>淘宝地址:</td>
                  <td><input id="url" name="url" type="text" class="form-control" style="width:500px;float:left;" placeholder="请输入解析淘宝地址" value="<?php echo ($data["url"]); ?>"><div style="float:left;margin-left:10px;"><a id="send" class="btn btn-success" onclick="sendJson();">解 析</a></div></td>
                </tr>
                <tr>
                  <td>商品名称:</td>
                  <td><input id="name" name="name" type="text" class="form-control" style="width:500px;" placeholder="请输入商品名称" value="<?php echo ($data["name"]); ?>"></td>
                </tr>
                <tr>
                  <td>商品分类:</td>
                  <td>
                    <select class="form-control" style="width:150px;" name="classify_id">
                        <?php if(is_array($classification)): foreach($classification as $key=>$classification): ?><option value="<?php echo ($classification["id"]); ?>"><?php echo ($classification["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>原价钱：</td>
                  <td><input id="price_original" name="price_original" type="text" class="form-control" style="width:120px;" placeholder="请输入原价钱" value="<?php echo ($data["price_original"]); ?>"></td>
                </tr>
                <tr>
                  <td>折后价：</td>
                  <td><input id='price_now' name="price_now" type="text" class="form-control" style="width:120px;" placeholder="请输入折后价" value="<?php echo ($data["price_now"]); ?>"></td>
                </tr>
                <tr>
                  <td>返利：</td>
                  <td><input id='rebate' name="rebate" type="text" class="form-control" style="width:100px;" placeholder="请输入返利" value="<?php echo ($data["rebate"]); ?>"></td>
                </tr>
                <tr>
                  <td>当前图片:</td>
                  <td><a href="#" onclick="callmyModal_1('<?php echo ($data["cover"]); ?>');"><img src="<?php echo ($data["cover"]); ?>" class="img-thumbnail" style="height:200px;width:200px;float:left;"/></a></td>
                </tr>
                <tr>
                    <td>选择封面图片:</td>
                    <td id="imput"><p id="altput" >解析后才可预览</p></td>
                </tr>
              </tbody>
            </table>
            <input id="img" name="img" value="<?php echo ($data["cover"]); ?>" type="hidden" >
            <input name="id" value="<?php echo ($data["id"]); ?>" type="hidden" >
            <div style="float:right;"><button type="submit" class="btn btn-primary">提 交</button></div>
        </div>
    </div>
    </form>
    <!-- 说明 -->
    <div class="row">
        <div class="col-md-12">
            <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
                <h4>说明</h4>
                <p>价钱单位:元，填写时不需要带单位。</p>
                <p>返利单位:%，填写时不需要带单位。</p>
                <p>添加时必须要上传图片，而且各项都需要填好。</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>