define(function(){	
		return function(elem){
			var query = $(elem).data('query');
			var queryType = query.substring(0, query.indexOf('|'));
			var queryValue = query.substring(query.indexOf('|')+1);
			var url = location.href;
			var re = new RegExp('&'+queryType+'='+'[^&]+', 'ig');
			url = url.replace(re,"");
			if(location.search.length >= 8 && location.search.length <= 14){
				url = url.replace(/\?/,"");
			}
			$(this).remove();
			location.href = url;
			return false;
		};
		
});