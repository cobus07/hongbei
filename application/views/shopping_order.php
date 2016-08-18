<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url()?>">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backg.css">
	<link rel="stylesheet" href="assets/css/left_nav.css">
	<link rel="stylesheet" href="assets/css/shopping-order.css">
</head>
<body>
	<?php include "header.php";?>
	<?php include "backg.php";?>

<div id="container">
	<div class="leftnn" style="position: absolute; margin-top: 91px; margin-left: 20px;">
		<?php include "left_nav.php";?>
	</div>
	<div id="order">
		<div class="search">
			<div class="search-tip">
			</div>
			<input class="search-box" type="text" value="搜索你的订单...">
		</div>
		<ul class="order-menu">
			<li class="all-order-head selected">所有购物订单<span class="news-num">1</span></li>
			<li class="no-pay-head">待付款<span class="news-num">1</span></li>
			<li class="no-receive-head">待收货<span class="news-num">1</span></li>
			<li class="no-judge-head">待评价<span class="news-num">1</span></li>
			<li class="order-recover-head">订单回收站<span class="news-num">1</span></li>
		</ul>
		<div class="all-order">
			<table class="order-list">
				<!-- 商品表头 -->
				<tr class="order-list-head" style=" height:47px;">
					<td style="text-align:center; width:304px;">宝贝</td>
					<td style="text-align:center; width:86px;">单价(元)</td>
					<td style="text-align:center; width:52px;">数量</td>
					<td style="text-align:center; width:92px;">商品操作</td>
					<td style="text-align:center; width:98px;">实付款(元)</td>
					<td style="text-align:center; width:98px;">交易状态</td>
					<td style="text-align:center; width:98px;">交易操作</td>
				</tr>
			</table>
		</div>
		<div class="no-pay">
			<table class="order-list">
				<!-- 商品表头 -->
				<tr class="order-list-head">
					<td style="text-align:center; width:304px;">宝贝</td>
					<td style="text-align:center; width:86px;">单价(元)</td>
					<td style="text-align:center; width:52px;">数量</td>
					<td style="text-align:center; width:92px;">商品操作</td>
					<td style="text-align:center; width:98px;">实付款(元)</td>
					<td style="text-align:center; width:98px;">交易状态</td>
					<td style="text-align:center; width:98px;">交易操作</td>
				</tr>
			</table>
		</div>
		<div class="no-take-goods">
			<table class="order-list">
				<!-- 商品表头 -->
				<tr class="order-list-head">
					<td style="text-align:center; width:304px;">宝贝</td>
					<td style="text-align:center; width:86px;">单价(元)</td>
					<td style="text-align:center; width:52px;">数量</td>
					<td style="text-align:center; width:92px;">商品操作</td>
					<td style="text-align:center; width:98px;">实付款(元)</td>
					<td style="text-align:center; width:98px;">交易状态</td>
					<td style="text-align:center; width:98px;">交易操作</td>
				</tr>
			</table>
		</div>
		<div class="no-judge">
			<table class="order-list">
				<!-- 商品表头 -->
				<tr class="order-list-head">
					<td style="text-align:center; width:304px;">宝贝</td>
					<td style="text-align:center; width:86px;">单价(元)</td>
					<td style="text-align:center; width:52px;">数量</td>
					<td style="text-align:center; width:92px;">商品操作</td>
					<td style="text-align:center; width:98px;">实付款(元)</td>
					<td style="text-align:center; width:98px;">交易状态</td>
					<td style="text-align:center; width:98px;">交易操作</td>
				</tr>
			</table>
		</div>
		<div class="order-recover">
			<table class="order-list">
				<!-- 商品表头 -->
				<tr class="order-list-head">
					<td style="text-align:center; width:304px;">宝贝</td>
					<td style="text-align:center; width:86px;">单价(元)</td>
					<td style="text-align:center; width:52px;">数量</td>
					<td style="text-align:center; width:92px;">商品操作</td>
					<td style="text-align:center; width:98px;">实付款(元)</td>
					<td style="text-align:center; width:98px;">交易状态</td>
					<td style="text-align:center; width:98px;">交易操作</td>
				</tr>
				<tr class="del-order-head">
					<td style="text-indent:20px;" colspan="7">
						<input class="all-check" type="checkbox" name="check">
						全选 <input class="some-del" type="submit" value="批量永久删除">
						<input class="some-rest" type="submit" value="批量还原">
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div id="btn-load">加载更多。。。。。。。</div>
<div id="mask" style="width: 831px; height: 500px; background: #ccc;">load。。。。。。。。</div>
<script id="myOrder" type="text/template">
	<tr class="order-num">
		<%if(is_recycle == 0){%>
		<td style="text-indent:20px;">
			<%= order_date%> 订单号：<%= order_no%>
		</td>
		<%}else{%>
		<td style="text-indent:20px;">
			<input class="check-order" type="checkbox" name="operate">
			<%= order_date%> 订单号：<%= order_no%>
		</td>
		<%}%>
		<td colspan="2" style="text-align:center;"><%= nickname%></td>
		<td colspan="3" style="height:23px; text-align:left;">
			<span class="contact-seller"><a href="#">联系卖家</a></span>
		</td>
		<%if((order_state == 4|| order_state == 5) && is_recycle == 0){%>
		<td class="del-btn"></td>
		<%}else if((order_state == 4|| order_state == 5 )&& is_recycle == 1){%>
		<td class="rel-del-btn"></td>
		<%}else{%>
		<td></td>
		<%}%>
	</tr>
	<tr class="cake-order">
		<td style="text-indent:20px;">
			<span class="cake-img"><img src="assets/img/cake1.jpg" alt=""></span>
			<p class="cake-order-style"><a href="#"><%= items[0].product_introduce%></a></p>
			<p class="cake-kind cake-order-style">种类：<%= items[0].product_name%></p>
		</td>
		<td><p>0.75</p></td>
		<td><p>1</p></td>
		<td>
			<p><a href="#">退运费险<br>投诉买家</a></p></td>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>11.99</p><p>(运费:0.00)</p>
		</td>
		<%if(order_state == 0){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>等待买家付款</p><p><a href="#">订单详情</a></p>
		</td>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p class="pay-order"><a href="#">立即付款</a></p><p><a href="#">取消订单</a></p>
		</td>
		<%}else if(order_state == 2){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>物流运输中</p><p><a href="#">订单详情</a></p><p><a href="#">查看物流</a></p>
		</td>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>剩余12天19时</p><p class="receive"><a href="#">确认收货</a></p>
		</td>
		<%}else if(order_state == 3){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>物流运输中</p><p><a href="#">订单详情</a></p><p><a href="#">查看物流</a></p><p><a href="#">双方评价</a></p>
		</td>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p><a href="#">评价</a></p>
		</td>
		<%}else if(order_state == 4){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p><a href="#">交易关闭<br>评价完成<br>订单详情</a></p>
		</td>
		<%if(is_recycle == 0){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p><a href="#" class="recover-order">追加评价</a></p>
			<p class="buy-again"><a href="#">再次购买</a></p>
		</td>
		<%}else{%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>还原订单</p>
		</td>
		<%}%>
		<%}else if(order_state == 5){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p><a href="#">交易关闭<br>评价完成<br>订单详情</a></p>
		</td>
		<%if(is_recycle == 0){%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p><a href="#" class="recover-order">追加评价</a></p>
			<p class="buy-again"><a href="#">再次购买</a></p>
		</td>
		<%}else{%>
		<td rowspan="<%=items.length%>" style=" border-left:1px solid #f3fbff;">
			<p>还原订单</p>
		</td>
		<%}%>
		<%}%>
	</tr>
	<% for(var i=1; i<items.length; i++) { %>
	<tr class="cake-order">
		<td style="text-indent:20px;">
			<span class="cake-img"><img src="assets/img/cake1.jpg" alt=""></span>
			<p class="cake-order-style"><a href="#"><%= items[i].product_introduce%></a></p>
			<p class="cake-kind cake-order-style">种类：<%= items[i].product_name%></p>
		</td>
		<td><p>0.75</p></td>
		<td><p>1</p></td>
		<td>
			<p><a href="#">退运费险<br>投诉买家</a></p>
		</td>
	</tr>
	<% } %>
</script>
<script src="assets/js/require.js" data-main="assets/js/shopping_order.js"></script>
</body>
</html>