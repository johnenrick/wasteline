$(document).ready(function () {
    $('.wl-info-li .wl-info-box').initial({
        height: 28,
        width: 28,
        fontSize: 16
    });
    $('.wl-info-description .wl-info-box .wl-box').initial({
        height: 120,
        width: 120
    });
    $(".wl-info-mainlist").on('click', '.wl-info-li', function () {
        $('.wl-info-li').removeClass('active');
        $(this).addClass('active');
    });
});
