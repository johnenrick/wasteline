<script>
    $.material.init();
    $.material.ripples(".sidebar-nav li:not(.sidebar-brand), .wl-btn-post");
    $(document).ready(function(){
        $("#menu-toggle").change(function(e){
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function run_date_time(){
            var d = new Date();
            $('.wl-date').text((d.getMonth()+1)+'/'+d.getDate()+'/'+d.getFullYear().toString().substr(2,2));
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

        $(".sidebar-nav li:not(.sidebar-brand)").click(function(){
            var ths = $(this);
            var page = ths.children('a').data('pageLink');
            $.when( $('.wl-page-content:not(.wl-'+page+'-content)').hide())
                .done(function(){
                    if($('.wl-page-content:not(.wl-'+page+'-content)').is(":visible"))
                        $('.wl-page-content:not(.wl-'+page+'-content)').hide();
                    $('.wl-'+page+'-content').fadeIn(500);
                    $('.sidebar-nav li.wl-active-page').toggleClass('wl-active-page');
                    ths.toggleClass('wl-active-page');
                });
        });
        //page navigation
        $(".sidebar-nav").on("click", "a", function(){
            if(isNaN($(this).attr("module_loaded")*1) || isNaN($(this).attr("module_loaded")*1)===0){//if mocdule is not already loaded
                
            }else{
                
            }
        });
    });
    
</script>