<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>交易管理</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/seller_trade.css">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backs.css">
	<link rel="stylesheet" href="assets/css/seller_header.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backs.php";?>
	<div class="container">
		<div class="showd"></div>
		<?php include "seller_header.php";?>

		<div class="content">
			<div class="left-nav">
				<div class="ln-1"><span>交易管理</span></div>
				<div class="ln-2">
					<a href="#"><span class="ln-2-1" tac="tac1">已卖出宝贝&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&gt;</span></a>
					<a href=""><span class="ln-2-2">评价管理</span></a>
				</div>
			</div>
			<div class="tac-con">
				<div class="sec-order">
					<div class="sec-nav">
						<span>订单查询</span>
					</div>
					<div class="sec-table">
						<form action="">
							<table>
								<tr class="st-1"><td>宝贝名称：</td><td><input type="text"></td></tr>

								<tr class="st-1"><td>订单编号：</td><td><input type="text"></td></tr>

								<tr class="st-3"><td>成交时间：</td><td><input type="text">&nbsp;日&nbsp;到&nbsp;<input type="text"></td></tr>

								<tr class="st-2"><td></td><td><button type="submit">搜索</button></td></tr>
							</table>
						</form>					
					</div>				
				</div>

				<div class="tc-content">
					<ul class="tc-nav">
						<li tcn="tcn1"><a href="javascript:;">近三个月订单</a></li>
						<li tcn="tcn2"><a href="javascript:;">等待买家付款</a></li>
						<li tcn="tcn3"><a href="javascript:;">等待发货</a></li>
						<li tcn="tcn4"><a href="javascript:;">已发货</a></li>
						<li tcn="tcn5"><a href="javascript:;">退款中</a></li>
						<li tcn="tcn6"><a href="javascript:;">需要评价</a></li>
						<li tcn="tcn7"><a href="javascript:;">成功的订单</a></li>
					</ul>
				
					<div class="tc-con">
						<div class="tcn-con" id="tcn1">
							<table class="tcn-table">

								<tr class="tt-1">
									<td colspan="2">宝贝</td>
									<td>单价(元)</td>
									<td>数量</td>
									<td>商品操作</td>
									<td>实付款(元)</td>
									<td>交易状态</td>
									<td>交易操作</td>
								</tr>

								<tr><td style="height: 10px;" colspan="8"></td></tr>
								<tr class="tt-2">
									<td class="tt2-1" colspan="2">
										<span>2016-1-3</span>
										<span>订单编号：651616516512132165</span>
									</td>
									<td colspan="6">成交时间：2016年1月3日9点</td>
								</tr>
								<tr class="tt-3">
									<td class="tt3-1">
										<div>
											<img src="uploads/cake/20151215/cake5.png" alt="">
										</div>
										
									</td>
									<td class="tt3-2">
										<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
										<p>种类 : 水果蛋糕</p>
									</td>
									<td class="tt3-3"><span>0.75</span></td>
									<td class="tt3-4"><span>1</span></td>
									<td class="tt3-5"><span>联系买家</span></td>
									<td  class="tt3-6" rowspan="2";>
										<ul class="td-2">
											<li>11.99</li>
											<li>(运费:0.00)</li>
										</ul>
									</td>
									<td class="tt3-7" rowspan="2">
										<ul class="td-3">
											<li>物流运输中</li>
											<li>订单详情</li>
											<li>查看物流</li>
											<li>双方评价</li>
										</ul>
									</td>
									<td class="tt3-8" rowspan="2">
										<ul class="td-4">
											<li>买家已付款</li>
											<li>发货</li>
										</ul>
									</td>
								</tr>
								<tr class="tt-3">
									<td class="tt3-1">
										<div>
											<img src="uploads/cake/20151215/cake5.png" alt="">
										</div>
										
									</td>
									<td class="tt3-2">
										<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
										<p>种类 : 水果蛋糕</p>
									</td>
									<td class="tt3-3"><span>0.75</span></td>
									<td class="tt3-4"><span>1</span></td>
									<td class="tt3-5"><span>联系买家</span></td>
								</tr>

								<tr><td style="height: 10px;" colspan="8"></td></tr>
								<tr class="tt-2">
									<td class="tt2-1" colspan="2">
										<span>2016-1-3</span>
										<span>订单编号：651616516512132165</span>
									</td>
									<td colspan="6">成交时间：2016年1月3日9点</td>
								</tr>
								<tr class="tt-3">
									<td class="tt3-1">
										<div>
											<img src="uploads/cake/20151215/cake5.png" alt="">
										</div>
										
									</td>
									<td class="tt3-2">
										<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
										<p>种类 : 水果蛋糕</p>
									</td>
									<td class="tt3-3"><span>0.75</span></td>
									<td class="tt3-4"><span>1</span></td>
									<td class="tt3-5"><span>联系买家</span></td>
									<td  class="tt3-6" rowspan="2";>
										<ul class="td-2">
											<li>11.99</li>
											<li>(运费:0.00)</li>
										</ul>
									</td>
									<td class="tt3-7" rowspan="2">
										<ul class="td-3">
											<li>物流运输中</li>
											<li>订单详情</li>
											<li>查看物流</li>
											<li>双方评价</li>
										</ul>
									</td>
									<td class="tt3-8" rowspan="2">
										<ul class="td-4">
											<li>买家已付款</li>
											<li>发货</li>
										</ul>
									</td>
								</tr>
								<tr class="tt-3">
									<td class="tt3-1">
										<div>
											<img src="uploads/cake/20151215/cake5.png" alt="">
										</div>
										
									</td>
									<td class="tt3-2">
										<p>秒杀哦3.9包邮超好吃纯芝士奶油巧克力蛋糕特别好吃哦</p>
										<p>种类 : 水果蛋糕</p>
									</td>
									<td class="tt3-3"><span>0.75</span></td>
									<td class="tt3-4"><span>1</span></td>
									<td class="tt3-5"><span>联系买家</span></td>
								</tr>
							</table>

							<div style="height: 20px;"></div>
						</div>
						<div class="tcn-con" id="tcn2">
							2
						</div>
						<div class="tcn-con" id="tcn3">
							3
						</div>
						<div class="tcn-con" id="tcn4">
							4
						</div>
						<div class="tcn-con" id="tcn5">
							5
						</div>
						<div class="tcn-con" id="tcn6">
							6
						</div>
						<div class="tcn-con" id="tcn7">
							7
						</div>
					</div>
					
				</div>



			</div>

		</div>
	</div>

	


	<script src="assets/js/require.js" data-main="assets/js/seller_trade"></script>
</body>
</html>