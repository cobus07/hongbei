require(['jquery','window_define'],function($,Window){
    $('.btn1').on('click',function(){
        var window = new Window({
            width:600,//弹窗宽度
            height:300,//弹窗高度
            title:'请输入添加的蛋糕类别：',
            content:'assets/js/insert.php'
    });
    window.open();
    });
});