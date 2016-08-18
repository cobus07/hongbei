<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛋糕师个人信息</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/show_baker.css"/>
	<link rel="stylesheet" href="assets/css/header.css"/>
	<link rel="stylesheet" href="assets/css/backg.css"/>
	<link rel="stylesheet" href="assets/css/left_nav.css"/>
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
		<div class="leftn"><?php include "left_nav.php";?></div>
		<div class="body-right">
			<div id="change">
				<div class="ii"></div>	
				<p>修改个人信息</p>
				<span>(*号必填项)</span>
			</div>
			<form action="user/upload_product" enctype="multipart/form-data" method="post" >
			<div class="load">
			  <p>上传头像:&nbsp;
                
                
            </div>
			<div class="nickname">
			*&nbsp;昵&nbsp;&nbsp;称：&nbsp;<span><?php echo $query[0] -> nickname;?> </span>
			</div>
			<div class="tel">
			*&nbsp;手机号码：&nbsp;<span><?php echo $query[0] -> tel;?></span>
			</div>
			<div class="youxiang">
			电子邮箱：&nbsp;<span><?php if($query[0] -> email){echo $query[0] -> email;}?></span> 
			</div>
			<div class="sex">			
				*&nbsp;性&nbsp;&nbsp;别:&nbsp;
				<span><?php if($query[0] -> sex){echo $query[0] -> sex;}?></span> 
				<!-- <input type="radio" name="x" value="男" <?php echo $query[0]->sex=='男'?'checked':'' ;?>/> 男&nbsp;&nbsp;&nbsp;
				<input type="radio" name="x" value="女" <?php echo $query[0]->sex=='女'?'checked':'' ;?>/> 女
			 -->
			</div>
			<div class="input">
			生&nbsp;&nbsp;日：&nbsp;<span><?php if($query[0] -> birthday){echo $query[0] -> birthday;}?></span>
			</div>
			
			<div class="sign">
				<span>个性签名：</span>
				<span class="aa" style="width: 340px; margin-left: 20px;"><?php if($query[0] -> per_sign){echo $query[0] -> per_sign;}?></span><input type="hidden"> 
				
				<div class="button1">
			  		<button class="btn1" style="width:75px; height:30px; background:#a5efde; color:white; font-size:15px;" type="button">上传签名</button>	
				</div>
			</div>
			
			<div class="addr">
				<span>收货地址：</span>
				<span class="bb" style="width: 335px; margin-left: 20px;"><?php if($query[0] -> rec_addr){echo $query[0] -> rec_addr;}?></span><input type="hidden"> 
				<div class="button2">
			  		<button class="btn2" style="width:75px; height:30px; background:#a5efde; color:white; font-size:15px;" type="button">上传地址</button>	
				</div>
			</div>
			<!-- <div class="profession">
			职&nbsp;&nbsp;业：&nbsp;<input type="text" class="ss" name="city" value="<?php if($query[0] -> city){echo $query[0] -> city;}?>">
			</div> -->
			
			<div id="bg">
				<p>背景图片:&nbsp;<input type="file" name="product_picture" class=""/>

					<p style="color: gray; margin-left: 20px">
                    <!-- 支持jpg/png格式，RGB模式，单张 (长<8000,宽<2000,大小<10M) -->
                	</p>
               </p>
            </div>    
			<!-- 更换背景图片:<ul class="send"><button style="width:110px;height:55px;background:#33ffff;font-size:18px;color:white;">上传图片</button></ul>
			<p>支持jpg/png格式，RGB模式，单张（长<8000,宽<2000，大小<M10>）</p>
			</div> -->
			<div id="col">
				<p>主题颜色：</p>
				<ul id="color">
					<a href="#"  id="a1">
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
			<div class="is_city">			
				支持同城:&nbsp;
				<!-- <span><?php echo $query[0]->is_city=='1'?'是':'';?></span>&nbsp;&nbsp;&nbsp;
				<span><?php echo $query[0]->is_city=='0'?'否':'';?></span> -->
			<span><?php if($query[0]->is_city=='1'){echo '是';}else{echo '否';} ?> </span>
			</div>
			<div id="pro">
				<p>资格认证:&nbsp;<input type="file" name="product_picture" class=""/>

					<p style="color: gray; margin-left: 20px">
                    <!-- 支持jpg/png格式，RGB模式，单张 (长<8000,宽<2000,大小<10M) -->
                	</p>
               </p>
            </div>  
			<div class="button">
				<button style="width:200px; height:35px; background:#a594c6; font-size:18px; color:white;" type="submit"> <a href="user/edit_baker">修改</a></button>
			</div>
			</form>
		</div>
		
	</div>
	<div class="footer">
		
	</div>
	<script src="assets/js/require.js" data-main="assets/js/show_baker"></script>
</body>
</html>