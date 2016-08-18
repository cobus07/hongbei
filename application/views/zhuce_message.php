<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>普通用户注册</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/common_zhuce.css">
	<link rel="stylesheet" href="assets/css/zhuce_message.css">
</head>
    <body id="bg">
        <p class="top">用户注册</p>
        <div id="bgpic">
        </div>
        <div id="pg">  
            <ul class="step">
                <li><p id="setname">1 用户名绑定</p></li>
    			<li><p id="message">2 填写帐号信息</p></li>
    			<li><p id="success">3 √ 注册成功</p></li>
            </ul>
	        <div id="text">
                <form method="post">
                    <p class="font">昵&nbsp;&nbsp;称</p><input type="text" id="a" name="firstname"
                    value="请输入昵称"  onfocus="if (value =='请输入昵称'){value =''}" onblur="if (value ==''){value='请输入昵称';this.style.color='#ccc'}"  
                    onkeydown="if(value!='请输入昵称') this.style.color='#000'"   >
                    <span id='name_tip'></span>
                    <br />
                    <br />
                    <p class="font">密&nbsp;&nbsp;码</p><input type="text" id="b" name="psd1" />
                    <span id='psd1_tip'></span>  
                    <br />
                    <br />
                    <p class="font">确认密码</p><input type="password" id="bb" name="psd2" />
                    <span id="pwd_tip"></span>
        	</div>
	        <div style="width:190px;height:38px;margin:270px auto;left: 50%;margin-left: -95px; pink;" id="c">
	           <span class="next">下一步</span>
            </div>     
                </form>
        </div>   
        <script src="assets/js/require.js" data-main="assets/js/register_message"></script> 
</body>
</html>