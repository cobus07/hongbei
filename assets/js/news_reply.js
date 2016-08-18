require(['jquery','search'],function($,search){
	// 搜索框
	search();
	// over回复框显示隐藏
	$downUp = $('.news-list .news-list-content p.host i');
	$upDown = $('.news-list .news-list-reply .see-more');
	$downUp.on('click',function(){
		$(this).parent('.host').siblings('.over-reply').slideToggle(200);
	});
	$upDown.on('click',function(){
		$(this).parent('.news-list-reply').siblings('.reply-content').find('.over-reply').slideToggle(200);
	});

	//删除框hover样式改变
	setTimeout(function(){
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
	},1000);
	//ajax 回复
	$('.news-list-reply .reply').on('click',function(){
		$that = $(this);
		$that = $(this);
		if(!$that.is('.selected')) {
			$that.addClass("selected");
			$.get('personal/receive_friend', {message_id: $(this).data('id')}, function (res) {
				html3 = '<div class="reply-friend">'
						+ '<input name="reply" type="text">'
						+ '<input name="sub" type="button" value="回复">'
						+ '</div>';
				$that.parent('.news-list-reply').prev().prev().append(html3);
				console.log(res);
				$('[name="reply"]').on('focus', function () {
					$('.reply-friend').append('<span class="font">(60字以内)</span>');
				});
				$('[name="reply"]').on('blur', function () {
					$('.reply-friend').fadeOut(function () {
						$(this).remove();
					});
					$that.removeClass('selected');
				});
				$('[name="sub"]').on('click', function () {
					console.log(res);
					$.get('personal/reply_frinews', {
						receiver_id: res.receiver_id,
						reply_content: res.content,
						sender_id: res.sender_id
					}, function (re) {
						alert(123);

						if (re == "success") {
							$('[name="reply"]').val("");
							alert("发送成功");
						} else {
							alert("发送失败，请重新发送");
						}
					}, 'text');
				});
			}, 'json');
		}
	})
});
