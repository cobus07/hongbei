require(['jquery'],function($){
	$(function(){
		$('.btn1').on('click',function(){
			//console.log($(this));
			if($(this).attr('active') == 'act'){
				var perSign = $('.aa + input').val();
				$.post('user/cha_sign',{per_sign: perSign},function(data){
					if(data = 'success'){
						
						$('.aa').text(perSign).show();
						$('input').prop('type','hidden');
						//console.log($('.btn1'));
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
				//console.log($(this));
			}
			
		});
		
		
		
		$('.btn2').on('click',function(){
			if($(this).attr('active') == 'act'){
				var recAddr = $('.bb + input').val();
				$.post('user/cha_addr',{rec_addr: recAddr},function(data){
					if(data = 'success'){
						$('.bb').text(recAddr).show();
						$('input').prop('type','hidden');
						$('.btn2').removeAttr('active');
					}else{
						alert('修改失败！');
					}
				},'text');				
			}else{
				var recAddr = $('.bb').text();	
				$('.bb').hide();
				$('.bb + input').prop({'type':'text'}).val(recAddr);
				$(this).attr('active','act');
			}
			
		});
	});
	
	
	
	
});
