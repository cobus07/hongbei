<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>消息评论</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" type="text/css" href="assets/css/news_reply.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/backg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/left_nav.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>
	<div id="news-reply">
		<div class="wrap">
			<div class="news-left" style="position: absolute;">
				<?php include "left_nav.php";?>
			</div>
			<div class="news-right">
				<div class="search">
					<span></span>
					<input type="text" value="搜索你的好友记录. . .">
				</div>
				<div class="news-content">
					<ul class="tab">
						<li class="news-system"><a href="personal/system" class="news">消息系统</a><span><a href="news_system/system" class="count"><?php echo $sys_total?></a></span></li>
						<li class="news-reply"><a href="personal/reply" class="news">评论</a></li>
						<li class="news-friend"><a href="personal/friend" class="news">好友消息</a><span><a href="news_friend/friend" class="count"><?php echo $fri_total?></a><i></i></span></li>
					</ul>
					<ul class="news-list">
						<?php
							foreach($sendnews as $send){
						?>
						<li class="list">
							<div class="reply-content">
								<div class="news-list-img">
									<a href=""><img src="uploads/user/20151229/news_photo.jpg"></a>
								</div>
								<div class="news-list-content">
									<p class="host"><a class="host" href=""><?php echo $send->friendname?></a><i></i></p>
									<p class="content">评论<a class="to-person" href=""><?php echo '@'.$send->username?></a>:<?php echo $send->content?> </p>
									<p class="content reply"><span>回复评论：</span><a href="" class="to-person"><?php echo '@'.$send->friendname?></a>犬瘟热而</p>
									<div class="over-reply">
										<p class="content">回复<a class="to-person" href="">@名字是什么</a>：评论的到底是神马呢 </p>
										<p class="content reply"><span>回复我的评论：</span><a href="" class="to-person">@起名字好难</a>  你觉得有意思么</p>
									</div>
								</div>
							</div>
							<span class="info"><?php echo $send->add_time?></span>
							<ul class="news-list-reply">
								<li class="see-more"><a href="javascript:;">查看对话</a></li>
								<li class="reply"><a href="javascript:;">回复</a></li>
							</ul>
						</li>
						<?php
						}
						?>
					</ul>	
				</div>
			</div>	
		</div>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/news_reply.js"></script>
</body>
</html>