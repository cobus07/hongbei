require(['jquery', 'pager'], function($, Pager){
	order({recycle:0,container:'.all-order tbody',url:'personal/check_order_and_product'});
	$('.all-order-head').on('click', function(){
		if(!$(this).is('.selected')) {
			$('.all-order tbody').children().first().siblings().remove();
			order({recycle:0,container:'.all-order tbody',url:'personal/check_order_and_product'});
		}
	});
	$('.no-pay-head').on('click', function(){
		if(!$(this).is('.selected')) {
			$('.no-pay tbody').children().first().siblings().remove();
			order({state:2,recycle:0,container:'.no-pay tbody',url:'personal/check_order_and_product_by_state'});
		}
	});
	$('.no-receive-head').on('click', function(){
		if(!$(this).is('.selected')) {
			$('.no-take-goods tbody').children().first().siblings().remove();
			order({state:3,recycle:0,container:'.no-take-goods tbody',url:'personal/check_order_and_product_by_state'});
		}
	});
	$('.no-judge-head').on('click', function(){
		if(!$(this).is('.selected')) {
			$('.no-judge tbody').children().first().siblings().remove();
			order({state:4,recycle:0,container:'.no-judge tbody',url:'personal/check_order_and_product_by_state'});
		}
	});
	$('.order-recover-head').on('click', function(){
		if(!$(this).is('.selected')) {
			$('.del-order-head').nextAll().remove();
			order({recycle:1,container:'.order-recover tbody',url:'personal/check_order_and_product'});
		}
	});
	function order (options){
		var pager = new Pager();
		pager.init({
			url:options.url,
			data: {
				id: 7,
				state:options.state,
				recycle:options.recycle
			},
			loadBtn: '#btn-load',
			container: options.container,
			pageNum: 2,
			template: $('#myOrder').html(),
			isMask:false,
			maskContainer:'tbody',
			maskClass:'#mask'
		});
	}
	$('.order-list').on('click','.del-btn',function(){
		$(this).parents('tr').nextUntil('.order-num').remove().end().remove();

	});
	$('.order-list').on('click','.rel-del-btn',function(){
		$(this).parents('tr').nextUntil('.order-num').remove().end().remove();
	});
	$aLi = $('.order-menu li');
	$adivs = $('.order-menu').nextAll('div');
	$adivs.hide().eq(0).show();
	$('.order-menu .selected').children().hide();
	$aLi.on('click', function(){
		var index = $(this).index();
		if(!$(this).is('.selected')){
			$(this).addClass('selected').siblings().removeClass('selected');
			$div = $adivs.eq(index);
			$div.show().siblings('div').hide().first().show();
			$(this).children().hide();
		}
	});
	$searchBox = $(".search .search-box");
	$searchBox.focus(function(){
		$(this).addClass('focus');
		if($(this).val() == this.defaultValue){
			this.value = "";
		}
	}).blur(function(){
		$(this).removeClass('focus').val(this.value == ""?this.defaultValue:this.value);
	});

	$(".all-check").on('click', function(){
		if(this.checked){				 //如果当前点击的多选框被选中
			$('input[type=checkbox][name=operate]').prop("checked", true );
		}else{
			$('input[type=checkbox][name=operate]').prop("checked", false );
		}
	});
});

