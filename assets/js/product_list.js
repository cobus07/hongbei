require(['jquery','conda','condd'], function($, conda,condd){

    $(function(){
		$('.query').on('click', function(){
			conda(this);
		});
		$('.cate-click').on('click',function(){
			condd(this);
		});

		$('.sf-1').hover(function(){
			$('.sf1-1 + ul').css({'border-bottom':'2px solid #a988d0','border-left':'2px solid #a988d0','border-right':'2px solid #a988d0'}).show();
			$(this).css({'height':'35px'});
			$('.sf1-1').css({'border-bottom':'none'});
		},function(){
			$('.sf1-1 + ul').css({'border-bottom':'none','border-left':'none','border-right':'none'}).hide();
			$(this).css({'height':'30px'});
			$('.sf1-1').css({'border-bottom':'2px solid #a988d0'});
		});


	});

});