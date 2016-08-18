<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/css/person.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/backg.css">
    <link rel="stylesheet" href="assets/css/left_nav.css">
</head>
<body>
<?php include "header.php";?>
<?php include "backg.php";?>

<!--<div id="content" class="container">-->
   <div class="container_content">
        <div id="per_sign">
            个性签名:愿得一学霸,叫我数理化.
        </div>
        <div id="amend">
            <input type="text" value="搜索好友.消息...." id="key"  class="text"  style="color: rgb(153, 153, 153);"onfocus="this.value='';" onblur="if(this.value==''){this.value='搜索好友.消息....'}">
            <div class="search"></div>
        </div>
       <div style="position:absolute; margin-top: 90px;">
           <?php include "left_nav.php";?>
       </div>

            <div  class="heart" style="float: right;">
                <input type="text" class="publish_content" value="|说点你的烘焙心情吧..." style="color:rgb(149, 129, 182) ;
                        " onfocus="this.value='';" onblur="if(this.value==''){this.value='|说点你的烘焙心情吧...'}">
                <div class="publish_left">
                    <li class="publish_left_first"></li>
                    <li class="publish_left_second"></li>
                </div>
                <div class="publish_right">
                    <li></li>
                    <span id="fabu">发布</span>
                </div>
            </div>
            <div  class="advert">
                <div></div><span>×</span>
            </div>

            <div id="per_fri_mes">
                <div id="per_fri_mes_pho"></div>
                <div id="per_fri_message">
                    <span class="per_fri_message_sp1">小青蛙找妈妈</span>
                    <p>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好</p>
                    <li class="per_fri_message_first"></li>
                    <li class="per_fri_message_first"></li>
                    <li class="per_fri_message_first"></li>
                    <li class="per_fri_message_second"></li>
                    <li class="per_fri_message_second"></li>
                    <li class="per_fri_message_second"></li>
                    <span class="per_fri_message_sp2">2015年5月5日&nbsp;&nbsp;12:30</span>
                </div>
                <ul id="per_fri_mes_ope">
                    <li>收藏</li>
                    <li>转发</li>
                    <li id="speak">评论</li>
                    <li style="border-right:none;" id="dianzan">点赞<span>10</span></li>
                </ul>
                <input type="text" class="input_detial" id="pinlun_content">
                <div class="button_submit" id="pinlun_action">提交</div>


                <div id="more">查看更多》</div>
                <div class="talk_detial" id="response_first">
                    <div class="response_first_photo"><img src="uploads/user/20151229/person_photo.jpg" alt="" ></div>

                    <span class="response_name">起名小能手:</span>
                    <p class="ge_xing">这个笑话好搞笑啊</p>
                    <span class="response_time">11月15日 23:23</span>
                                <span class="response">

                                   <img src="assets/img/small.jpg" alt="" >
                                    <span id="back" style="margin-right:20px;">
                                        回复
                                    </span>
                                </span>
                    <div class="pin_content">
                        <span class="pin_name">我不会起名：</span>
                        <p class="pin">你说的太对了，给的赞</p>
                    </div>
                    <input type="text" class="input_pinglun" id="selected_content"  value="添加回复信息...." style="color: rgb(153, 153, 153);" onfocus="this.value='';" onblur="if(this.value==''){this.value='添加回复信息...'}">
                    <div class="button_pinglun" id="selected_tijiao">提交</div>
                </div>

                <div class="talk_detial" id="response_second">
                    <div class="response_first_photo">
                        <img src="uploads/user/20151229/person_photo.jpg" alt="" ></div>
                    <span class="response_name">起名小能手:</span>
                    <p class="ge_xing">这个笑话好搞笑啊</p>
                    <span class="response_time">11月15日 23:23</span>
                                <span class="response">

                                    <img src="assets/img/small.jpg" alt="" >
                                    <span  style="margin-right:20px;">回复</span>
                                </span>

                    <input type="text" class="input_pinglun" value="添加回复信息...." style="color: rgb(153, 153, 153);" onfocus="this.value='';" onblur="if(this.value==''){this.value='添加回复信息...'}">
                    <div class="button_pinglun">提交</div>
                </div>
            </div>


   </div>
    <div id="footer" class="container">
        <ul id="footer_first_list" class="container_content" style="background:none;">
            <li class="footer_first_li">
                关于
                <ul >
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于隐私</li></a>
                    <a href=""><li>免责申明</li></a>
                    <a href=""><li>网站地图</li></a>
                    <a href=""><li>加入站酷</li></a>
                </ul>
            </li>
            <li class="footer_first_li">
                栏目
                <ul>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于隐私</li></a>
                    <a href=""><li>免责申明</li></a>
                    <a href=""><li>网站地图</li></a>
                    <a href=""><li>加入站酷</li></a>
                </ul>
            </li>
            <li class="footer_first_li">商务
                <ul>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于隐私</li></a>
                    <a href=""><li>免责申明</li></a>
                    <a href=""><li>网站地图</li></a>
                </ul>
            </li>
            <li class="footer_first_li">联系
                <ul>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于隐私</li></a>
                    <a href=""><li>免责申明</li></a>
                </ul>
            </li>
            <li class="footer_first_li">帮助
                <ul>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                </ul>
            </li>
            <li class="footer_first_li" style="margin-right:131px;">友链
                <ul>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于站酷</li></a>
                    <a href=""><li>版权声明</li></a>
                    <a href=""><li>关于站酷</li></a>
                </ul>
            </li>
            <li class="footer_first_li" style="width:236px;">版权信息
                <ul>
                    <li>空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气空气</li>
                </ul>
            </li>
        </ul>
    </div>
</body>
<script src="assets/js/require.js" data-main="assets/js/publish_article"></script>

</html>