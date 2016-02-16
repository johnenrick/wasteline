<script>
    var wastemapManagement = {};
    
    wastemapManagement.initializeWastemapManagement = function(){
        var wastemapManagement = new WebMapComponent("#wastemapContainer");
    };
    $(document).ready(function(){
        load_page_component("web_map_component", wastemapManagement.initializeWastemapManagement);
    });

    
</script>
