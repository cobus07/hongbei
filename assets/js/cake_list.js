require(['jquery','conda','condd'],function($,conda,condd){
	$(function(){
		$('.query1').on('click',function(){
		var query = $(this).data('query');
		var queryType = query.substring(0,query.indexOf('|'));
		var queryValue = query.substring(query.indexOf('|')+1);
		var url = 'http://localhost/hongbei/index.php/product/cake_list?';				
		url += '&' + queryType + '=' + queryValue;
		location.href = url;
	});

	$('.query').on('click',function(){
		conda(this);
	});
	$('.click').on('click',function(){
			condd(this);
		});
		
		
		
		var oTab = document.getElementById('category');
		var aLi = oTab.getElementsByTagName('li');

			for(var i=0; i<aLi.length; i++){
			aLi[i].index = i;
			aLi[i].onclick = function(){
				for(var i=0; i<aLi.length; i++){
					aLi[i].className = "category1";
				}
				this.className = 'selected';

			};
		}
		
		
		
		
		
		var $oCate = $('#category');
		var $aa = $('#category  a');
		$aa.on('click',function(){
			$(this).children('li').addClass('selected').removeClass('category1');
			$(this).siblings().children('li').addClass('category1').removeClass('selected');
			
		});
	});
	
	
});