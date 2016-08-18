<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>蛋糕师---蛋糕列表</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backg.css">
		<!--<link rel="stylesheet" href="assets/css/left_nav.css">-->
	<link rel="stylesheet" href="assets/css/cake-list.css">
</head>
<body>
	<!-- 内容区开始 -->
		<?php include "header.php";?>
		<?php include "backg.php";?><?php?>
	<div id="container">
				<!--<?php include "left_nav.php";?>-->
		<!-- 个性签名开始 -->
		<div class="per-sign">
			<span>个性签名: 哈哈~
			</span>
		</div>
		<!-- 个性签名结束 -->
		<!-- 左侧一级种类开始 -->
		<div id="left">
			<div id="all-category">所有分类</div>
			<ul id="category">
				<a href="product/cake_list">
					<li class="category1 selected">》查看所有宝贝</li>
				</a>
				<?php 
					foreach ($cates1 as $cate1){
				?>
				<a class="query1" data-query="cate1|<?php echo $cate1 -> category_id;?>" href="javascript:;">
					<li class="category1">》<?php echo $cate1 -> category_name;?>系列</li>
				</a>
				<?php
					}
				?>
			</ul>
		</div>
		<!-- 左侧一级种类结束 -->
		<!-- 条件查找块开始 -->
		 <div id="search">
			<ul class="list">
				<li class="search-list" id="all">
					<span id="cate"><img src="assets/img/cate.png"></span>
					所有宝贝
				</li>
				<li class="search-list">
					<ul class="list">
						<li class="category2">筛选条件:</li>
						<?php
							$size = $this -> input -> get('size');
							$pril = $this -> input -> get('pril');
							$cate2 = $this -> input -> get('cate2');
							if($size) {
								echo "<li class='click' data-query='size|".$size."'><a href='javascript:;' style='margin-left:35px;'>".$size."寸</a><strong>×</strong></li>";
							}
							if($pril) {
								echo "<li class='click' data-query='pril|".$pril."'><a href='javascript:;'  style='margin-left:15px;'>".$pril."元</a><strong>×</strong></li>";
							}
							if($cate2) {
								echo "<li class='click' data-query='cate2|".$cate2."'><a href='javascript:;'  style='margin-left:15px;'>".$cate2."<strong>×</strong></a></li>";
							}
						?>
					</ul>
				</li>
				 <li class="search-list">
					<ul class="list">
						<li class="category2" >蛋糕分类:</li>
						<?php 
							foreach($cates2 as $cate2){
						?>
						<li class="category2">
							<a class="query" data-query="cate2|<?php echo $cate2 -> category_id;?>" href="javascript:;"><?php echo $cate2 -> category_name;?>(333)</a>
						</li>
						<?php 
							}
						?>
					</ul>
				</li>
 				<li class="search-list">
					<ul class="list">
						<li class="category2" >尺寸分类:</li>
						<li class="category2"><a class="query" data-query="size|6" href="javascript:;">6寸</a>
						</li>
						<li class="category2"><a class="query" data-query="size|7" href="javascript:;">7寸</a>
						</li>
						<li class="category2"><a class="query" data-query="size|8" href="javascript:;">8寸</a>
						</li>
						<li class="category2"><a class="query" data-query="size|9" href="javascript:;">9寸</a>
						</li>
					</ul>
				</li>
				<li class="search-list" >
					<ul class="list">
						<li class="category2" >蛋糕价格:</li>
						<li class="category2">
							<a class="query" data-query="pril|0-100" href="javascript:;">0~100元</a>
						</li>
						<li class="category2">
							<a class="query" data-query="pril|100-200" href="javascript:;">100~200元</a>
						</li>
						<li class="category2">
							<a class="query" data-query="pril|200-300" href="javascript:;">200~300元</a>
						</li>
					</ul>
				</li>
				<li class="search-list" id="more">
					<span>更&nbsp;多&nbsp;V</span>
				</li>
				<li class="search-list" id="search-result">
					<p>共搜索到78个符合条件的商品</p>
					<form>
						关键字：<input type="input" id="key">
						价格：<input type="input" class="search-price">
						到 <input type="input" class="search-price">
						<input type="submit" id="btn" value="搜 索">
					</form>
				</li>
				<?php
					$sort = $this->input->get('sort');
					$sort_type = 'desc';
					if($sort){						
						$sort_type = substr($sort, strpos($sort, '-') + 1);
						$sort_type = $sort_type == 'desc'?'asc':'desc';
					}
				?>
				<li class="search-list" id="sort">
					<ul id="rank">
						<li class="category2">排序:</li>
						<li class="category2">
							<a class="query" data-query="sort|collect-<?php echo $sort_type ;?>" href="javascript:;">人气 <img src="assets/img/top.png">
							</a>
						</li>
						<li class="category2">
							<a class="query" data-query="sort|sale-<?php echo $sort_type ;?>" href="javascript:;">销量 <img src="assets/img/top.png">
							</a>
						</li>
						<li class="category2">
							<a class="query" data-query="sort|newproduct-<?php echo $sort_type ;?>" href="javascript:;">新品 <img src="assets/img/top.png">
							</a>
						</li>
						<li class="category2">
							<a class="query" data-query="sort|price-<?php echo $sort_type ;?>" href="javascript:;">价格 <img src="assets/img/top.png">
							</a>
						</li>
					</ul>
				</li>
			</ul> 
		</div>
		<!-- 条件查找块结束 -->
		<!-- 蛋糕列表开始 -->
		<div id="content">
			<?php
				foreach($results as $result){
			?>
			<div class="cake">
				<a href="product/detail/<?php echo $result->product_id;?>"><img class="my-cake" src="<?php echo $result -> picture_thumb;?>"></a>
				<div class="desc">
					<div class="row-1">
						<span >￥<?php echo $result -> price;?></span>
						<strong>
							<p>
								<a href="#"><?php echo $result -> product_introduce;?></a>
							</p>
						</strong>
					</div>
					<div class="row-2">
						<span>
						销 量 : <strong><?php echo $result ->sale==null?0:$result ->sale;?> |</strong>
						</span>
						<span>
						评 论 : <strong><?php echo $result -> comms;?></strong>
						</span>
					</div>
					<div class="row-3">
						<span class="row-3-i">
							<img src="assets/img/bakerlogo.gif">
						</span> 
						<span class="baker-city">
							<a href="#"><?php echo $result -> address;?></a>
						</span>  
						<span class="baker-name">
							<a href="#"><?php echo $result -> nickname;?></a>
						</span>
					</div>
					<div class="row-4">
						<span class="order">可预订</span>
						<span class="sale">可销售</span>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div> 
		<!-- 蛋糕列表结束 -->
	</div>
	<!-- 内容区结束 -->
	<script src="assets/js/require.js" data-main="assets/js/cake_list.js"></script>
</body>
</html>