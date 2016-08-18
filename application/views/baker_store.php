<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>baker_store</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" type="text/css" href="assets/css/baker_store.css">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/backs.css">
</head>
<body>
<?php include "header.php";?>
	<?php include "backs.php";?><?php?>
	<div id="container">
	<?php
			$i=0;
		foreach($categorys as $category){
	?>
		<div class="my-cate">
			<div class="titl">
				<img src="assets/img/line.jpg">
				<a href="product/cake_list?cate1=<?php echo $category -> category_id;?>"><?php echo $category -> category_name;?>系列</a>
				<img src="assets/img/line.jpg">
			</div>
			<div class="cake-list">
			<?php foreach( $results[$i] as $result ){ ?>
			<div class="cake">
				<a href="#"><img class="my-cake" src="<?php echo $result -> picture_thumb;?>"></a>
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
		</div>
		<?php
			$i++; }
		?>
	</div>
</body>
</html>