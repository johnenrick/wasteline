<script>
    var wastemapManagement = {};

    wastemapManagement.initializeWastemapManagement = function(){
        var wastemapManagement = new WebMapComponent("#wastemapContainer");
    };
    $(document).ready(function(){
        load_page_component("web_map_component", wastemapManagement.initializeWastemapManagement);

        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

        $.material.ripples(".wl-map-filter, .wl-btn-map-search");
        $('.wl-map-filter').click(function(){
            var ths = $(this);
            var add = !ths.hasClass('wl-active');
            $.when($('.wl-map-filter').removeClass('wl-active'))
                .done(function () {
                    if(add)
                        ths.addClass('wl-active');
                });
        });
    });


</script>
