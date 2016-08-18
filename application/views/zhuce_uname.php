<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>普通用户注册</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/common_zhuce.css">
	<link rel="stylesheet" href="assets/css/c_zhuce_uname.css">
</head>
<body>
	<div id="top">
		<h1>普通用户注册</h1>
	</div>
	<div id="process">
		<ul class="step">
			<li><a href="" id="setname">1 设置用户名</a></li>
			<li><a href="" id="message">2 填写帐号信息</a></li>
			<li><a href="" id="zhifu">3 设置支付方式</a></li>
			<li><a href="" id="success">√ 注册成功</a></li>
		</ul>
	</div>
	<div id="text">
		<form >手机号/邮箱&nbsp;&nbsp;<input type="text" id="a" name="firstname"
			value="请输入手机号/邮箱" onfocus="if (value =='请输入手机号/邮箱'){value =''}" onblur="if (value ==''){value='请输入手机号/邮箱';this.style.color='#ccc'}"  
            onkeydown="if(value!='请输入手机号/邮箱') this.style.color='#000'"   >
		<br />
		<br />
		&nbsp;&nbsp;&nbsp;
		验证&nbsp;&nbsp;<input type="text" id="b" name="lastname" />
	</div>
	<div id="botton">
			<a href="user/c_zhuce_message"><input type="button" id="c" value="下一步"></a>
		</form>
	</div>
</body>
</html>