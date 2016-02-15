<script>
    /*global system_data */
    $.material.init();
    $.material.ripples(".sidebar-nav li:not(.sidebar-brand), .wl-btn-post");
    $(document).ready(function(){

        /***Navigation***/
        $(".sidebar-nav li:not(.sidebar-brand)").click(function(){
            var ths = $(this);
            var page = ths.children('a').data('pageLink')+""   ;
            window.history.pushState("object or string", "Title", base_url("portal/visitPage/"+ths.attr("module_link")));
            $.when($('.moduleHolder[module_link="'+ths.attr("module_link")+'"]'))
                .done(function(){
                    load_module(ths.attr("module_link"), ths.attr("module_name"));

                    $('.wl-'+page+'-content').fadeIn(500);
                    $('.sidebar-nav li.wl-active-page').toggleClass('wl-active-page');
                    ths.toggleClass('wl-active-page');
                    $(".wl-page-title").text(page.replace('-', ' '));
                });
        });
        $(".sidebar-nav").find("li[module_link='"+system_data.data.default_page+"']").trigger("click");
        $(".wl-btn-logout").click(function(){
            window.location = base_url("portal/logout");
        });
        if(user_id()){
            $("#headerUserFullName").text(user_first_name());
        }else{
            $("#headerUserFullName").text("Sign Up");
            if($(".wl-active-page").attr("module_id")*1 !== 1){
                window.location = base_url();
            }
        }
    });

</script>
