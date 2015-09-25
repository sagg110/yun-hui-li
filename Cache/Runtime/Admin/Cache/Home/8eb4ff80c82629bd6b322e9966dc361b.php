<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>访问者信息</title>
    <link rel="icon" href="/taobaoke/Public/Uploads/img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="/taobaoke/Public/Admin/Css/bootstrap.min.css" rel="stylesheet">
    <script src="/taobaoke/Public/Admin/Js/jquery.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/bootstrap.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/docs.min.js"></script>
    <script src="/taobaoke/Public/Admin/Js/ie10-viewport-bug-workaround.js"></script>

    <!-- Font-awesome core CSS -->
    <link href="/taobaoke/Public/Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/taobaoke/Public/Admin/Css//Homepage.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function() 
        {  
            window.top.window.iFrameHeight();
            window.top.window.callApplicationCount();
        });
    </script>
    
</head>
<body>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">
                访问者信息
            </h1>
        </div>
    </div>
    <!-- 名单 -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th class="col-md-1"><div align="center">序号</div></th>
                                  <th class="col-md-3"><div align="center">IP地址</div></th>
                                  <th class="col-md-3"><div align="center">地方</div></th>
                                  <th class="col-md-3"><div align="center">单位</div></th>
                                  <th class="col-md-2"><div align="center">访问时间</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($visitor)): foreach($visitor as $key=>$data): ?><tr>
                                        <th scope="row">
                                            <div align="center" style="padding-top:6px;">
                                                <?php echo ($key+1); ?>
                                            </div>
                                        </th>
                                        <td>
                                            <div align="center" style="padding-top:6px;">
                                                <?php echo ($data["ip"]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div align="center" style="padding-top:6px;">
                                                <?php echo ($data["country"]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div align="center" style="padding-top:6px;">
                                                <?php echo ($data["area"]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div align="center" style="padding-top:6px;">
                                                <?php echo ($data["created_time"]); ?>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="float:right;">
                    <nav>
                      <ul class="pagination">
                        <?php echo ($page); ?>
                     </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">联系地址</h4>
      </div>
      <div class="modal-body">
        兰州市安宁区银滩路高新十字
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>

</body>
</html>