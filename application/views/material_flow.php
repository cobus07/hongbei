<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>物流管理</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/material_flow.css">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backs.css">
	<link rel="stylesheet" href="assets/css/seller_header.css">
	<style>
		
	</style>
</head>
<body>
	<?php include "header.php";?>
	<?php include "backs.php";?>
	<div class="container">
		<!-- 导航栏开始 -->
			<?php include "seller_header.php";?>
		<!-- 导航栏结束 -->
		<!-- 内容区开始 -->
		<div id="content">
			<div id="left">
				<div id="title">物流管理</div>
				<div id="left-nav">
					<ul>
						<li><a href="seller/">发 货 <span>></span></a></li>
						<li id="sent"><a href="#">我要寄快递</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 内容区结束 -->
		<!-- 订单查询开始 -->
		<div class="sec-order">
			<div class="sec-nav">
				<span>订单查询</span>
			</div>
			<div class="sec-table">
				<form action="" method="post">
					<table>
						<tr class="st-1">
							<td>宝贝名称：</td>
							<td><input type="text"></td>
						</tr>
						<tr class="st-1">
							<td>订单编号：</td>
							<td><input type="text"></td>
						</tr>
						<tr class="st-3">
							<td>成交时间：</td>
							<td><input type="text">&nbsp;日&nbsp;到&nbsp;
								<input type="text"> 日</td>
						</tr>
						<tr class="st-2">
							<td></td>
							<td><button type="submit">搜 索</button></td>
						</tr>
					</table>
				</form>					
			</div>				
		</div>
		<!-- 订单查询结束 -->
		<!-- 订单列表开始 -->
		<div id="trade">
			<table>
				<tr>
					<td colspan="2" class="title">
						<span>订单号：121212</span>
						<span>创建时间{2013-12-11</span>
					</td>
				</tr>
				<tr>
					<td class="product">
						<div class="pric">
							<img src="5.jpg">
						</div>
						<p>穿棉加大码的套装，穿棉加大码的套装，穿棉加大码的套装
							穿棉加大码的套装</p>
						<span>1.00*2</span> 
					</td>
					<td rowspan="2">
						<ul>
							<li>收货信息：</li>
							<li class="value">张三 学府路74号 张三 学府路74号 张三 学府路74号
								张三 学府路74号</li>
							<li>买家选择：</li>
							<li class="value">快递</li>
							<li>物流公司：</li>
							<li class="value">圆通快递</li>
							<li>买家留言：</li>
							<li class="value">快点发货</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="product">
						<div class="pric">
							<img src="5.jpg">
						</div>
						<p>穿棉加大码的套装，穿棉加大码的套装，穿棉加大码的套装
							穿棉加大码的套装</p>
						<span>1.00*2</span> 
					</td>
				</tr>
			</table>
			<div class="send">
				<button>发 货</button>
			</div>
			<?php 
				foreach($orders as $order){
			?>
			<table>
				<tr>
					<td colspan="2" class="title">
						<span>订单号：<?php echo $order->order_no;?></span>
						<span>创建时间{<?php echo $order->create_time;?></span>
					</td>
				</tr>
				<tr>
					<td class="product">
						<div class="pric">
							<img src="5.jpg">
						</div>
						<p>穿棉加大码的套装，穿棉加大码的套装，穿棉加大码的套装
							穿棉加大码的套装</p>
						<span>1.00*2</span> 
					</td>
					<td rowspan="2">
						<ul>
							<li>收货信息：</li>
							<li class="value">张三 学府路74号 张三 学府路74号 张三 学府路74号
								张三 学府路74号</li>
							<li>买家选择：</li>
							<li class="value"><?php echo $order->distribution==0?"快递":"自取";?></li>
							<li>物流公司：</li>
							<li class="value"><?php echo $order->express_company;?></li>
							<li>买家留言：</li>
							<li class="value">快点发货</li>
						</ul>
					</td>
				</tr>
			</table>
			<div class="send">
				<button>发 货</button>
			</div>
			
			<?php
				}
			?>
			
		</div>
		<!-- 订单列表结束 -->
	</div>
</body>
</html>