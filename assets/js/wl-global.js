$(document).ready(function () {

    $('.wl-header-img').initial({
        height: 30,
        width: 30,
        fontSize: 16
    });
    $(".wl-menu-toggle").click(function (e) {
        e.preventDefault();
        var ths = $(".wl-menu-toggle");
        if(ths.hasClass('wl-rotate-90'))
            ths.removeClass('wl-rotate-90');
        else ths.addClass('wl-rotate-90');
        $("#wrapper").toggleClass("toggled");
    });

    function run_date_time() {
        var d = new Date();
        $('.wl-date').text(("0" + (d.getMonth() + 1)).slice(-2) + '/' + ("0" + d.getDate()).slice(-2) + '/' + d.getFullYear().toString().substr(2, 2));
        $('.wl-time').text(("0" + d.getHours()).slice(-2) + ':' + ("0" + d.getMinutes()).slice(-2));
        setTimeout(function () {
            run_date_time()
        }, 1000);
    }
    run_date_time();

    $(".wl-btn-post").click(function () {
        if ($("#wl-side-content").is(":visible"))
            $("#wl-side-content").hide("slide", {
                direction: "right"
            }, 100);
        else
            $("#wl-side-content").show("slide", {
                direction: "right"
            }, 300);
    });

    $(document).mouseup(function (e) {
        var container = $("#wl-side-content");
        if (container.is(":visible") && !container.is(e.target) && container.has(e.target).length === 0)
            $("#wl-side-content").hide("slide", {
                direction: "right"
            }, 100);
    });
/*Cnflict in pageHeader*/
//    $(".sidebar-nav li:not(.sidebar-brand)").click(function () {
//        var ths = $(this);
//        var page = ths.children('a').data('pageLink');
//        $.when($('.wl-page-content:not(.wl-' + page + '-content)').hide())
//            .done(function () {
//                if ($('.wl-page-content:not(.wl-' + page + '-content)').is(":visible"))
//                    $('.wl-page-content:not(.wl-' + page + '-content)').hide();
//                $('.wl-' + page + '-content').fadeIn(500);
//                $('.sidebar-nav li.wl-active-page').toggleClass('wl-active-page');
//                ths.toggleClass('wl-active-page');
//                $(".wl-page-title").text(page.replace('-', ' '));
//            });
//    });

    $(".wl-rectangle-add").click(function () {
        if (!$("#wl-btn-side-submit").is(':visible')) {
            $("#wl-btn-side-submit").show('fade', 400);
            $("#wl-btn-side-repost").hide();
        }

        var dummy = $("#wl-rectangle-dummy").clone().removeAttr('id').show();
        $(dummy).insertBefore(this);
        setTimeout(function () {
            dummy.addClass('wl-show')
        }, 10);
    });

    $("#wl-side-menu a").click(function () {
        var ths = $(this);
        $('#wl-side-menu a').removeClass('wl-active');
        $.when($('.wl-rectangle-list:not(#wl-rectangle-dummy)').remove())
            .done(function () {
                if (!$("#wl-btn-side-submit").is('visible')) {
                    $("#wl-btn-side-repost").show('fade', 400);
                    $("#wl-btn-side-submit").hide();
                }
                $(ths).addClass('wl-active');
            });
    });

    $("#wl-header-menu a").click(function () {
        var ths = $(this);
        $('#wl-header-menu a').removeClass('wl-active');
        $(ths).addClass('wl-active');
    });

    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    $(".scroll-on").mCustomScrollbar({
        theme: "minimal-dark",
        live: "true",
        mouseWheel: {
            deltaFactor: 50
        },
        callbacks: {
            whileScrolling: function () {
                if ($(".wl-info-full").is(':visible')) {
                    var desc_e = $(".wl-info-full .wl-info-description");
                    var scrollTop = parseInt($(".wl-info-full .mCSB_container").css('top'), 10);
                    var calc_h = parseInt(desc_e.css('margin-top'), 10) + parseInt(desc_e.css('height'), 10);
                    if (scrollTop < -calc_h) {
                        desc_e.children('.wl-info-fixed').addClass('wl-fixed');
                    } else {
                        desc_e.children('.wl-info-fixed').removeClass('wl-fixed');
                    }
                }
            }
        }
    });

});
