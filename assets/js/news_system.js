require(['jquery','search'],function($,search){

	//搜索框
	search();

	$.get('personal/ajax_index',function(data){
		for(var i=0;i<data.sysnews.length;i++){
			var sysnew = data.sysnews[i];
			var content = (sysnew.content).length<30?sysnew.content:(sysnew.content).substr(0,30)+'...';
			html='<li class="list">'
					+'<div class="system-content">'
						+'<div class="news-list-img">'
							+'<a href=""><img src="uploads/user/20151229/news_photo.jpg"></a>'
						+'</div>'
						+'<div class="news-list-content">'
							+'<h3>'+sysnew.title+'</h3>'
							+'<p><a href="">'+content+'</a></p>'
						+'</div>'
					+'</div>'
					+'<ul class="news-list-reply">'
						+'<li class="see-more" data-id="'+sysnew.message_id+'"><a href="javascript:;">查看全文</a></li>'
						+'<li class="delete"><a href="javascript:;">删除</a></li>'
					+'</ul>'
				+'</li>';
			$('.news-list').append(html);
		}
		html1='<li class="news-system"><a href="personal/system" class="news">消息系统</a></li>'
				+'<li class="news-reply"><a href="personal/reply" class="news">评论</a><span><a href="news_reply/reply" class="count">1</a><i></i></span></li>'
				+'<li class="news-friend"><a href="personal/friend?sys=1&reply=2" class="news">好友消息</a><span><a href="news_friend/friend" class="count">'+data.fri_total+'</a><i></i></span></li>';
		$('.tab').append(html1);

		//单击tab 将未读消息的type全部更新为1（已阅读）
		//$('.tab li').on('click',function(){
		//	$that = $(this);
		//	$.post('news_system/update_read',{user_id:1},function(res){
		//		if(res=='success'){
		//			$that.className('news-system').;
		//		}
		//	},'text');
		//});

		//删除框hover样式改变
		$seeMore = $('.news-list .news-list-reply li');
		$seeMore.hover(function(){
			$(this).css(
					'backgroundColor','#ccc'
			)
		},function(){
			$(this).css(
					'backgroundColor','#fff'
			)
		});
		//查看全文
		$(".see-more").on('click',function(){
			$that = $(this);
			$.get("personal/ajax_select_by_id",{message_id: $(this).data('id')},function(data){
				html2 ='<div class="system-content">'
								+'<div class="news-list-img">'
									+'<a href=""><img src="uploads/user/20151229/news_photo.jpg"></a>'
								+'</div>'
								+'<div class="news-list-content">'
									+'<h3>'+data.row.title+'</h3>'
									+'<p><a href="">'+data.row.content+'</a></p>'
								+'</div>'
							+'</div>'
							+'<ul class="news-list-reply">'
								+'<li class="see-more" data-id="'+sysnew.message_id+'"><a href="javascript:;">查看全文</a></li>'
								+'<li class="delete"><a href="javascript:;">删除</a></li>'
							+'</ul>';
				$that.parents('.list').children().remove().end().append(html2);
				$seeMore = $('.news-list .news-list-reply li');
				$seeMore.hover(function(){
					$(this).css(
							'backgroundColor','#ccc'
					)
				},function(){
					$(this).css(
							'backgroundColor','#fff'
					)
				});
				$('.delete').on('click',function(){
					$that = $(this);
					confirm("确定删除此条系统消息吗？");
					$.get('personal/del_system',{message_id:sysnew.message_id},function(res){
						if(res=="success"){
							$that.parents('.list').fadeOut(function(){
								$(this).remove();
							});
							console.log(sysnew.message_id);
						}else {
							alert("请重新删除");
							console.log(sysnew.message_id);
						}
					},'text');
				});
			},'json');
		});
		//确认是否删除
		$('.delete').on('click',function(){
			$that = $(this);
			confirm("确定删除此条系统消息吗？");
			$.get('personal/del_system',{message_id:sysnew.message_id},function(res){
				if(res=="success"){
					$that.parents('.list').fadeOut(function(){
						$(this).remove();
					});
					console.log(sysnew.message_id);
				}else {
					alert("请重新删除");
					console.log(sysnew.message_id);
				}
			},'text');
		});
	},'json');
});
