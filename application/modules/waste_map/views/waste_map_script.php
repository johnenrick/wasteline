<script>
    var wasteMap = {};
    wasteMap.mapMarkerDescriptionList = {
        1 : "account_address_description",
        2 : "dumping_location",
        3 : "dumping_location_description"
    };
    wasteMap.openIllegalDumpingReport = function(latlng){
        
    };
    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webmap = new WebMapComponent("#wasteMapContainer");
        wasteMap.retrieveMapMarker();
        wasteMap.webMap.selectLocation(wasteMap.openIllegalDumpingReport(latlng));
    };
    wasteMap.retrieveMapMarker = function(){
        var condition = {
                map_marker_type_ID : [1,2,4,6]
        };
        $.post(api_url("C_map_marker/retrieveMapMarker"), {condition: condition}, function(data){
            var response = JSON.parse(data);
            for(var x = 0;x<response["data"].length;x++){
                wasteMap.webmap.addMarker(response["data"][x]["ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["associated_ID"], response["data"][x][wasteMap.mapMarkerDescriptionList[response["data"][x]["map_marker_type_ID"]]], response["data"][x]["longitude"], response["data"][x]["latitude"], false);
            }

        });
    };
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

        
        $("#wasteMapContainer").on("click", ".wasteMapSubmitIllegalDumpingReport", function(){
           alert(); 
        });
    });


</script>
