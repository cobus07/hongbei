
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户个人资料</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/header.css" />
	<link rel="stylesheet" href="assets/css/backg.css" />
	<link rel="stylesheet" href="assets/css/left_nav.css" />
	<link rel="stylesheet" href="assets/css/show_user.css">
	<script> 
      	function mychange()
 		{
      	document.getElementById("div1").style.background="blue";
 		}
	</script>
    <title>JS实现点击颜色块切换指定区域的背景颜色</title>
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>
	<div class="container">
		<span>个性签名：愿得一学霸，学遍数理化。</span>
		<input value="搜索好友.信息"></input>
		
		<div class="user-left">
		  <?php include "left_nav.php";?>
		</div>
		 <div class="body-right">
				
				<div id="change">
					<img src="assets/img/edit.png" alt=""class="change_pic">
					<p>个人信息</p>
				</div>

				<form action="user/upload_product" enctype="multipart/form-data" method="post">
					
					  
					
					<div class="load">
					  <p>上传头像:&nbsp;</p><span><img src="assets/img/logo111.png"></span>
		            </div>

					<div class="nickname">
						*&nbsp;昵&nbsp;&nbsp;称：&nbsp;<span><?php echo $query[0] -> nickname;?></span>
					</div>

					<div class="Tel">
						*&nbsp;手机号码:&nbsp; <span><?php echo $query[0] -> tel;?></span>
					</div>

					<div class="youxiang">
						&nbsp;电子邮箱：&nbsp;<span><?php if($query[0] -> email){echo $query[0] -> email;}?></span>
					</div>
					
					<div class="sex">			
						*&nbsp;性&nbsp;&nbsp;别：&nbsp;
						<span><?php if($query[0] -> sex){echo $query[0] -> sex;}?></span>
					</div>
					
					<div class="input">
						&nbsp;生&nbsp;&nbsp;日：&nbsp;<span><?php if($query[0] -> birthday){echo $query[0] -> birthday;}?></span>
					</div>

					<div class="gx">
						&nbsp;&nbsp;个性签名：<span class="aa"><?php if($query[0] -> per_sign){echo $query[0] -> per_sign;}?></span><input type="hidden">
					    
					</div>

					<div id="upload">
					  <button class="btn1" style="width:100px; height:35px; background:#00BFFF; font-size:18px; color:white;"type="button">修改签名</button>
					</div>

					<div class="receiv">
						&nbsp;&nbsp;收货地址：<span class="bb"><?php if($query[0] -> rec_addr){echo $query[0] -> rec_addr;}?></span><input type="hidden">
					</div>

					<div id="upload">
					  	<button class="btn2" style="width:100px; height:35px; background:#00BFFF; font-size:18px; color:white;"type="button">修改地址</button>
					</div>
					
					<div id="bg">
						<p>背景图片:<input type="file" name="bg_pic" class=""/></p>
						<span>支持jpg/png格式，RGB模式，单张 (长<8000,宽<2000,大小<10M)</span>
		            </div>    


					<div id="col">
						<p>主题颜色：</p>
						<ul class="xx"> 
							
							<a href="black.html"  id="a1">
							<li ></li>
							</a>
							
							<a href="#" id="a2">
								<li></li>
							</a>
							<a href="#" id="a3">
								<li></li>
							</a>
							<a href="#" id="a4">
								<li></li>
							</a>
							<a href="#" id="a5">
								<li></li>
							</a>
							<a href="#" id="a6">
								<li></li>
							</a>
							<a href="#" id="a7">
								<li></li>
							</a>
							<a href="#" id="a8">
								<li></li>
							</a>
							<a href="#" id="a9">
								<li></li>
							</a>
							<a href="#" id="a10">
								<li></li>
							</a>
							<a href="#" id="a11">
								<li></li>
							</a>
							<a href="#" id="a12">
								<li></li>
							</a>
							<a href="#" id="a13">
								<li></li>
							</a>
							<a href="#" id="a14">
								<li></li>
							</a>
						 </ul> 
					</div>

					<div class="button" >
						<button style="width:100%; height:100%; background:#9370D8;border-radius:5px; font-size:18px; color:white;margin-top: 20px;" type="submit"><a href="seller/edit_user">修改</a></button>
							
					</div>
                  

				</form>
			</div>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/show_user"></script>

</body>
</html>
