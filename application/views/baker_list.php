<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛋糕师列表</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/baker_list.css">
</head>
<body>
	<?php include "header.php";?>
	<div class="ser">
		<img src="assets/img/hongbei_logo.png" alt="">
		<form action="">
			<div class="sf-1">
				<h3 class="sf1-1">烘焙师</h3>
				<ul>
					<li><a href="product/prod_list">产品</a></li>
				</ul>
			</div>
			<input type="text" value="搜索你想找的烘焙师..." onFocus="if(value==defaultValue){value='';}" onBlur="if(!value){value=defaultValue;}">
			<button type="button">搜&nbsp;&nbsp;&nbsp;索</button>
		</form>	
	</div>
	<div class="container">
		<div class="content">
			<div class="c-span">
					<a href="javascript:;">所有分类 &gt;</a>
					<span></span>
			</div>

			<ul id="tab">
				<li class="tab-1" tab="tab1">综合排序</li>
				<li class="tab-2" tab="tab2">销&nbsp;量</li>
				<li class="tab-3" tab="tab3">信&nbsp;用</li>
				<li class="tab-4" tab="tab4">价&nbsp;格</li>
				<li class="tab-5">&lt; 1/100 &gt;</li>
			</ul>
			<div class="tab-con">
				<div class="tab-c" id="tab1">
					<table class="tc-table">
<!--						<tr class="tt-1">-->
<!--							<td class="tt1-1">-->
<!--								<img src="img/cake5.png" alt="">-->
<!--								<span>销量4814</span>-->
<!--							</td>-->
<!--						</tr>-->

<!--						<tr class="tt-1">-->
<!--							<td class="tt1-1">-->
<!--								<img src="img/cake5.png" alt="">-->
<!--								<span>销量4814</span>-->
<!--							</td>-->
<!--							<td class="tt1-2">-->
<!--								<span class="tt12-1">小宝烘焙店铺</span><br />-->
<!--								<span class="tt12-2">小李烘焙师</span><br />-->
<!--								<span class="tt12-3">-->
<!--									共544件商品-->
<!--								</span>-->
<!--							</td>-->
<!--							<td class="tt1-3">-->
<!--								<div>-->
<!--									<img src="img/bld.png" alt="">-->
<!--									<span>超正宗甜品</span>-->
<!--								</div>-->
<!--							</td>-->
<!--							<td class="tt1-3">-->
<!--								<div>-->
<!--									<img src="img/bld.png" alt="">-->
<!--									<span>超正宗甜品</span>-->
<!--								</div>-->
<!--							</td>-->
<!--							<td class="tt1-3">-->
<!--								<div>-->
<!--									<img src="img/bld.png" alt="">-->
<!--									<span>超正宗甜品</span>-->
<!--								</div>-->
<!--							</td>-->
<!--							<td class="tt1-3">-->
<!--								<div>-->
<!--									<img src="img/bld.png" alt="">-->
<!--									<span>超正宗甜品</span>-->
<!--								</div>-->
<!--							</td>-->
<!--						</tr>-->
					</table>
				</div>
				<div class="tab-c" id="tab2">
					1
				</div>
				<div class="tab-c" id="tab3">
					2
				</div>
				<div class="tab-c" id="tab4">
					3
				</div>
			</div>
		</div>
		<div class="right-sidebar">
			<strong><span class="tit">蛋糕热卖</span></strong>
			
			<div class="hot-cake">
				<img src="uploads/cake/20151215/cake1.png" alt="">
				<div class="des">
					<span class="des-1">￥190.00</span>
					<span class="des-2">销量:  2890</span>
				</div>
			</div>
			<div class="hot-cake">
				<img src="uploads/cake/20151215/cake1.png" alt="">
				<div class="des">
					<span class="des-1">￥190.00</span>
					<span class="des-2">销量:  2890</span>
				</div>
			</div>
			<div class="hot-cake">
				<img src="uploads/cake/20151215/cake1.png" alt="">
				<div class="des">
					<span class="des-1">￥190.00</span>
					<span class="des-2">销量:  2890</span>
				</div>
			</div>
			<div class="hot-cake">
				<img src="uploads/cake/20151215/cake1.png" alt="">
				<div class="des">
					<span class="des-1">￥190.00</span>
					<span class="des-2">销量:  2890</span>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/require.js" data-main="assets/js/baker_list"></script>
</body>
</html>