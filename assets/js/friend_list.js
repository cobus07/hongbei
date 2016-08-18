require(['jquery', 'pager'], function($, Pager){

    $(function(){
        var $cont_li =$(".cont_head li");
        $cont_li.on('click',function(){
            $(this).addClass("selected")
                .siblings().removeClass("selected");
            var index =  $cont_li.index(this);
                //alert('haha');
            $(".all_con")
                .eq(index).show()
                .siblings('div').hide();
        });

        $('.btn').on('click',function(){
            $(".cont")
                .hide()
                .filter(":contains('"+( $('.search').val() )+"')")
                .show();
        });

        $.get('personal/ajax_session',function(re){
            var user_id = re.user_id;
            var pager = new Pager();
            pager.init({
                url: 'personal/get_myfriends',
                data: {
                    id:user_id
                },
                loadBtn: '.load-btn',
                container: '.my',
                //pageNum: 5,
                template: $('#myFollow').html()
            });
        },'json');

        $.get('personal/ajax_session',function(re){
            var user_id = re.user_id;
            var pager = new Pager();
            pager.init({
                url: 'personal/get_orfriends',
                data: {
                    id:user_id
                },
                loadBtn: '.load-btn',
                container: '.other',
                //pageNum: 5,
                template: $('#orFollow').html()
            });
        },'json');

        //$.get('personal/get_myfriends',function(res){
        //    for(var i=0; i<res.length; i++){
        //        var friend = res[i];
        //        var html = '<div class="cont">'
        //                    +'<ul>'
        //                    +'<li class="left"><img src="uploads/user/20151229/fruser_pic.jpg"></li>'
        //                    +'<li class="mid">'
        //                    +'<ul class="msn">'
        //                    +'<li><a href="#" style="color: black">'+friend.username+'</b></a><span class="grade"><img src="assets/img/grade_bac.jpg"></span><span class="gender"><img src="assets/img/gender_bac.jpg"></span></li>'
        //                    +'<li>电话&nbsp;:&nbsp;'+friend.tel+'</li>'
        //                    +'<li>地址&nbsp;:&nbsp;'+friend.address+'</li>'
        //                    +'<li>个性签名&nbsp;:&nbsp;'+friend.per_sign+'</li>'
        //                    +'</ul>'
        //                    +'</li>'
        //                    +'<li class="right">'
        //                    +'<button class="del" data-id="'+friend.user_id+'">取消关注</button><button class="more">更多</button>'
        //                    +'<div class="click">'
        //                    +'<ul>'
        //                    +'<li>私<span class="space"></span>信</li>'
        //                    +'<li>举<span class="space"></span>报</li>'
        //                    +'</ul>'
        //                    +'</div>'
        //                    +'</li>'
        //                    +'</ul>'
        //                    +'</div>';
        //        $('.my').append(html);
        //    }
        //},'json');

        //$.get('personal/get_orfriends',function(res){
        //    for(var i=0; i<res.length; i++){
        //        var friend = res[i];
        //        var html = '<div class="cont">'
        //            +'<ul>'
        //            +'<li class="left"><img src="uploads/user/20151229/fruser_pic.jpg"></li>'
        //            +'<li class="mid">'
        //            +'<ul class="msn">'
        //            +'<li><a href="#" style="color: black">'+friend.username+'</b></a><span class="grade"><img src="assets/img/grade_bac.jpg"></span><span class="gender"><img src="assets/img/gender_bac.jpg"></span></li>'
        //            +'<li>电话&nbsp;:&nbsp;'+friend.tel+'</li>'
        //            +'<li>地址&nbsp;:&nbsp;'+friend.address+'</li>'
        //            +'<li>个性签名&nbsp;:&nbsp;'+friend.per_sign+'</li>'
        //            +'</ul>'
        //            +'</li>'
        //            +'<li class="right">'
        //            +'<button class="add" data-id="'+friend.user_id+'">+关注</button><button class="more">更多</button>'
        //            +'<div class="click">'
        //            +'<ul>'
        //            +'<li>私<span class="space"></span>信</li>'
        //            +'<li>举<span class="space"></span>报</li>'
        //            +'</ul>'
        //            +'</div>'
        //            +'</li>'
        //            +'</ul>'
        //            +'</div>';
        //        $('.other').append(html);
        //    }
        //},'json');

        $('.all_con').on('click','.more',function(){
            $(this).next().toggle();
        });

        $('.all_con').on('click','.del', function(){
            $_this = $(this);
            $.get('personal/ajax_del',{user_id: $(this).data("id")},function(data){
                if(data == "success"){
                    $_this.parents(".cont").fadeOut(function(){
                        $(this).remove();
                    });
                }
            },"text");
        });

        $('.all_con').on('click','.add', function(){
            $_this = $(this);
            $.get('personal/ajax_add',{user_id: $(this).data("id")},function(data){
                if(data == "success"){
                    $_this.html("已关注");
                }
            },"text");
        });

    });

});





