<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车列表</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backg.css">
	<link rel="stylesheet" href="assets/css/left_nav.css">
	<link rel="stylesheet" href="assets/css/shopping_trolley.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>

	<div class="container">
		<div class="per-sign"><span>个性签名: 愿得一学霸，教我数理化~</span></div>
		<div class="left-navd">

<?php include "left_nav.php";?>
		</div>
		<div class="content">
			<div class="cip">
				<input type="text" value="搜索您的订单..." onFocus="if(value==defaultValue){value='';}" onBlur="if(!value){value=defaultValue;}">
			</div>
			<table class="tcn-table">
				<tr class="tt-1">
					<td class="tt1-1"><input type="checkbox"></td>
					<td>全选</td>
					<td>商品信息</td>
					<td style="text-align: center;">单价(元)</td>
					<td style="text-align: center;">数量</td>
					<td style="text-align: center;">金额(元)</td>
					<td style="text-align: center;">操作</td>
				</tr>

				<tr><td style="height: 10px;" colspan="8"></td></tr>

				<tr class="tt-2">
					<td class="tt2-1"><input type="checkbox"></td>
					<td class="tt2-2" colspan="2">
						<span>店铺：小李烘焙时代</span>
						<span>小李烘焙师</span>
					</td>
					<td colspan="4" style="padding-left: 30px;"><span>联系卖家</span></td>
				</tr>
				<tr class="tt-3">
					<td class="tt3-1"><input type="checkbox"></td>
					<td class="tt3-2">
						<div>
							<img src="uploads/cake/20151215/cake5.png" alt="">
						</div>				
					</td>
					<td class="tt3-3">
						<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
						<p>种类 : 水果蛋糕</p>
					</td>
					<td class="tt3-4"><span>0.75</span></td>
					<td class="tt3-5"><span>1</span></td>
					<td class="tt3-6"><span>11.99</span></td>
					<td  class="tt3-7">
						<ul class="tt37-1">
							<li>移入收藏夹</li>
							<li>删除</li>
						</ul>
					</td>
				</tr>

				<tr><td style="height: 10px;" colspan="8"></td></tr>
				<tr class="tt-2">
					<td class="tt2-1"><input type="checkbox"></td>
					<td class="tt2-2" colspan="2">
						<span>店铺：小李烘焙时代</span>
						<span>小李烘焙师</span>
					</td>
					<td colspan="4" style="padding-left: 30px;"><span>联系卖家</span></td>
				</tr>
				<tr class="tt-3">
					<td class="tt3-1"><input type="checkbox"></td>
					<td class="tt3-2">
						<div>
							<img src="uploads/cake/20151215/cake5.png" alt="">
						</div>				
					</td>
					<td class="tt3-3">
						<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
						<p>种类 : 水果蛋糕</p>
					</td>
					<td class="tt3-4"><span>0.75</span></td>
					<td class="tt3-5"><span>1</span></td>
					<td class="tt3-6"><span>11.99</span></td>
					<td  class="tt3-7">
						<ul class="tt37-1">
							<li>移入收藏夹</li>
							<li>删除</li>
						</ul>
					</td>
				</tr>
			</table>

			<div style="height: 20px;"></div>
		</div>
	</div>
</body>
</html>