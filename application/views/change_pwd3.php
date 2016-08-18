<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <base href="<?php echo site_url();?>"/>
    <link rel="stylesheet" href="assets/css/common_zhuce.css">
    <link rel="stylesheet" href="assets/css/change_pwd3.css">
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
        <p class="success">修改成功!</p>
        <div id="button">
            <a href="user/login"><input type="submit" id="ok" value="完成  >"></a>
        </div>
    </body>
</html>