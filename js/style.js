$(document).ready(function () {
    $("ul[data-liffect] li").each(function (i) {
        $(this).attr("style", "-webkit-animation-delay:" + i * 300 + "ms;"
            + "-moz-animation-delay:" + i * 300 + "ms;"
            + "-o-animation-delay:" + i * 300 + "ms;"
            + "animation-delay:" + i * 300 + "ms;");
        if (i == $("ul[data-liffect] li").size() -1) {
            $("ul[data-liffect]").addClass("play")
        }
    });
});

$(window).scroll(function(){
    var position = $(window).scrollTop();
    $(".background-deep").css("top",-position/8 + "px");
    console.log(position);
});

$(document).on('click', '.btn-buy-now', function() {
    if ($(this).hasClass('disable')) {return false;}
    $(document).find('.btn-buy-now').addClass('disable');
    var parent = $(this).parents('.card');
    var cart = $(document).find('#cartshop');
    var src = parent.find('img').attr('src');
    var parTop = parent.offset().top;
    var parLeft = parent.offset().left;
    $('<img/>',{
        class : 'img-fly',
        src : src
    }).appendTo('body').css({
        'top': parTop,
        'left': parseInt(parLeft) + parseInt(parent.width()) - 50
    });
    setTimeout(function(){
        $(document).find('.img-fly').css({
            'top': cart.offset().top,
            'left': cart.offset().left
        });
        setTimeout(function(){
            $(document).find('.img-fly').remove();
            var d = parseInt(cart.find('#count-item').data('count')) +1;
            cart.find('#count-item').text(d+' Item').data('count', d);
            $(document).find('.btn-buy-now').removeClass('disable');
        },1000);
    },500);
    return false;
});