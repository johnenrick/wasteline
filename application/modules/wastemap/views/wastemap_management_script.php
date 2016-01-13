<script>
    var wastemapManagement = {};
    
    wastemapManagement.initializeWastemapManagement = function(){
        var wastemapManagement = new WastemapComponent("#wastemapContainer");
    };
    $(document).ready(function(){
        load_page_component("wastemap_component", wastemapManagement.initializeWastemapManagement);
    });

    
</script>
