<script src="<?=asset_url('js/autoresize.jquery.js')?>"></script>
<script>
    var wasteMap = {};
    wasteMap.mapMarkerDescriptionList = {
        1 : "account_address_description",
        2 : "dumping_location_description",
        3 : "illegal_dumping_detail"
    };
    wasteMap.initFunction = [];
    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webMap = new WebMapComponent("#wasteMapContainer");
        for(var x = 0; x < wasteMap.initFunction.length;x++){
            wasteMap.initFunction[x]();
        }
    };
    wasteMap.refreshMapMarker = function(){
        wasteMap.retrieveMapMarker([1,2,4,5]);
    }
    wasteMap.retrieveMapMarker = function(mapMarkerTypeIDList){
        /*Retrieve markers with types specified in condition.map_marker_type_ID */
        $.post(api_url("C_map_marker/retrieveMapMarker"), {condition: {map_marker_type_ID : mapMarkerTypeIDList}}, function(data){
            var response = JSON.parse(data);
            for(var x = 0;x<response["data"].length;x++){
                wasteMap.webMap.addMarker(response["data"][x]["ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["associated_ID"], response["data"][x][wasteMap.mapMarkerDescriptionList[response["data"][x]["map_marker_type_ID"]]], response["data"][x]["longitude"], response["data"][x]["latitude"], false);
            }
        });
    };
    wasteMap.retrieveDumpingLocationMapMarker = function(){
        $.post(api_url("C_dumping_location/retrieveDumpingLocation"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                for(var x =0 ; x < response["data"].length;x++){
                    var detail  = response["data"][x]["detail"];
                    wasteMap.webMap.addMarker(response["data"][x]["map_marker_ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["ID"], response["data"][x]["descrption"], response["data"][x]["longitude"]*1, response["data"][x]["latitude"]*1, false, wasteMap.createIllegalDumpingForm(response["data"][x]["map_marker_ID"], detail));
                    wasteMap.bindIllegalDumpingFormAction(response["data"][x]["map_marker_ID"]);
                }
            }
        });
    };
    $(document).ready(function(){
        
        load_page_component("web_map_component", wasteMap.initializeWastemapManagement);
        
        add_refresh_call("waste_map", wasteMap.refreshMapMarker);
        add_refresh_call("waste_map", wasteMap.retrieveDumpingLocationMapMarker);
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
    });


</script>
