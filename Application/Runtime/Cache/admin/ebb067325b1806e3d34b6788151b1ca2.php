<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/data/Public/res/Admin/img/logo.png"/>
    <title><?php echo ($meta_title); ?>-TMDGAME</title>
    <link rel="stylesheet" href="/data/Public/res/Admin/css/bootstrap.css">
    <link rel="stylesheet" href="/data/Public/res/Admin/css/mmss.css"/>
    <link rel="stylesheet" href="/data/Public/res/Admin/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/data/Public/res/Admin/js/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
	<script src="/data/Public/res/Admin/js/jquery-1.11.3.js"></script>
	
	<!-- bootstrap js start -->
	<script src="/data/Public/res/Admin/js/bootstrap.js"></script>
	<script src="/data/Public/res/Admin/js/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- bootstrap js end -->
	
	<!-- charts start -->
	<script src="/data/Public/res/Admin/js/highchart/highcharts.js"></script>
	<script src="/data/Public/res/Admin/js/highchart/modules/exporting.js"></script>
	<script src="/data/Public/res/Admin/js/hchart.js"></script>
	<!-- charts end -->
	
	<!-- basic js start -->
    <script src="/data/Public/res/Admin/js/base.js"></script>
    <!-- basic js end -->
    
    <!-- User custom start -->
    
    
    <!-- User custom end -->
</head>
<!-- /Head -->
<body>
<header>
    <div class="container-fluid navbar-fixed-top bg-primary">
        <ul class="nav navbar-nav  left">
            <li class="text-white h4">
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;<b><?php echo ($sys_title); ?></b>
            </li>
        </ul>
        <ul class="nav navbar-nav nav-pills right ">
            <li class="bg-info dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<span>系统管理员</span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="text-center"><a href="<?php echo U('Game/add');?>"><span class="text-primary">添加游戏</span></a></li>
                    <li class="divider"><a href="#"></a></li>
                    <li class="text-center"><a href="<?php echo U('Public/update');?>"><span class="text-primary">修改密码</span></a></li>
                    <li class="divider"><a href="#"></a></li>
                    <li class="text-center"><a href="<?php echo U('Public/logout');?>"><span class="text-primary">退出</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<section>
    <div class="container-fluid">
        <div class="row ">
            <!--左侧导航开始-->
            <?php if($is_index != true): ?><div class="col-xs-2 bg-blue">
                <br/>
                <div class="panel-group sidebar-menu" id="accordion" aria-multiselectable="true">
                    <div class="panel panel-default menu-first">
                        <a data-parent="#accordion" href="<?php echo U('Index/index');?>">
                            <i class="icon-home icon-large"></i> 主页
                        </a>
                    </div>
                    <div class="panel panel-default menu-first">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                           aria-controls="collapseOne">
                            <i class="icon-user-md icon-large"></i> 玩家分析</a>
                        </a>

                        <div id="collapseOne" class="panel-collapse collapse" >
                            <ul class="nav nav-list menu-second">
                                <li><a href="<?php echo U('User/newer');?>" data-url="User/newer"><i class="icon-user"></i> 新增玩家</a></li>
                                <li><a href="<?php echo U('User/logincount');?>" data-url="User/logincount"><i class="icon-time"></i> 在线人次</a></li>
                                <li><a href="<?php echo U('User/ontime');?>" data-url="User/ontime"><i class="icon-time"></i> 在线时长</a></li>
                                <li><a href="<?php echo U('User/recharge');?>" data-url="User/recharge"><i class="icon-plus"></i> 充值记录</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default menu-first">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                           aria-expanded="false" aria-controls="collapseTwo">
                            <i class="icon-list icon-large"></i> 设备分析</a>
                        </a>

                        <div id="collapseTwo" class="panel-collapse collapse">
                            <ul class="nav nav-list menu-second">
                                <li><a href="<?php echo U('Device/hardware');?>" data-url="Device/hardware"><i class="icon-user"></i> 硬件信息</a></li>
                                <li><a href="<?php echo U('Device/apps');?>" data-url="Device/apps"><i class="icon-mobile-phone"></i> 应用信息</a></li>
                                <li><a href="<?php echo U('Device/os');?>" data-url="Device/os"><i class="icon-info-sign"></i> 系统信息</a></li>
                                <li><a href="<?php echo U('Device/net');?>" data-url="Device/net"><i class="icon-rss"></i> 网络信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><?php endif; ?>
            <!--左侧导航结束-->
            <!----------------------------------------------------------------------------------------------------->
            <!--右侧内容开始-->
            <div class="<?php if($is_index): ?>col-xs-12<?php else: ?>col-xs-10<?php endif; ?>">
			    <br/>
			    <ol class="breadcrumb">
			        <li><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span>&nbsp;后台首页</a></li>
			        <li class="active">系统管理 - <?php echo ($meta_title); ?></li>
			    </ol>
			    
	<!--右侧内容开始-->
	<div class="chart">
	    <div class="canvas" >
	        <h3 class="text-primary">网络信息</h3>
	        <div id="container" style="min-width: 700px; height: 400px; margin: 0 auto"></div>
	    </div>
	</div>
	<!--右侧内容结束-->
<script>

var chart;
$(function(){
	getData();
});

/**
 * 获取数据
 */
function getData(){
	var url = '/data/admin.php?s=/Device/net.html';
	$.post(url, function(json){
		if (json.status){
			var options = {
				series: [{
			        name: '占比',
			        colorByPoint: true,
			        data: json.data
			    }]
			};
			chart = initCharts('container', options, 'pie');
		}
	},'json');
}
</script>


			</div>
            <!--右侧内容结束-->
        </div>
    </div>
</section>
<footer class="bg-primary navbar-fixed-bottom">
    <p class="text-center text-white">版权所有&copy;TMDGAME</p>
</footer>
<script>
    /*Bootlint工具用于对页面中的HTML标签以及Bootstrapclass的使用进行检测*/
    (function () {
        var s = document.createElement("script");
        s.onload = function () {
            bootlint.showLintReportForCurrentDocument([]);
        };
        s.src = "/data/Public/res/Admin/js/bootlint.js";
        document.body.appendChild(s);
        
        // 左侧栏设置
        var url = '<?php echo ($url); ?>';
        //var url = '/data/admin.php?s=/Device/net.html';
        init_bar(url);
    })();
</script>
</body>
</html>