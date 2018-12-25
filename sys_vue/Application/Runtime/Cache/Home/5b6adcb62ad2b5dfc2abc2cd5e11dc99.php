<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台登录</title>

	<link href="/sys_vue/Public/css/login.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="/sys_vue/Public/plugins/sweetalert/sweetalert.css">
</head>
<script>
	const MODULE_URL = '/sys_vue/index.php/Home';
</script>

<body>
<canvas id="c_n1"></canvas>
<div class="login_box">
	<!--<div class="login_l_img"><img src="/sys_vue/Public/images/login-img.png" /></div>-->
	<div class="login">
		<div class="login_logo"><a href="#"><img src="/sys_vue/Public/images/login_logo.png" /></a></div>
		<div class="login_name">
			<p>后台管理系统</p>
		</div>
		<input name="username" type="text"  placeholder="用户名" id="uid">
		<input name="password" type="password" placeholder="密码" id="pwd"/>
		<input value="登录" style="width:100%;" type="button" id="btn_login">
	</div>

	<div class="tip">
		小贴士：<span id="tip_content"></span>
	</div>
</div>


</body>
<script src="/sys_vue/Public/plugins/jquery-1.11.0.min.js"></script>
<script src="/sys_vue/Public/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/sys_vue/Public/js/canvas-nest.js"></script>
<script src="/sys_vue/Public/js/util.js"></script>
<script src="/sys_vue/Public/js/config.js"></script>
<script src="/sys_vue/Public/js/login.js"></script>
</html>