<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <base href="<?php echo site_url();?>"/>
    <link rel="stylesheet" href="assets/css/common_zhuce.css">
    <link rel="stylesheet" href="assets/css/change_pwd2.css">
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
                    <p class="font">&nbsp;新密码:</p><input type="text" id="b" name="psd1" />
                    <span id='psd1_tip'></span>  
                    <br />
                    <br />
                    <p class="font">确认密码:</p><input type="password" id="bb" name="psd2" />
                    <span id="pwd_tip"></span>
            </div>
            <div style="width:140px;height:40px;background-color: pink;" id="c">
               <span class="next">下一步</span>
            </div>     
                </form>
            
        </div>   
        <script src="assets/js/require.js" data-main="assets/js/change_pwd"></script> 
</body>
</html>