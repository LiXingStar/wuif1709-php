$(function () {
    let nav = $('.navone');
    let list = $('.list');
    let dw = $('.dw');

    let navs = $('.navs');
    let tops = list.offset().top;
    $(window).scroll(function () {
        let top1 = nav.offset().top;
        if (top1 > tops - 100) {
            nav.css({background: 'rgba(255,255,255,0.5)'});
            navs.css({color: '#000'});
            $('.icon-gengduo').css({color: '#ae2422'});
        } else {
            nav.css({background: 'rgba(0,0,0,0.5)'});
            navs.css({color: '#fff'});
        }
    });

    dw.each(function (i) {
        $(this).hover(function () {

            $('.img-box1').eq(i).css({transform: 'scale(1.3, 1.3)'})
        }, function () {
            $('.img-box1').eq(i).css({transform: 'scale(1, 1)'})
        })
    });


    $('.boxs').on('mouseenter', 'a', function () {
        $(this).addClass('hots').siblings().removeClass('hots');
    })


});
