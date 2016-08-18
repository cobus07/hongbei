<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>好友列表</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css" href="assets/css/service_center.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
</head>
<body>
<?php include"header.php";?>
<div id="content">
    <div class="wrap">
        <input type="text" class="search" placeholder="请简单完整的输入您的问题...">
        <button class="searchBtn"></button>

        <div class="wordsLeft">
            <h2>智能和自助服务<span>推荐度</span><img src="assets/img/stars.png"></h2>

            <p>为您接待经常遇到的咨询性问题，找回账户<br/>
                密码等自助服务，无需等待，您的服务首选。</p>

            <h3>商家智能服务</h3>

            <p>您在遇到问题时，随时都可以向他提问，即<br/>
                问即答，7*24小时在线，全年无休。</p>
        </div>
        <div class="wordsRight">
            <h2>电话客服<span>推荐度</span><img src="assets/img/stars.png"></h2>

            <p>您需要耐心等待一段时间，且会产生通讯资费。询<br/>
                问类问题，建议您先使用智能机器人和在线云客服。</p>

            <h3>客服热线</h3>

            <p>400-123-5151515</p>
        </div>
    </div>
</div>
</body>
</html>