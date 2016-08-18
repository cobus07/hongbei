<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我爱烘焙-用户登录</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body id="bg">
    <div id=pg>   
    </div>
	<div id="text">
	   <span id="notice"></span>
	   <form method="POST">
	       <input type="text" id="a" name="firstname"
    			value="手机号/会员名称/邮箱" 
    			onfocus="if (value =='手机号/会员名称/邮箱'){value =''}" 
    			onblur="if (value ==''){value='手机号/会员名称/邮箱';this.style.color='#ccc'}"  >
    			<br />
    			<br />
           <input type="text" id="b" name="lastname" />
    	   <a href="user/change_pwd1" class="forget">忘记密码？</a>
           <a href="user/zhuce_message" class="free_zhuce">免费注册</a>
    </div>
                <div type="button" id="c" value="">
                    <span class="login">登&nbsp;&nbsp;录</span>
                </div>
       </form>
            <hr style="width:70px;position: absolute;left: 40%;top:380px">
            <p id="bottom">其他方式登录</p>
            <hr style="width:70px; position: absolute;left: 54%;top:380px">
            <script src="assets/js/require.js" data-main="assets/js/login"></script>
</body>
</html>