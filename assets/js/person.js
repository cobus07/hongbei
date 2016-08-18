require(['jquery'],function($){
        $(function(){
            $('#fabu').on('click',function(){
                var wenzi = $('.publish_content').val();

                //alert(wenzi);
                $.post('personal/post',{
                    wenzhang:wenzi
                },function(data){
                    //alert(data);
                    if( data == "success"){
                        alert('成功');
                    }else{
                        alert('失败');
                    }
                },'text');

            });
            $('#pinlun_action').on('click',function(){
                var pinlun = $('#pinlun_content').val();
                $.post('personal/comment',{
                    wenzhang:pinlun
                },function(data){
                    //alert(data);
                    if( data == "success"){
                        alert('成功');
                    }else{
                        alert('失败');
                    }
                },'text');

            });
            $('#dianzan').on('click',function(){
                var $shuzi=$("#dianzan span");
                $shuzi.html(parseInt($shuzi.html())+1);
            });

            $('#speak').on('click',function(){
                var $comment=$('.input_detial');
                $comment.focus();
            });
           $("#back").on("click",function(){
               var $infor=$("#selected_content");
               var $tijiao=$("#selected_tijiao");
              $infor.show();
               $tijiao.show();
               $infor.focus();
           });
            $("#selected_tijiao").on("click", function () {
                var infor=$("#selected_content").val();
            });

        });
        /* return $check_name;*/

});