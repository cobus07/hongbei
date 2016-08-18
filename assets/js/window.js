/**
 * Created by Administrator on 2016/1/13.
 */
require(['jquery','window_define'],function($,Window){
    $('.btn').on('click',function(){
        var window = new Window({
            //width:弹窗宽度
            //height:弹窗高度
            //title:弹窗标题
            //content:弹窗里面的内容（可以是html或者php页面）
        });
        window.open();
    });
});