<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
  <base target="iframe"/>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/taobaoke/Uploads/logo.png">

    <title>淘宝客后台</title>

    <!-- Bootstrap core CSS -->
    <link href="/taobaoke/Public/Admin/Css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/taobaoke/Public/Admin/Css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/taobaoke/Public/Admin/Js/jquery.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/bootstrap.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/taobaoke/Public/Admin/Js/ie10-viewport-bug-workaround.js"></script>

    
    <script type="text/javascript" language="javascript">
    $(document).ready(function() 
    {  
      $("li").click(function(){
          $('.nav-sidebar').children('li').attr('class','#');
          $('.navbar-nav').children('li').attr('class','#');
          $(this).attr('class','active');
      });
      callApplicationCount();
    });

    function callApplicationCount(){
      $.getJSON("<?php echo U('Index/getApplicationCount');?>", function (data, status, xhr) {
          if(data != "0")
          {
            var text = "<div class='rt'>" + data + "</div>";
            $("#callApplicationCount").html(text);
          }else{
            $("#callApplicationCount").html("");
          }
      });
    }

    function iFrameHeight() {
      var ifm= document.getElementById("iframe");
      var subWeb = document.frames ? document.frames["iframe"].document :ifm.contentDocument;
      if(ifm != null && subWeb != null) {
        ifm.height = subWeb.body.scrollHeight;
      }
    }

    function myModal(){
      $("#myModal").modal('toggle');
    }

    function myModalImage(src){
      $("#mymodali").attr("src",src);
      $("#myModalImage").modal('toggle');
    }

    function myModalText(text){
      $("#myModalt").html(text);
      $("#myModalText").modal('toggle');
    }

    </script> 

    <style type="text/css">
    .rt{
      height: 22px;
      background-color:#C03111;
      color: #FFF;
      padding-right: 5px;
      padding-left: 5px;
      border: 1px dashed #C03111;
      border-radius: 3px;
    }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Homepage/index');?>" style="color:#FFF">淘宝客后台</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo U('Index/changePassword');?>" style="color:#FFF">用户名：Superadmin</a></li>
            <li><a href="<?php echo U('Index/help');?>">技术支持</a></li>
            <li><a href="<?php echo U('Login/loginout');?>" target="_self">退出登陆</a></li>
          </ul>
<!--           <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo U('Webinfo/index');?>" style="font-size:14px;">网站基础信息</a></li>
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="<?php echo U('Homepage/index');?>" style="font-size:14px;">首页模块</a></li>
            <li ><a href="<?php echo U('Mancloth/index');?>" style="font-size:14px;">男士服装模块</a></li>
            <li><a href="<?php echo U('Womancloth/index');?>" style="font-size:14px;">女士服装模块</a></li>
            <li><a href="<?php echo U('Shoe/index');?>" style="font-size:14px;">鞋类模块</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo U('Visitor/index');?>" style="font-size:14px;">访问者信息</a></li>
            <li ><a href="<?php echo U('Index/changePassword');?>" style="font-size:14px;">修改登录密码</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <iframe id="iframe" name="iframe" src="<?php echo U('Webinfo/index');?>" frameBorder=0 scrolling=no width="100%" onLoad="iFrameHeight()"></iframe>
        </div>
      </div>
    </div>

<!-- Modal_Image -->
<div class="modal fade" id="myModalImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">图片预览</h4>
      </div>
      <div class="modal-body">
        <img id="mymodali" src="" class="img-rounded" style="width:570px;">
      </div>
    </div>
  </div>
</div>

<!-- Modal_Text -->
<div class="modal fade" id="myModalText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p id="myModalt" ></p>
      </div>
    </div>
  </div>
</div>

  </body>
</html>