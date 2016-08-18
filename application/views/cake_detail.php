<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛋糕详情</title>
	<base href="<?php echo site_url();?>" target=""/>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/cake_detail.css">
	<link rel="stylesheet" href="assets/css/cake_comment.css">
</head>
<body>
	<?php include "header.php";?>
	<div class="content">
		<div class="cake-photo">
			<?php
				foreach($photo as $photos)
				{ 
			?>
			<img class="main-photo" src="<?php echo $photos->picture;?>" alt="">
			<?php } ?>
			<ul id="ul1">
			<?php
				foreach($photo as $photos)
				{ 
			?>
				<li><img class="thumb-photo" src="<?php echo $photos->picture_thumb;?>" alt=""></li>
			<?php } ?>
			</ul>
		</div>
		
		<div class="introduce">
			<div class="title">
				<img class="baker-img" src="<?php echo $message->user_pic_thumb;?>" alt="">
				<h2><?php echo $message->product_name;?></h2>
				<span class="baker">蛋糕师傅：<a href="" style="color:#000;"><?php echo $message->nickname;?></a></span>
				<a href=""><span class="contact">询问卖家</span></a>
				<img class="star" src="assets/img/xingxing.png" alt="">
			</div>
			<div class="price">
				<h2>价格</h2><span>￥<?php echo $size[0]->normal_price;?></span>
				<h1>促销价</h1><strong>￥<?php echo $size[0]->price;?></strong>
			</div>
			<div class="zonghe">
				<ul class="multiple">
					<li>月销量：<strong style="color:#c40000;"><?php echo $volume->amounts;?></strong><span style="text-align:center;">|</span></li>
					<li>累计评价：<strong style="color:#c40000;"><?php echo $total->total;?></strong>|</li>
					<li>送积分：<strong style="color:#c40000;">1</strong></li>
				</ul>
			</div>
			<div class="message">
				<ul class="size" style="margin-top:24px;">
					<li class="value" style="margin-right:69px;">尺寸</li>
					<?php
						foreach($size as $v)
						{ 
					?>
					<li class="key hover"><span><?php echo $v->size;?></span>英寸</li>
					<?php } ?>
				</ul><br />
				<ul class="address">
					<li class="value" style="margin-right:69px;">运费</li>
					<li class="key" style="margin-right:9px;"><?php echo $message->city;?></li>至
					<input  type="text" placeholder="哈尔滨">
					<strong style="font-size:14px;">快递：0.0</strong>
					<!-- <span>同城</span> -->
				</ul>
				<ul class="number">
					<li class="value" style="padding: 0px 14px;">数量 &nbsp;&nbsp;&nbsp;库存<?php echo $size[0]->stock;?>件</li>
					<!-- <li class="key" style="width:45px;height:30px;line-height:30px;">1222</li> -->
				</ul>
			</div>
			<button id="make" value="上门制作">上门制作</button><br />
			<button id="shopping" value="加入购物车">加入购物车</button>
			<button id="buy" value="立即购买">立即购买</button>
			<span id="local">同城</span>
			<span id="free">包邮</span>
			<span id="reserve">可预定</span>
		</div>

		<div class="sidebar-top">
			<span>热门推荐</span><br/><br/>
			<?php
				foreach($product as $p)
				{
			?>
			<!--怎么从控制器传过来一个变量 view页面如何接收-->
			<div>
				<?php
					if($p->product_id!=$message->product_id)
					{
				?>
				<img  src="<?php echo $p->picture;?>" alt="">
				<span style="font-size:15px;line-height:35px;"><?php echo $p->product_name;?></span>
				<?php }?>
			</div>
			<?php
				}
			?>
			
		</div>
		<div style="clear:both;position:absolute;top:588px;left:145px;">
			<a href="" id="share">分&nbsp;&nbsp;享</a>
			<a href="" id="collect">|&nbsp;收&nbsp;&nbsp;藏</a>
		</div>
		<div class="bottom">
			<ul class="option-bar">
				<li class="selected">蛋糕详情</li>
				<li>买家评论</li>
				<li>交易记录</li>
			</ul>
			<div class="detail">
				<p>产品参数：</p>
				<p>配料：<?php echo $message->product_burdening;?></p>
				<p>保质期：<?php echo $message->product_quality_date;?></p>
				<p>生产日期：<?php echo $message->product_date;?></p>
			</div>
			<div class="buyer-com">
			  <div class="describe">
				<div style="width:205px;">
					<span class="span1">与描述相符</span>
					<span class="span2">4.7</span>
					<span class="span3"><img src="assets/img/smallstar.jpg"></span>
				</div>
				<div style="margin-left:210px;width:700px;">
					<span class="describe-con">蛋糕松软可口</span>
					<span class="describe-con">蛋糕松软可口</span>
					<span class="describe-con">蛋糕松软可口</span>
					<span class="describe-con">蛋糕松软可口</span>
					<span class="describe-con">蛋糕松软可口</span>
					<span class="describe-con">蛋糕松软可口</span>
				</div>
				</div>
				<ul class="comment-nav">
					<li><input type="radio" name="com" data-state="all" checked="checked"> 全部（<?php echo $total->total;?>）</li>
					<input id="use" type="hidden" value="<?php echo $message->product_id;?>">
					<li><input type="radio" name="com" data-state="pic"> 图片（）</li>
					<li><input type="radio" name="com" data-state="1"> 好评（<?php echo $good->good;?>）</li>
					<li><input type="radio" name="com" data-state="0"> 中评（<?php echo $middle->middle;?>）</li>
					<li><input type="radio" name="com" data-state="-1"> 差评（<?php echo $bad->bad;?>）</li>
				
				</ul>
				<div class="comment">
					 <!-- <p></p>
					 <span></span>
					 <img src="uploads/cake/20151215/cake1.png"> -->
				</div>
				
			</div>
		</div>
		<div class="sidebar-bottom">
			<h2 class="sb-1">相关推荐</h2>
			<?php
				foreach($video as $v)
				{
			?>
			<div style="position:relative;height:174px;">
				<div style="width:117px;height:163px;float:left;margin-top: 11px;">
					<a href="">
						<img src="uploads/cake/20160107/cake3.png" alt="" class="video">
					</a>
				</div>
				<div >
					<a href=""><span class="sb-2"style=""><?php echo $v->video_introduce;?></span></a>
					<a href=""><span class="sb-3"><?php echo $message->nickname;?></span></a>
					<span class="sb-4"></span>
					<button class="play">播&nbsp;放</button>
				</div>	
			</div>
			<?php }?>
				
		</div>
	</div>

	<script src="assets/js/require.js" data-main="assets/js/cake_detail"></script>
</body>
</html>