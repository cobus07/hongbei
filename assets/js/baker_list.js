require(['jquery'],function($){
	$(function(){
		//搜索框 开始
		$('.sf-1').hover(function(){
			$('.sf1-1 + ul').css({'border-bottom':'2px solid #a988d0','border-left':'2px solid #a988d0','border-right':'2px solid #a988d0'}).show();
			$(this).css({'height':'35px'});
			$('.sf1-1').css({'border-bottom':'none'});
		},function(){
			$('.sf1-1 + ul').css({'border-bottom':'none','border-left':'none','border-right':'none'}).hide();
			$(this).css({'height':'30px'});
			$('.sf1-1').css({'border-bottom':'2px solid #a988d0'});
		});

	 	//选项卡 开始
		$('#tab li:first').addClass('selected');
		$('.tab-c:first').show();
		$('#tab li:lt(4)').on('click',function(){
			//if(!$(this).is('.selected'))


			$('#tab li:lt(4)').removeClass('selected');
			$(this).addClass('selected');
			$('.tab-c').hide();
			var activeTab = $(this).attr('tab');
			$('#'+activeTab).fadeIn();
		});

		//瀑布流 开始
		var $table = $('.tc-table');
		var iClass=0;//给每个tr起不同的class 然后对应的将每个店铺的蛋糕插入
		var bStop = false;//标识位，用来标识当前数据是否加载完毕
		var bEnd = false;//标识位，用来标识数据库中的数据是否全部加载完毕
		var iPage = 1;
		function loadData(){
			//url, data, callback, type
			$.get('product/get_bakers', {page: iPage++}, function(res){
				console.log(res);
				//setTimeout(function(){
					for(var i=0; i<res.length; i++){
						$('.c-span span').text('共'+res[i].count+'家店铺');
						var prod = res[i];
						bEnd = res[i].isEnd;
						var html =	'<tr class="tt-'+iClass+'">'
										+'<td class="tt1-1">'
										+'<img src="'+res[i].user_pic_thumb+'" alt="">'
										+'<span>销量'+res[i].sales[0].sales+'</span>'
										+'</td>'
										+'<td class="tt1-2">'
										+'<span class="tt12-1">'+res[i].store_name+'</span><br />'
										+'<span class="tt12-2">'+res[i].realname+'</span><br />'
										+'<span class="tt12-3">共'+res[i].prods[0].prods+'件商品</span>'
										+'</td>'
										+'</tr>';
						$table.append(html);
						for(var j=0; j<res[i].product.length; j++){
							var html1 = '<td class="tt1-3">'
										+'<div>'
										+'<img src="'+res[i].product[j].picture_thumb+'" alt="">'
										+'<span>'+res[i].product[j].product_name+'</span>'
										+'</div>'
										+'</td>';
							$('.tt-'+iClass).append(html1);
						}
						iClass++;
					}
					bStop = true;
				//}, 2000);
			}, 'json');
		}

		loadData();

		$(window).on('scroll', function(){
			var iScollTop = $(window).scrollTop(),
					iWinHeight = $(window).height();

			if(iScollTop+iWinHeight >= $table.height()+300 && bStop && !bEnd){
				loadData();
				bStop = false;
			}

		});







	});//文档就绪函数
});//require.js
