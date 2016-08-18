require(['jquery'],function($){
    $(function(){
        $('#a').blur(function(){
            $username = $('#a').val();
            if($username != '' && $username != '请输入昵称'){
                //$('#name_tip').text('请填写用户名');
                //alert("aa");
                //break;
            $.post('user/check_username',{username: $username},function(data){
                if(data == 'success'){
                    $('#name_tip').text('用户名已被注册');
                }else{
                    $('#name_tip').text('用户名可以使用');
                }
            },'text');
            }else{
                $('#name_tip').text('请填写用户名');
            }
      });
      
    });
    $(function(){
        $('#b').blur(function(){
            $psd1 = $('#b').val();
            if($psd1 == ''){
                $('#psd1_tip').text('密码不能为空！');
            }else{
                $('#psd1_tip').text('√');
            }
            
        });
    
        $('#bb').blur(function(){
       $psd1 = $('#b').val(); 
       $psd2 = $('#bb').val(); 
            if($psd2 == ''){
                $('#pwd_tip').text('请确认密码！');
            }else if($psd1!=$psd2){
                $('#pwd_tip').text('两次密码不一致');
            }else{
                $('#pwd_tip').text('√');
            }
        }); 
    });

        $('#c').click(function(){
        //alert("aa");
           $username = $('#a').val();
           $psd1 = $('#b').val();
           $psd2 = $('#bb').val();
           if($username != '' && $username != '请输入昵称'){
                
            $.post('user/check_username',{username: $username},function(data){
                if(data == 'success'){
                    $('#name_tip').text('用户名已被注册');
                }else{
                    $('#name_tip').text('用户名可以使用');
                }
            },'text');
            }else{
                $('#name_tip').text('请填写用户名');
            }
           
           if($psd1 == ''){
                $('#psd1_tip').text('密码不能为空！');
           }else{
                 $('#psd1_tip').text('√');
           }
           if($psd2 == ''){
                $('#pwd_tip').text('请确认密码！');
           }else if($psd1!=$psd2){
                $('#pwd_tip').text('两次密码不一致');
           }else{
                $('#pwd_tip').text('√');
            }
           //alert($('#name_tip').text());
           if( ($('#name_tip').text() == '用户名可以使用') && ($('#psd1_tip').text() == '√') && ($('#pwd_tip').text() == '√')){
                //alert("mm");
                $.post('user/do_zhuce_message',{'username' : $username,'psd1' : $psd1},function(data){
                    if(data = 'success'){
                        location.href = "user/zhuce_success";
                    }
                
                
                },'text');
           
           }
       
    });


});














