require(['jquery'],function($){
    $(function(){
        $('#b').blur(function(){
            $username = $('#a').val();
            $password = $('#b').val();
            $.post('user/check_login',{username: $username,password: $password},function(data){
                if(data == 'success'){
                    $('#notice').text('');
                }else{
                    $('#notice').text('用户名或密码不正确！');
                }
            },'text');
        });

        $('#c').click(function(){
             $username = $('#a').val();
                $password = $('#b').val();
            if($('#notice').text() == ''){
                $.post('user/check_login',{'username' : $username,'psd1' : $password},function(data){
                    if(data = 'success'){
                        location.href = "product/zhuye";
                   }
                },'text');
           
           }
        });
    });
});