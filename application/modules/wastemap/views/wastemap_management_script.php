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
    });


</script>
