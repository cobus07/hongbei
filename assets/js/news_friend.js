require(['jquery','search'],function($,search){
	//搜索框
	search();
	// 回复框显示隐藏
	$downUp = $('.news-list .news-list-date i');
	$downUp.on('click',function(){
		$(this).parent('span').next().slideToggle(200);
		return false;
	});
	$('html').on('click', function(){
		$downUp.parent('span').next().slideUp(200);
	});

	// 回复框hover样式改变
	$reply = $('.news-list .news-list-date .news-list-reply a');
	$reply.hover(function(){
		$(this).css(
			'backgroundColor','#ccc'
		)
	},function(){
		$(this).css(
			'backgroundColor','#fff'
		)
	});

	//判断从哪个页面跳转到此页
	//if(('a.news').data('reply')==2){
	//	$(this).parents('.news-reply').find('.count').remove();
	//}
	//if(('a.new').data('sys')==1){
	//	$(this).parents('.new-system').find('.count').remove();
	//}
	//	ajax 回复
	$('.reply').on('click',function(){
		$that = $(this);
		if(!$that.is('.selected')) {
			$that.addClass("selected");
			$.get('personal/receive_friend', {message_id: $(this).data('id')}, function (res) {
				html3 = '<div class="reply-friend">'
						+ '<input name="reply" type="text">'
						+ '<input name="sub" type="button" value="回复">'
						+ '</div>';
				$that.parents('.news-list-date').prev().append(html3);
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
					$.get('news/reply_frinews', {
						receiver_id : res.receiver_id,
						reply_content : res.content,
						sender_id : res.sender_id
					}, function (re) {
						alert(123);

						if (re == "success") {
							$('[name="reply"]').val("");
							alert("发送成功");
						} else {
							alert("发送失败，请重新发送");
						}
					},'text');
				});
			}, 'json');
		}
	})
});
