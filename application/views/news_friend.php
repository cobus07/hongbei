<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>好友消息</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" type="text/css" href="assets/css/news_friend.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/backg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/left_nav.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>
	<div id="friend-news">
		<div class="wrap">
			<div class="news-left" style="position: absolute">
				<?php include "left_nav.php";?>
			</div>
			<div class="news-right">
				<div class="search">
					<span></span>
					<input type="text" value="搜索你的好友记录. . .">
				</div>
				<div class="news-content">
					<ul class="tab">
						<li class="news-system"><a href="personal/system" class="news">消息系统</a><span><a href="personal/system" class="count" ><?php echo $sys_total?></a><i></i></span></li>
						<li class="news-reply"><a href="personal/reply" class="news">评论</a><span><a href="personal/reply" class="count">1</a></span></li>
						<li class="news-friend"><a href="personal/friend" class="news" data-reply="<?php echo $reply?>" data-sys="<?php echo $sys?>">好友消息</a></li>
					</ul>
					<ul class="news-list">
						<?php
							foreach($frinews as $frinew) {
						?>
						<li>
							<div class="news-list-img">
								<a href=""><img src="uploads/user/20151229/news_photo.jpg"></a>
							</div>
							<div class="news-list-content">
								<h3><a href=""><?php echo $frinew->title?></a></h3>
								<p><a href="">
										<?php
											echo mb_strlen($frinew->content)<27?$frinew->content:substr($frinew->content,0,27).'<br />'.substr($frinew->content,28,54).'<br />'.substr($frinew->content,55,mb_strlen($frinew->content)-1);
										?>
									</a></p>
							</div>
							<div class="news-list-date">
								<span><?php echo $frinew->add_time?><i></i></span>

								<div class="news-list-reply">
									<a class="reply" data-id="<?php echo $frinew->message_id?>" href="javascript:;">回复</a>
									<a href="news_friend/del_friend/<?php echo $frinew->message_id;?>">删除</a>
								</div>
							</div>
						</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/news_friend.js"></script>
</body>
</html>