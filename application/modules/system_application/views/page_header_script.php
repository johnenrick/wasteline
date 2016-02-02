<script>
    /*global system_data */
    $.material.init();
    $.material.ripples(".sidebar-nav li:not(.sidebar-brand), .wl-btn-post");
    $(document).ready(function(){
        $("#menu-toggle").change(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function run_date_time(){
            var d = new Date();
            $('.wl-date').text(("0"+(d.getMonth()+1)).slice(-2)+'/'+("0"+d.getDate()).slice(-2)+'/'+d.getFullYear().toString().substr(2,2));
            $('.wl-time').text(("0"+d.getHours()).slice(-2)+':'+("0"+d.getMinutes()).slice(-2));
            setTimeout(function(){run_date_time()}, 1000);
        }
        run_date_time();

        $(".wl-btn-post").click(function(){
            if($("#wl-side-content").is(":visible"))
                $("#wl-side-content").hide("slide", { direction: "right" }, 100);
            else
                $("#wl-side-content").show("slide", { direction: "right" }, 300);
        });

        $(document).mouseup(function (e)
        {
            var container = $("#wl-side-content");
            if (container.is(":visible") && !container.is(e.target) && container.has(e.target).length === 0)
                $("#wl-side-content").hide("slide", { direction: "right" }, 100);
        });
        
        /***Navigation***/
        
        $(".sidebar-nav li:not(.sidebar-brand)").click(function(){
            var ths = $(this);
            var page = ths.children('a').data('pageLink');
            //$.when( $('.wl-page-content:not(.wl-'+page+'-content)').hide())
            $.when($('.moduleHolder[module_link="'+ths.attr("module_link")+'"]'))
                .done(function(){
                    load_module(ths.attr("module_link"), ths.attr("module_name"));
//                    if($('.wl-page-content:not(.wl-'+page+'-content)').is(":visible"))
//                        $('.wl-page-content:not(.wl-'+page+'-content)').hide();
                    
                    //$('.wl-'+page+'-content').fadeIn(500);
                    $('.sidebar-nav li.wl-active-page').toggleClass('wl-active-page');
                    ths.toggleClass('wl-active-page');
                    
                });
        });
        $(".sidebar-nav").find("li[module_link='"+system_data.data.default_page+"']").trigger("click");
        $(".wl-btn-logout").click(function(){
            window.location = base_url("portal/logout");
        });
        $(".wl-rectangle-add").click(function(){
            if(!$("#wl-btn-side-submit").is('visible')) {
                $("#wl-btn-side-submit").show('fade',400);
                $("#wl-btn-side-repost").hide();
            }

            var dummy = $("#wl-rectangle-dummy").clone().removeAttr('id').show();
            $(dummy).insertBefore(this);
            setTimeout(function() {
               dummy.addClass('wl-show')
            }, 10);
        });

        $("#wl-side-menu a").click(function(){
            var ths = $(this);
            $('#wl-side-menu a').removeClass('wl-active');
            $.when( $('.wl-rectangle-list:not(#wl-rectangle-dummy)').remove())
                .done(function(){
                    if(!$("#wl-btn-side-submit").is('visible')) {
                        $("#wl-btn-side-repost").show('fade',400);
                        $("#wl-btn-side-submit").hide();
                    }
                    $(ths).addClass('wl-active');
                });
        });
        
    });
</script>