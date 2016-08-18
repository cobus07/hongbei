<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>好友列表</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/backg.css">
    <link rel="stylesheet" type="text/css" href="assets/css/left_nav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/friend_list.css">
</head>
<body>
<?php include"header.php";?>
<?php include"backg.php";?>
<div class="container clearfix">
    <div class="leftn">
       <?php include"left_nav.php";?>
    </div>
    <div class="content">
        <span class="friend_num"><b>好友列表</b></span>
        <hr style="margin-top: 56px"/>
        <ul class="cont_head">
            <li class="selected">我关注的</li>
            <li>关注我的</li>
            <input type="text" class="search" value="请输入昵称">
            <button class="btn"></button>
        </ul>
        <div class="my all_con">
        </div>
        <div class="other all_con hide">

        </div>
            <button class="load-btn">加载更多</button>
    </div>
</div>
<script id="myFollow" type="text/template">
    <div class="cont">
        <ul>
            <li class="left"><img src="uploads/user/20151229/fruser_pic.jpg"></li>
            <li class="mid">
                <ul class="msn">
                    <li><a href="#" style="color: black"><b><%=username%></b></a><span class="grade"><img src="assets/img/grade_bac.jpg"></span><span class="gender"><img src="assets/img/gender_bac.jpg"></span></li>
                    <li>电话&nbsp:&nbsp<%=tel%></li>
                    <li>地址&nbsp:&nbsp<%=address%></li>
                    <li>个性签名&nbsp:&nbsp<%=per_sign%></li>
                </ul>
            </li>
            <li class="right">
                <button class="del" data-id="<%=user_id%>">取消关注</button><button class="more">更多</button>
                <div class="click">
                    <ul>
                        <li>私<span class="space"></span>信</li>
                        <li>举<span class="space"></span>报</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</script>
<script id="orFollow" type="text/template">
    <div class="cont">
        <ul>
            <li class="left"><img src="uploads/user/20151229/fruser_pic.jpg"></li>
            <li class="mid">
                <ul class="msn">
                    <li><a href="#" style="color: black"><b><%=username%></b></a><span class="grade"><img src="assets/img/grade_bac.jpg"></span><span class="gender"><img src="assets/img/gender_bac.jpg"></span></li>
                    <li>电话&nbsp:&nbsp<%=tel%></li>
                    <li>地址&nbsp:&nbsp<%=address%></li>
                    <li>个性签名&nbsp:&nbsp<%=per_sign%></li>
                </ul>
            </li>
            <li class="right">
                <%if(){%>
                <button class="add" data-id="<%=user_id%>">+关注</button><button class="more">更多</button>
                <div class="click">
                    <ul>
                        <li>私<span class="space"></span>信</li>
                        <li>举<span class="space"></span>报</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</script>
<script src="assets/js/require.js" data-main="assets/js/friend_list"></script>
</body>
</html>


