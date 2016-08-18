define(function(){	
	return function(elem){
		var query = $(elem).data('query');
		var queryType = query.substring(0, query.indexOf('|'));
		var queryValue = query.substring(query.indexOf('|')+1);
		var url = location.href + (location.search.length>0?'':'?');
		if(location.search.indexOf(queryType) == -1){
			url += '&' + queryType + '=' + queryValue;
		}else{
			var re = new RegExp(queryType+'='+'[^&]+', 'ig');
			url = url.replace(re, queryType+'='+queryValue);
		}
		location.href = url;
		return false;
	};
});