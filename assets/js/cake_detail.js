require(['jquery'],function($){
	$(function(){
		// 	选项卡
		$ali = $('.option-bar li');
		$adivs=$('.bottom>div');
		$adivs.hide().eq(0).show();
		$ali.on('click',function(){
			var index=$(this).index();
			if(!$(this).is('.selected')){
				$(this).addClass('selected').siblings().removeClass('selected');
				var $div=$adivs.eq(index);
				$div.show(500).siblings('div').hide(500);
			}
		});
		// 	选项卡结束
		// 	图片选项卡开始
		$alis=$('#ul1 li');
		$imgs=$('.cake-photo > img');
		$imgs.hide().eq(0).show();
		$alis.on('click',function(){
			var index=$(this).index();
			var $img=$imgs.eq(index);
			$img.show().siblings('img').hide();
		});
		//	图片选项卡结束
		//ajax
		$li=$('.size .key');
		$li.removeClass('hover').eq(0).addClass('hover');
		$li.on('click',function(){
			$(this).addClass('hover').siblings().removeClass('hover');
			var size = $(this).children('span').text();
			$('.price').html('');
			$('.number').html('');
			$.get('product/get_cake_by_size',{data: size},function(res){
				console.log(res);
				var html1='<h2>价格</h2>'
						+'<span>￥'+res.normal_price+'</span>'
						+'<h1>促销价</h1>'
						+'<strong>￥'+res.price+'</strong>';
				var html2='<li class="value" style="padding: 0px 14px;">数量 &nbsp;&nbsp;&nbsp;库存'+res.stock+'件</li>';
				$('.price').append(html1);
				$('.number').append(html2);
				
			},'json');
		});
		//评论部分的AJAX
		product_id=$('#use').val();
		//alert(product_id);
		$inputs=$('.comment-nav li input');
		$('.comment').html("");
		$.get('product/get_comment_by_state',{state:'all',p_id:product_id},function(res){
			console.log(res);
			for(var i=0;i<res.length;i++){
						var html='<div ><p>初次评价：'+res[i].comment_content+'</p>'
						  		 +'<span>'+res[i].nickname+'（匿名）</span><br/>';
						  		 $('.comment').append(html);
						for(var j=0;j<res[i].pic.length; j++){
							var html1='<img class="c_img" src="'+res[i].pic[j].picture+'" data-src="'+res[i].pic[j].picture+'"></div>';
							$('.comment').append(html1);
						}
				}	
		},'json');
		$inputs.on('click',function(){
			$('.comment').html("");
			$state = $(this).data('state');
			$.get('product/get_comment_by_state',{state:$state,p_id:product_id},function(res){
				console.log(res);
				for(var i=0;i<res.length;i++){
						var html='<div><p>初次评价：'+res[i].comment_content+'</p>'
						  		 +'<span>'+res[i].nickname+'（匿名）</span><br/>';
						  		 $('.comment').append(html);
						for(var j=0;j<res[i].pic.length; j++){
							var html1='<img class="c_img" src="'+res[i].pic[j].picture_thumb+'" data-src="'+res[i].pic[j].picture+'"></div>';
							$('.comment').append(html1);
						}
				}	
			},'json');
		});
		var $comment=$('.comment');
		$comment.on('click','.c_img',function(){
			alert(111);
		});
		
	});
});
