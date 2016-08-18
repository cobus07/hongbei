<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>主页</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
	<?php include "header.php";?>
</body>
<script src="assets/js/jquery.js"></script>
<script>
	$(function(){
		$('.listd-3').on('click',function(){
			$.post('product/text1',{hongbei: 1},function(data){
				if(data ==  'success'){
					location.href = "personal/person";
				}else{
					alert('您还没有登录！');
				}
			},'text');
		});
		$('.listd-1').on('click',function(){
			$.post('product/text1',{hongbei: 1},function(data){
				if(data ==  'success'){
					location.href = "seller/sel_deal";
				}else{
					alert('您还没有登录！');
				}
			},'text');
		});
		$('.listd-7').on('click',function(){
			$.post('product/text1',{hongbei: 1},function(data){
				if(data ==  'success'){
					location.href = "personal/trolley";
				}else{
					alert('您还没有登录！');
				}
			},'text');
		});
	});
</script>
</html>