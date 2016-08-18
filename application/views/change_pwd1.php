<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <base href="<?php echo site_url();?>"/>
    <link rel="stylesheet" href="assets/css/common_zhuce.css">
    <link rel="stylesheet" href="assets/css/change_pwd1.css">
</head>
    <body id="bg">
        <p class="top">修改密码</p>
        <div id="bgpic">
        </div>
        <div id="pg">  
            <ul class="step">
                <li><p id="setname">1 用户确认</p></li>
                <li><p id="message">2 修改密码</p></li>
                <li><p id="success">√ 修改成功</p></li>
            </ul>
            <div id="text">
                <form method="post">
                    <p class="font">手机号/邮箱:</p><input type="text" id="a" name="firstname"
                    value="请输入昵称"  onfocus="if (value =='请输入手机号/邮箱'){value =''}" onblur="if (value ==''){value='请输入手机号/邮箱';this.style.color='#ccc'}"  
                    onkeydown="if(value!='请输入昵称') this.style.color='#000'"   >
                    <span id='name_tip'></span>
                    <br />
                    <br />
                    <p class="font">密    &nbsp;&nbsp;&nbsp;码:</p><input type="text" id="b" name="psd1" />
                    <span id='psd1_tip'></span>  
            </div>
               <a href="user/change_pwd2"><input type="button" id="c" value="下一步"></a>  
                </form>
        </div>   
</body>
</html>