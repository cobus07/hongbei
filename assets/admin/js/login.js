define(function(require){
    var $ = require('jquery');


    $(function(){
        var $username = $('#username'),
            $password = $('#password');

        $('#btn-login').on('click', function(){
            $.post('admin/user/ajax_login', {username: $username.val(), password: $password.val()}, function(data){
                if(data == 'success'){
                    alert('登录成功!');
                    location.href = 'admin/index';
                }else{
                    alert('用户名或密码错误!');
                }
            }, 'text');
        });
    });

});