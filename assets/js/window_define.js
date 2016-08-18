/**
 * Created by Administrator on 2016/1/13.
 */
define(['jquery'],function($){

    function Window(options) {
        this.settings = $.extend({
            width: 550,
            height: 350,
            title: '在这里输入你的标题',
            content: '在这里添加你想要加入的东西',
            isDragable: false,
            hasMask: true
        }, options);
    }

        Window.prototype = {
            open: function(){
                var $wrap = $('<div class="window-wrap"></div>'),
                    $mask = $('<div class="window-mask"></div>'),
                    $container = $('<div class="window-container"></div>').css({
                        width: this.settings.width,
                        height: this.settings.height,
                        marginLeft: -this.settings.width/2,
                        marginTop: -this.settings.height/2
                    }),
                    $title = $('<div class="window-title"><span class="window-close">x</span></div>'),
                    $content = $('<div class="window-content"></div>');

                $container.append($title).append($content);
                $wrap.append($mask).append($container);
                $title.append(this.settings.title);
                $content.append(this.settings.content);

                $('.window-title',$wrap).prepend(this.title);

                $content.load(this.settings.content);

                $(document.body).append($wrap);

                $('.window-close').on('click', function () {
                    $wrap.remove();
                });
            }
        };



    return Window;
});