$(function(){
	/*
	**container-collect中文本框获取焦点事件
	**container-collect-nav中下面的input
	**主要判断文本框中的值从而做出一些操作
	 */
	var val="搜索你的收藏...";//定义全局的val值为input中默认的vlaue值
	$(".container-collect-nav input").focus(function(){//文本框获取焦点事件
			//判断文本框的输入的值是否和文本框默认值相同若相同input输入值为空
			if(this.value == val){
				this.value="";
			}
	}).blur(function(){//文本框失去焦点事件
		//判断文本框的值是否为空，若为空则还原默认值
		if(this.value =="")
		this.value=val;
	});
	
	/*
	**container-collect-list下点击事件
	**container-collect-container下选项卡事件
	 */
	$(".container-collect-list li").on("click",function(){//选项卡nav点击事件
		var index = $(this).index();//把当前点击nav的索引缓存起来
		$(this).addClass('selected')//当前点击结点添加class事件
			.siblings()//选取当前所有除自己以外的所有兄弟结点
			.removeClass('selected');//移除class事件
		//选取选项卡中对应的div	
		$(".container-collect-container .container-collect-content").eq(index)//选取对应索引的div
										.addClass('selected')//添加class事件
										.siblings()//选取当前所有除自己以外的所有兄弟结点
										.removeClass('selected');//移除class事件
	});

	/*
	**收藏选项卡事件选取container-collect-span下面的p标签
	 */
	$(".container-collect-span p").on('click',function(){
		var index = $(this).index();//获取点击目标索引值
		$(this).addClass('selected')
			.siblings()
			.removeClass('selected');
		$(".container-collect-span-list .container-collect-list-li").eq(index)//选取对应点击事件索引的li
										.addClass('selected')//添加class事件
										.siblings()//选取当前所有除自己以外的所有兄弟结点
										.removeClass('selected');//移除class事件
	});
	
});