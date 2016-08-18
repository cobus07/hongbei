/**
 * @author Administrator
 */
require(['jquery'],function($){
	$(function(){
		$('.btn1').on('click',function(){
			if($(this).attr('active') == 'act'){
				var perSign = $('.aa + input').val();
				$.post('seller/cha_sign',{gx: perSign},function(data){
					if(data = 'success'){
						$('.aa').text(perSign).show();
						$('input').prop('type','hidden');
						$('.btn1').removeAttr('active');
					}else{
						alert('修改失败！');
					}
				},'text');				
			}else{
				var perSign = $('.aa').text();	
				$('.aa').hide();
				$('.aa + input').prop({'type':'text'}).val(perSign);
				$(this).attr('active','act');
			}
			
		});
		
	$(function(){
		$('.btn2').on('click',function(){
			if($(this).attr('active') == 'act'){
				var perSign = $('.bb + input').val();
				$.post('seller/cha_addr',{receiv: perSign},function(data){
					if(data = 'success'){
						$('.bb').text(perSign).show();
						$('input').prop('type','hidden');
						$('.btn2').removeAttr('active');
					}else{
						alert('修改失败！');
					}
				},'text');				
			}else{
				var perSign = $('.bb').text();	
				$('.bb').hide();
				$('.bb + input').prop({'type':'text'}).val(perSign);
				$(this).attr('active','act');
			}
			
		});
			
	});
	
	
	});
	
});