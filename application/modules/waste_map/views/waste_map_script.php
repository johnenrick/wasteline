<script>
    var wasteMap = {};

    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webmap = new WebMapComponent("#wastemapContainer");
    };
    wasteMap.retrieveMapMarker = function(){
        var condition = {
                "associated_ID" 		: user_id(),
                "map_marker_type_ID" 	: 1
        };
        $.post(api_url("c_map_marker/retrieveMapMarker"), {"condition": condition}, function(data){
            var response = JSON.parse(data);

            for(var x in response["data"]){
                wasteMap.webmap.addMarker(response["data"][x]["ID"], 1, response["data"][x]["associated_ID"], "HOLAAAAA", response["data"][x]["longitude"], response["data"][x]["latitude"], 0);
            }

        });
    }
    $(document).ready(function(){

        load_page_component("web_map_component", wasteMap.initializeWastemapManagement);

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
        $('.wl-datetimepicker').bootstrapMaterialDatePicker
        ({
            time: false,
            clearButton: true
        });

        wasteMap.retrieveMapMarker();

    });


</script>
