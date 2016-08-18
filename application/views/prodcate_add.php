<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>宝贝管理-宝贝类别-添加</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/prodcate_add.css">
	<link rel="stylesheet" href="assets/css/header.css"/>
	<link rel="stylesheet" href="assets/css/backs.css"/>
	<link rel="stylesheet" href="assets/css/window.css"/>
	<link rel="stylesheet" href="assets/css/seller_header.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backs.php";?>
	<div class="container">
		<?php include "seller_header.php";?>

		<div class="content">
			<div class="left-nav">
				<div class="line-header"><span>宝贝管理</span</div>
				<div class="line-body">
					<div class="line1"><a href="seller/add"><span>发布宝贝&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;></span></a></div>
					<div class="line"><a href=""><span>出售中的宝贝</span></a></div>
					<div class="line2"><a href=""><span>商品类别</span></a></div>
				</div>
			</div>

			<div id="right">
				<div class="rig-nav">
					<div class="rig-header">
						<span>商品类别</span>
					</div>
					<div class="rig-top">
						<div class="top-title">
							<span>一级类别：</span>
						</div>
						<div class="top-body">
							<ul class="top-ul">
							 	<?php
							 		foreach($cates1 as $cate1){
							 	?>
								<li><a href="seller/prodcate_add?cate1_id=<?php echo $cate1->category_id;?>"><?php echo $cate1->category_name;?></a></li>
								<?php 
									}
								?>
								<div style="clear:both;"></div>
							</ul>	
							<div class="button1">
								<button class="btn1">添加</button>
								<button class="btn2">删除</button>
							</div>
							<div class="ll"><span><span></div>
						</div>
						<div class="bottom-title">
							<span>二级类别：</span>
						</div>
						<div class="bottom-body">
							<ul class="bottom-ul">
								<?php
							 		foreach($cates2 as $cate2){
							 	?>
								<li><span><?php echo $cate2->category_name;?></span></li>
								<?php 
									}
								?>
								<div style="clear:both;"></div>
							</ul>	
							<div class="button2">
								<button  class="btn1">添加</button>
								<button class="btn2">删除</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/prodcate_add"></script>
</body>
</html>