<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>收藏</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/backg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/left_nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/collect.css">
	
	
</head>
<body>
	<?php 
		include 'header.php'; 
		include 'backg.php';
	?>
	
	<!-- <div id="header"></div> -->
	<div id="container" class="wrap">
		<div class="container-nav">
			<!-- <img src="img/nav.png"> -->
			<?php include 'left_nav.php'; ?>
		</div>
		<div class="container-collect">
			<div class="container-collect-nav">
				<input value="搜索你的收藏...">
				<ul class="container-collect-list">
					<li  class="selected">宝贝收藏</li>
					<li class="store-click">店铺收藏 <span>1</span></li>
					<li  class="share-click">评论收藏 <span>1</span></li>
				</ul>
			</div>
			<div class="container-collect-container">
				<div class="container-collect-content selected">	
					<span class="container-collect-span">
						<p class="selected">全部宝贝<?php echo count($products)?></p>
						<p class="container-collect-span-last">下架宝贝<?php echo count($sold_outs)?></p>
					</span>
					<ul class="container-collect-span-list">
						<li class="selected container-collect-list-li">
							<ul class="collect-li-list">
								<?php
										foreach($products as $product){
								?>
								<li>
									<img class="collect-img1" src="<?php echo $product->picture_thumb;?>">
									<p><?php echo $product->product_name;?></p>
									<p class="collect-li-list-p">￥<?php echo $product->price;?></p>
								</li>
								<?php
										}
								?>
							</ul>
						</li>
						<li class="container-collect-list-li">
							<ul class="collect-li-list sold-out">
							</ul>
						</li>
					</ul>
				</div>
				<div class="container-collect-content">
					<ul class="container-collect-content-list store-information">
						
					</ul>
				</div>
				<div class="container-collect-content">
					<ul class="container-collect-comment share-information">
						
					</ul>
				</div>
			</div>	
		</div>
	</div>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/collect.js"></script>
	<script>
	var flag = true;
	var flag1 = true;
		//用于AJAX查询下架产品的代码
			$(".container-collect-span-last").on("click",function(){
				if(flag){
					$.get("personal/col_sold_out",function(date){
						var html = "";
						for(var i=0;i<date.sold_outs.length;i++){
							html +='<li>'
									 +'<img class="collect-img1" src='+date.sold_outs[i].picture_thumb+'>'
										 +'<p>'+date.sold_outs[i].product_name+'</p>'
										 +'<p class="collect-li-list-p">￥'+date.sold_outs[i].price+'</p>'
									 +'</li>';
										}
						
							$(".sold-out").append(html);
							flag = false;
						
					},"json");
				}
			});
			
		$(".store-click").on("click",function(){
			if(flag1){
				$.get("personal/col_store_information",function(date){
					var html2="";
					console.log(date.stores[0].user_pic_thumb);
					for(var i=0;i<date.stores.length;i++){
						html2 += '<li class="container-collect-content-li">'
									+'<div class="container-collect-content-left">'
										+'<span class="container-collect-content-span"><img src='+date.stores[i].user_pic_thumb+'></span>'
										+'<span class="container-collect-content-span1">'+date.stores[i].realname+'</span>'
										+'<span class="container-collect-content-span2">&nbsp;&nbsp;&nbsp;</span>'
										+'<span class="container-collect-content-span3">'+date.stores[i].store_name+'</span>'	
									+'</div>'	
									+'<div class="container-collect-content-right">'
										+'<ul class="collect-list-list">'
											+'<li><a href="#">本周上新</a></li>'
											+'<li><a href="#">优惠</a></li>'
											+'<li><a href="#" class="collect-list-a-last">热销</a></li>'
										+'</ul>'
										+'<ul class="collect-list-img">'
						for(var j=0;j<date.stores[i].baker_good.length;j++){
											html2 +='<li>'
											+'<img class="collect-img1" src='+date.stores[i].baker_good[j].picture_thumb+'>'
											+'<p>'+date.stores[i].baker_good[j].price+'</p>'
											+'</li>'
						}
										html2 +='</ul>'
									+'</div>'	
								+'</li>'
					 }
					 	$(".store-information").append(html2);
					 	flag1 = false;
				},"json");
			}
		});
		$('.share-click').on('click',function(){
			$.get('personal/col_get_share',function(date){
				//console.log(date.shares[3].username);
				var html3 = "";
				
				for(var i=0;i<date.shares.length;i++){
					html3 += '<li class="container-collect-comment-li">'
							+'<span class="container-collect-content-span"><img src='+date.shares[i].user_pic_thumb+'></span>'
							+'<h2>'+date.shares[i].username+'</h2>'
							+'<p>'+date.shares[i].introduce+'</p>'
							+'<ul class="collect-comment-list">'
								for(var j=0;j<date.shares[i].shares_good.length;j++){
								html3 +='<li><img class="collect-img2" src='+date.shares[i].shares_good[j].picture_thumb+'></li>'
								}
							html3 +='</ul>'
							+'<p class="collect-comment-p">'+date.shares[i].addtime+'</p>'
							+'<ul class="collect-comment-nav">'
								+'<li><a href="#">取消收藏</a></li>'
								+'<li><a href="#">转发</a></li>'
								+'<li><a href="#">评论</a></li>'
								+'<li><a href="#" class="collect-comment-nav-last">点赞10</a></li>'
							+'</ul>'
							+'<div class="collect-comment-nav-div"></div>'
						+'</li>'
				}
				
					$(".share-information").append(html3);
			},'json');
		});
	</script>
</body>
</html>