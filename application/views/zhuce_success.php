<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>普通用户注册</title>
    <base href="<?php echo site_url();?>"/>
    <link rel="stylesheet" href="assets/css/common_zhuce.css">
    <link rel="stylesheet" href="assets/css/zhuce_success.css">
</head>
<body id="bg">
    <p class="top">用户注册</p>
    <div id="bgpic">
    </div>
    <div id="pg">
        <ul class="step">
            <li><p id="setname">1 用户名绑定</p></li>
            <li><p id="message">2 填写帐号信息</p></li>
            <li><p id="success">√ 注册成功</p></li>
        </ul>
    	<p class="success">注册成功!</p>
    	<div id="button">
             <input type="submit" id="zhuce_baker"  value="一键注册烘焙师">
        </div> 
        <a href="user/login"><input type="submit" id="ok" value="完成  >"></a>
    </div>
    <div id="footerbg">
    </div>
    <div id="contentid">
        <p class="baker">蛋糕师用户注册</p>
        <div id="conbaker">
            <form action="user/do_bakercheck" method="post"><span class="name">*姓名</span>
                <input type="text" id="a" name="realname"/><span class="notice">* 号为必填项</span>    
                <p class="sex">*性别</p><input type="radio" id="male" name="sex" value="male" /><p class="man">男</p>
                <input type="radio" name="sex" value="female" /><p class="women">女</p>
                <p class="id_num">* 身份证号码</p><input type="text" id="b" name="num" />
                <p class="id_check">*个人身份认证</p>
                <div data-role="fieldcontain" class="upload-box">
                    <label for="id_photos"><span class="red">* </span>手持身份证正面照:</label>
                    <input type="file" id="id_photos" name="id_photos" value="上传"/>   
                    <p style="margin-top:0.5em;color:#999;font-size:11pt;">说明：请上传手持证件的半身照，请确保照片内证件信息清晰可读。</p>
                </div>
                <div class="id_photoss" >
                </div>   
                <div data-role="fieldcontain" class="upload-box">
                    <label for="id_photos"><span class="red">*带有国徽身份证反面照: </span></label>
                    <input type="file" id="id_photos" name="id_photos" value="上传"/>   
                    <p style="margin-top:0.5em;color:#999;font-size:11pt;">说明：请上传手持证件的半身照，请确保照片内证件信息清晰可读。</p>
                </div>
                <div class="id_photoss" >
                </div>  
                <p class="health_check">*个人健康证</p> 
                <div data-role="fieldcontain" class="upload-box">
                    <label for="id_photos"><span class="red">* </span>健康证正面照:</label>
                    <input type="file" id="id_photos" name="id_photos" value="上传"/>   
                    <p style="margin-top:0.5em;color:#999;font-size:11pt;">说明：请上传手持证件的半身照，请确保照片内证件信息清晰可读。</p>
                </div>
                <div class="id_photoss" >
                </div>     
                <p class="zige_check">*个人资格认证</p> 
                <span class="id_name">*证件名称:</span><input type="text" id="pic_name" name="firstname"/>  
                <div data-role="fieldcontain" class="upload-box">
                    <label for="id_photos"><span class="red">* </span>证件正面照:</label>
                    <input type="file" id="id_photos" name="id_photos" value="上传"/>   
                    <p style="margin-top:0.5em;color:#999;font-size:11pt;">说明：请上传手持证件的半身照，请确保照片内证件信息清晰可读。</p>
                </div>
                <div class="id_photoss" >
                </div>  
                <a href=""><input type="submit" id="send" value="提交申请  >"></a>     
            </form>
        </div>
    </div>
    <script src="assets/js/require.js" data-main="assets/js/register"></script>
    <script src="assets/js/jquery.js" data-main="assets/js/upload"></script>
    <script src="assets/js/upload.js"></script>
    <script src="assets/js/ajaxfileupload.js"></script>
</body>
</html>