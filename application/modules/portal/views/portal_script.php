<script type="text/javascript">
    var portalExplore = {};
    portalExplore.initializeWastemapManagement = function(){
        portalExplore.webMap = new WebMapComponent("#portalExploreMap",{
            gps_location : true,
            search_location : true,
            heat_layer : true
        });
    };
    $(document).ready(function(){
        $.material.init();
        load_page_component("web_map_component", portalExplore.initializeWastemapManagement);
        $(".btn-landingform").click(function(){
            if($("#login-form").is(":visible")){
                $("#login-form").hide();
                $("#register-form").fadeIn(400);
            }
            else{
                $("#login-form").fadeIn(400);
                $("#register-form").hide();
            }
        });
        $(".btn-fp").click(function(){
            if($("#login-form").is(":visible")){
                $("#login-form").hide();
                $("#fp-form").fadeIn(400);
            }
            else{
                $("#login-form").fadeIn(400);
                $("#fp-form").hide();
            }
        });
        $("#contentCarousel").owlCarousel({
            singleItem : true,
            stopOnHover : true,
            autoPlay: 3000,
            paginationNumbers : true,
            autoHeight : true
        });
        //check if logged in
        if(user_id()){
            $("#portalLoginPanel").hide();
            $("#portalInformationPanel").removeClass("col-sm-7");
            $("#portalLoginPanel").removeClass("col-sm-5");
            $("#portalInformationPanel").addClass("col-sm-12");
        }
        
    });
</script>
