$(document).ready(function () {
    $('.wl-info-li .wl-info-box').initial();
    $('.wl-info-description .wl-info-box .wl-box').initial();
    $(".wl-info-mainlist").on('click', '.wl-info-li', function () {
        $('.wl-info-li').removeClass('active');
        $(this).addClass('active');
    });

    $("#wl-info-modal-submit").click(function () {
        var ths = $(this);
        var dummy = $('.wl-info-mainlist .wl-list-dummy').clone().removeClass('wl-list-dummy');
        var modal_parent = $(this).closest('div.modal-content');
        var container = {
            description     : modal_parent.find('#inputTitle').val(),
            source          : modal_parent.find('#inputAuthor').val(),
            type_ID         : informationPage.findInformationType()
        }

        $.post(api_url("C_information/createInformation"), container, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                dummy.attr("informationid", response["data"]);
                dummy.find('img').attr('data-name', container.description);
                dummy.find('.wl-list-title').text(container.description);
                dummy.find('.wl-list-sub span').attr('data-livestamp', Math.floor(Date.now() / 1000));
                //$('.wl-info-mainlist ul').append(dummy);
                $(dummy).insertAfter($("ul#informationList li.wl-list-dummy"));
                dummy.find('img.wl-info-box').initial();
            }
        }).done(function(){
            ths.closest('div.modal').modal('hide');
            $(".information-count").text((($(".information-count").text())*1)+1);
        });
    });
});
