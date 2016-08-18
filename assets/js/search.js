define(['jquery'],function($){
	return function search(){
		//搜索框
		$search = $('.search input');
		$search.on('focus',function(){
			this.value = "";
		}).on('blur',function(){
			if(this.value == ""){
				this.value = this.defaultValue;
			}
		});
	}
});