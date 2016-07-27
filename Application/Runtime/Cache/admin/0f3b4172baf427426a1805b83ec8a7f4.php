<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/data1/Public/res/Admin/img/logo.png"/>
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="/data1/Public/res/Admin/css/bootstrap.css">
    <link rel="stylesheet" href="/data1/Public/res/Admin/css/mmss.css"/>
    <link rel="stylesheet" href="/data1/Public/res/Admin/css/font-awesome.min.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
	<script src="/data1/Public/res/Admin/js/jquery-1.11.3.js"></script>
	<script src="/data1/Public/res/Admin/js/bootstrap.js"></script>
    <script src="/data1/Public/res/Admin/js/Chart.js"></script>
    
    <!-- User custom -->
    
<style>
	.box {
	    background-repeat: no-repeat;
	    background-size: 100%;
	    margin: 0 auto;
	    position: relative;
	    width: 100%;
	    height: 100%;
		margin-left: 15px;
	}
	.item-label{
		color: #FFB;
	}
</style>

    
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
        	<!-- 
            <li class="bg-warning ">
                <a href="#"><span class="glyphicon glyphicon-tasks"></span><span class="badge">1</span></a>
            </li>
            <li class="bg-success">
                <a href="#"><span class="glyphicon glyphicon-envelope"></span><span class="badge">2</span></a>
            </li>
            <li class="bg-danger">
                <a href="#"><span class="glyphicon glyphicon-bell"></span></a>
            </li>
        	 -->
            <li class="bg-info dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<span>系统管理员</span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
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
            <div class="col-xs-2 bg-blue">
                <br/>
                <div class="panel-group sidebar-menu" id="accordion" aria-multiselectable="true">
                    <div class="panel panel-default menu-first menu-first-active">
                        <a data-toggle="collapse" data-parent="#accordion" href="index.html" aria-expanded="true"
                           aria-controls="collapseOne">
                            <i class="icon-home icon-large"></i> 主页
                        </a>
                    </div>
                    <div class="panel panel-default menu-first">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                           aria-controls="collapseOne">
                            <i class="icon-user-md icon-large"></i> 系统管理</a>
                        </a>

                        <div id="collapseOne" class="panel-collapse collapse " >
                            <ul class="nav nav-list menu-second">
                                <li><a href="p1.html"><i class="icon-user"></i> 表格p1</a></li>
                                <li><a href="/data1/admin.php?s=/Public/p2"><i class="icon-edit"></i> 图表p2</a></li>
                                <li><a href="p3.html"><i class="icon-trash"></i> p3</a></li>
                                <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default menu-first">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                           aria-expanded="false" aria-controls="collapseTwo">
                            <i class="icon-book icon-large"></i> 用户管理</a>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <ul class="nav nav-list menu-second">
                                <li><a href="#"><i class="icon-user"></i> 子选项1</a></li>
                                <li><a href="#"><i class="icon-edit"></i> 子选项2</a></li>
                                <li><a href="#"><i class="icon-trash"></i> 子选项3</a></li>
                                <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default menu-first">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                           aria-expanded="false" aria-controls="collapseThree">
                            <i class="icon-book icon-large"></i> 其他管理</a>
                        </a>

                        <div id="collapseThree" class="panel-collapse collapse">
                            <ul class="nav nav-list menu-second">
                                <li><a href="#"><i class="icon-user"></i> 子选项1</a></li>
                                <li><a href="#"><i class="icon-edit"></i> 子选项2</a></li>
                                <li><a href="#"><i class="icon-trash"></i> 子选项3</a></li>
                                <li><a href="#"><i class="icon-list"></i> 子选项4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--左侧导航结束-->
            <!----------------------------------------------------------------------------------------------------->
            <!--右侧内容开始-->
            <div class="col-xs-10">
			    <br/>
			    <ol class="breadcrumb">
			        <li><a href="index.html"><span class="glyphicon glyphicon-home"></span>&nbsp;后台首页</a></li>
			        <li class="active">系统管理 - 图表</li>
			    </ol>
			    
<div class="box">
<form action="<?php echo U('Public/update');?>" method="post" class="form">
	<div class="form-item">
		<label class="item-label">原密码：</label>
		<div class="controls">
			<input type="password" name="old" class="text " autocomplete="off" />
		</div>
	</div>
	<div class="form-item">
		<label class="item-label">新密码：</label>
		<div class="controls">
			<input type="password" name="password" class="text " autocomplete="off" />
		</div>
	</div>
	<div class="form-item">
		<label class="item-label">确认密码：</label>
		<div class="controls">
			<input type="password" name="repassword" class="text " autocomplete="off" />
		</div>
	</div>
	<div class="form-item">
		<button type="submit" class="btn" style="margin-top: 8px;">确 认</button>
	</div>
</form>
</div>

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
        s.src = "/data1/Public/res/Admin/js/bootlint.js";
        document.body.appendChild(s)
    })();

    $(function () {
        $('dt').click(function () {
            $(this).parent().find('dd').show().end().siblings().find('dd').hide();
        });
    });
</script>
</body>
</html>