require(['jquery', 'dialog'], function($, Person){

    $(function(){
        $('#btn').on('click', function(){
            var p1 = new Person('lisi');
            alert(  p1.name   );
        });
    });

});