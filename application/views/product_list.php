<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛋糕分类列表</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/product_list.css">
	<style>
		.page_num{
			clear: both;
			margin-left:500px;
		}
		.page_num a{
			margin:0 2px;
			display: inline-block;
			padding: 2px 7px 2px 7px;
			line-height: 20px;
			overflow: hidden;
			color:#959595;
			border: 1px solid #dddddd;
			border-radius:5px;

		}
		.page_num strong{
			margin:0 2px;
			display: inline-block;
			padding: 2px 7px 2px 7px;
			line-height: 20px;
			overflow: hidden;
			background-color: #ffa405;
			color:#ffffff;
			border: 1px solid #dddddd;
			border-radius:5px;
		}
		.page_num a:hover{
			background-color: #ffa405;
			color:#ffffff;
		}
	</style>
</head>
<body>
	<?php include "header.php";?>

<!--	<div class="ser">-->
<!--		<img src="assets/img/hongbei_logo.png" alt="">-->
<!--		<form action="product/prod_list" method="post">-->
<!--			<input type="text" name="search"><button type="submit">搜&nbsp;&nbsp;&nbsp;索</button>-->
<!--		</form>			-->
<!--	</div>-->
	<div class="ser">
		<img src="assets/img/hongbei_logo.png" alt="">
		<form action="">
			<div class="sf-1">
				<h3 class="sf1-1">产品</h3>
				<ul>
					<li><a href="product/baker_list">烘焙师</a></li>
				</ul>
			</div>
			<input type="text" value="搜索你想找的产品..." onFocus="if(value==defaultValue){value='';}" onBlur="if(!value){value=defaultValue;}">
			<button type="button">搜&nbsp;&nbsp;&nbsp;索</button>
		</form>
	</div>

	<div class="container">
		<div class="content">
			<div class="c-span">
				<a href="javascript:;">所有分类 &gt;</a>
				<span >共<?php echo sizeof($product);?>件宝贝</span>
			</div>

			<div class="cate">
				<ul class="ul-two">
					<li style="margin: 14px 25px 0px 20px;">筛选条件:</li>
					<?php
						$size = $this -> input -> get('size');
						$pril = $this -> input -> get('pril');

						if($size) {
							echo "<li class='cate-click' data-query='size|".$size."'><a href='javascript:;' style='margin-left:35px;'>".$size."寸</a><span>×</span></li>";
						}
						if($pril) {
							echo "<li class='cate-click' data-query='pril|".$pril."'><a href='javascript:;'  style='margin-left:15px;'>".$pril."元</a><span>×</span></li>";
						}
					?>

				</ul>

				<ul class="ul-one" style="border-top: 1px dashed #fcaeae;">
					<li style="margin-left: 20px;">蛋糕尺寸：</li>
					<li><a class="query" data-query="size|6" href="javascript:;">6寸</a></li>
					<li><a class="query" data-query="size|8" href="javascript:;">8寸</a></li>
					<li><a class="query" data-query="size|9" href="javascript:;">9寸</a></li>
					<li><a class="query" data-query="size|10" href="javascript:;">10寸</a></li>
					<li><a class="query" data-query="size|12" href="javascript:;">12寸</a></li>
					<li><a class="query" data-query="size|15" href="javascript:;">15寸</a></li>
					<li><a class="query" data-query="size|16" href="javascript:;">16寸</a></li>
				</ul>
				
				<ul class="ul-one" style="background: #ffeeee; border-top: 1px dashed #fcaeae; border-bottom: 1px dashed #fcaeae;">
					<li style="margin-left: 20px;">蛋糕价格：</li>
					<li><a class="query" data-query="pril|1-50" href="javascript:;">50元以下</a></li>
					<li><a class="query" data-query="pril|51-100" href="javascript:;">51-100元</a></li>
					<li><a class="query" data-query="pril|100-150" href="javascript:;">100-150元</a></li>
					<li><a class="query" data-query="pril|150-200" href="javascript:;">150-200元</a></li>
					<li><a class="query" data-query="pril|200-300" href="javascript:;">200-300元</a></li>
				</ul>
				
				<ul class="ul-one" style="border-bottom: 1px solid #fcaeae;">
					<li style="margin-left: 20px;">蛋糕类型：</li>
					<li><a href="javascript:;">北京</a></li>
					<li><a href="javascript:;">哈尔滨</a></li>
					<li><a href="javascript:;">上海</a></li>

				</ul>
			</div>
			<?php
			$sort = $this->input->get('sort');
			$sort_type = 'desc';
			if($sort){

				$sort_type = substr($sort, strpos($sort, '-') + 1);
				$sort_type = $sort_type == 'desc'?'asc':'desc';
			}
			?>
			<div class="cake">
				<ul class="sort">
					<li id="selec"><a href="javascript:;">综合排序</a></li>
					<li><a class="query" data-query="sort|popular-<?php echo $sort_type ;?>" href="javascript:;">人气</a></li>
					<li><a class="query" data-query="sort|sale-<?php echo $sort_type ;?>" href="javascript:;">销量</a></li>
					<li><a class="query" data-query="sort|good-<?php echo $sort_type ;?>" href="javascript:;">好评</a></li>
					<li><a class="query" data-query="sort|price-<?php echo $sort_type ;?>" href="javascript:;">价格</a></li>
					<input type="checkbox" name="hobby"><p>当天配送</p>
					<input type="checkbox" name="hobby"><p>提前预定</p>
				</ul>
				<input type="checkbox"  name="hobby"><p>包邮</p>
				<input type="checkbox" name="hobby"><p>赠送退货运费险</p>
				<input type="checkbox" name="hobby"><p>货到付款</p>
				<input type="checkbox" name="hobby"><p>新品</p>
				<div class="ban"></div>


				<?php
					foreach($product as $v){
				?>
						<div class="cake-show">
							<a href="product/detail/<?php echo $v->product_id;?>"><img src="<?php echo $v->picture_thumb;?>" alt=""></a>
							<div class="desc">
								<div class="row-1">
									<span>￥<?php echo $v->price;?></span>
									<a href="javascript:;"><strong><p><?php echo $v->product_name;?></p></strong></a>
								</div>
								<div class="row-2">
									<span style="margin-left: 16px;">销&nbsp;量  :<a href="javascript:;">    <?php echo $v->sales?></a></span>
									<span class="row-2-i"></span>
									<span style=" margin-left: 13px;">评&nbsp;论  :<a href="javascript:;">    <?php echo $v->comms?></a></span>
								</div>
								<div class="row-3">
									<span class="row-3-i"></span>
									<span style="margin-left:0px;"><a href="javascript:;"><?php echo $v->username;?></a></span>
									<span style="margin-left:73px;"><a href="javascript:;"><?php echo $v->address?></a></span>
								</div>
								<div class="row-4">
									<span style="margin-left: 12px; background: #f88181;"><a href="javascript:;"><?php if($v->is_book == 1){echo '可预订';}else{echo '';}?></a></span>
									<span style="background: #8766bc;"><a href="javascript:;"><?php if($v->is_sell == 1){echo '可销售';}else{echo '';}?></a></span>
								</div>
							</div>
						</div>
				<?php
					}
				?>

			</div>
			<div class="page_num">
				<?php echo $this->pagination->create_links(); ?>
			</div>

		</div>

		<div class="right-sidebar">
			<strong><span class="tit">蛋糕热卖</span></strong>
			<?php
			foreach($pro as $v){
				?>
				<div class="hot-cake">
					<a href="javascript:;"><img src="<?php echo $v->picture_thumb;?>" alt=""></a>
					<div class="des">
						<span class="des-1"><?php echo $v->product_name;?></span>
						<span class="des-2">销量:  <?php echo $v->sales;?></span>
					</div>
				</div>

				<?php
			}
			?>


		</div>
	</div>	


	
	<div class="footer">
		<ul class="about">
			<strong><li>关于</li></strong>
			<li><a href="javascript:;">关于站酷</a></li>
			<li><a href="javascript:;">版权声明</a></li>
			<li><a href="javascript:;">关于隐私</a></li>
			<li><a href="javascript:;">免费声明</a></li>
			<li><a href="javascript:;">网站说明</a></li>
			<li><a href="javascript:;">加入站酷</a></li>
		</ul>
		<ul class="column">
			<strong><li>栏目</li></strong>
			<li><a href="javascript:;">原创作品</a></li>
			<li><a href="javascript:;">设计文章</a></li>
			<li><a href="javascript:;">佳作欣赏</a></li>
			<li><a href="">设计素材</a></li>
			<li><a href="">设计赛事</a></li>
			<li><a href="">精彩评论</a></li>
		</ul>
		<ul class="column">
			<strong><li>商务</li></strong>
			<li><a href="javascript:;">企业服务</a></li>
			<li><a href="javascript:;">赛事服务</a></li>
			<li><a href="javascript:;">商业服务</a></li>
			<li><a href="javascript:;">图片服务</a></li>
			<li><a href="javascript:;">培训服务</a></li>
		</ul>
		<ul class="column">
			<strong><li>联系</li></strong>
			<li><a href="javascript:;">在线服务</a></li>
			<li><a href="javascript:;">联系我们</a></li>
			<li><a href="javascript:;">站酷微博</a></li>
			<li><a href="javascript:;">站酷微信</a></li>
		</ul>
		<ul class="column">
			<strong><li>帮助</li></strong>
			<li><a href="javascript:;">站酷规则</a></li>
			<li><a href="javascript:;">常见问题</a></li>
		</ul>
		<ul class="column">
			<strong><li>友链</li></strong>
			<li><a href="javascript:;">中电云集</a></li>
			<li><a href="javascript:;">星云网</a></li>
			<li><a href="javascript:;">站长之家</a></li>
			<li><a href="javascript:;">蜂鸟网</a></li>
			<li><a href="javascript:;">更多</a></li>
		</ul>
		<ul class="about-1">
			<strong><li>版权信息</li></strong>
			<li><a href="">哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊哈哈哈哈哈啊哈啊</a></li>
			<li><a href="">e54tyegsdfvsdfgs</a></li>
		</ul>
	</div>
	<script src="assets/js/require.js" data-main="assets/js/product_list"></script>
<!--	<script src="assets/js/jquery-2.1.4.min.js"></script>-->
<!--	<script>-->
<!--		$(function(){-->
<!--			$('.query').on('click', function(){-->
<!--				console.log(location.search);-->
<!--				var query = $(this).data('query');-->
<!--				var queryType = query.substring(0, query.indexOf('|'));-->
<!--				var queryValue = query.substring(query.indexOf('|')+1);-->
<!---->
<!--				var url = location.href + (location.search.length>0?'':'?');-->
<!--				if(location.search.indexOf(queryType) == -1){-->
<!--					url += '&' + queryType + '=' + queryValue;-->
<!--				}else{-->
<!--					var re = new RegExp(queryType+'='+'[^&]+', 'ig');-->
<!--					url = url.replace(re, queryType+'='+queryValue);-->
<!--				}-->
<!--				location.href = url;-->
<!---->
<!--				return false;-->
<!--			});-->
<!---->
<!---->
<!---->
<!---->
<!--		});-->
<!---->
<!---->
<!--	</script>-->
</body>
</html>