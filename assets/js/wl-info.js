$(document).ready(function () {
    $('.wl-info-li .wl-info-box').initial();
    $('.wl-info-description .wl-info-box .wl-box').initial();
    $(".wl-info-mainlist").on('click', '.wl-info-li', function () {
        $('.wl-info-li').removeClass('active');
        $(this).addClass('active');
    });

    $("#wl-info-modal-submit").click(function () {
        var dummy = $('.wl-info-mainlist .wl-list-dummy').clone().removeClass('wl-list-dummy');
        var modal_parent = $(this).closest('div.modal-content');
        var title = modal_parent.find('#inputTitle').val();
        var author = modal_parent.find('#inputAuthor').val();

        dummy.find('img').attr('data-name', title);
        dummy.find('.wl-list-title').text(title);
        dummy.find('.wl-list-sub span').attr('data-livestamp', Math.floor(Date.now() / 1000));
        $('.wl-info-mainlist ul').append(dummy);
        dummy.find('img.wl-info-box').initial();

        $(this).closest('div.modal').modal('hide');
    });
});
