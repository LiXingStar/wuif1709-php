$(function(){
    $('.ns').click(function () {
        if ($('.boxs')[0].offsetWidth == 0) {
            $('.ns').css({transform: 'rotateZ(360deg)'});
            $('.icon-gengduo').css({color: '#ae2422'});
            $('.boxs').css({width: 750});
            $('.hot').css({color: '#ae2422'})
        } else {
            $('.ns').css({transform: 'rotateZ(0)'});
            $('.boxs').css({width: 0});

        }
    });
});