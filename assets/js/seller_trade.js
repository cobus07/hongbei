require(['jquery'], function($){
	$(function(){
		$(".tc-nav li:first").addClass('selected');
		$(".tcn-con:first").show();
		$(".tc-nav li").on('click',function(){
			$(".tc-nav li").removeClass('selected');
			$(this).addClass('selected');
			$('.tcn-con').hide();
			var activeTc = $(this).attr("tcn");
			$('#'+activeTc).fadeIn();
		});

	});



});