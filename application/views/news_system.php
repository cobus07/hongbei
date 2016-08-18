<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统消息</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" type="text/css" href="assets/css/news_system.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/backg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/left_nav.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>
	<div id="system-news">
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
					</ul>
					<ul class="news-list">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/news_system.js"></script>
</body>
</html>