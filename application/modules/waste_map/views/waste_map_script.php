<script src="<?=asset_url('js/autoresize.jquery.js')?>"></script>
<script>
    var wasteMap = {};
    wasteMap.mapMarkerDescriptionList = {
        1 : "account_address_description",
        2 : "dumping_location_description",
        3 : "illegal_dumping_detail"
    };
    wasteMap.initFunction = [];
    wasteMap.doneInit = false;
    wasteMap.filterFunction = {};
    wasteMap.addInitFunction = function(func){
        if(wasteMap.doneInit === false){
            wasteMap.initFunction.push(func);
        }else{
            func();
        }
    }
    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webMap = new WebMapComponent("#wasteMapContainer");
        wasteMap.doneInit = true;
        for(var x = 0; x < wasteMap.initFunction.length;x++){
            wasteMap.initFunction[x]();
        }
        
    };
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
                    wasteMap.webMap.addMarker(response["data"][x]["map_marker_ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["ID"], response["data"][x]["description"], response["data"][x]["longitude"]*1, response["data"][x]["latitude"]*1, false, wasteMap.createDumpingLocationForm(response["data"][x]["map_marker_ID"], response["data"][x]["description"], detail));
                    
                    if(typeof wasteMap.bindDumpingLocationFormAction !== "undefined"){
                        wasteMap.bindDumpingLocationFormAction(response["data"][x]["map_marker_ID"]);
                    }
                }
            }
        });
    };
    //prototype
    
    wasteMap.retrieveUserReportMapMarker = function(){
        var condition = {
            status : 1,
            report_type_ID : 3
        };
        $.post(api_url("C_report/retrieveReport"), {condition: condition}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                for(var x =0 ; x < response["data"].length;x++){
                    var datetime = new Date(response["data"][x]["datetime"]*1000);
                    var detail  = response["data"][x]["detail"]+"<br> <i>Reported on "+datetime.getDate()+"/"+datetime.getMonth()+"/"+datetime.getFullYear()+"</i>";
                    wasteMap.webMap.addMarker(response["data"][x]["map_marker_ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["ID"], response["data"][x]["detail"], response["data"][x]["longitude"]*1, response["data"][x]["latitude"]*1, false, wasteMap.createIllegalDumpingForm(response["data"][x]["map_marker_ID"], detail));
                    wasteMap.bindIllegalDumpingFormAction(response["data"][x]["map_marker_ID"]);
                }
            }
        });
    };
    $(document).ready(function(){
        load_page_component("web_map_component", wasteMap.initializeWastemapManagement);
        
        add_refresh_call("waste_map", function(){
            wasteMap.filterFunction["1"]();
            wasteMap.filterFunction["2"]();
            wasteMap.filterFunction["3"]();
            wasteMap.filterFunction["4"]();
            
            wasteMap.retrieveDumpingLocationMapMarker();
            wasteMap.retrieveUserReportMapMarker();
        });
        wasteMap.filterFunction["1"] = function(){//User with waste
            wasteMap.retrieveMapMarker([1]);
        };
        wasteMap.filterFunction["not_1"] = function(){
            wasteMap.webMap.removeMarkerList(null, 1);
        };
        wasteMap.filterFunction["2"] = function(){//user with services
            wasteMap.retrieveMapMarker([4]);
        };
        wasteMap.filterFunction["not_2"] = function(){
            wasteMap.webMap.removeMarkerList(null, 4);
        };
        wasteMap.filterFunction["3"] = function(){//report
            wasteMap.retrieveUserReportMapMarker();
        };
        wasteMap.filterFunction["not_3"] = function(){
            wasteMap.webMap.removeMarkerList(null, 3);
        };
        
        wasteMap.filterFunction["4"] = function(){//dumping location
            wasteMap.retrieveDumpingLocationMapMarker();
        };
        wasteMap.filterFunction["not_4"] = function(){
            wasteMap.webMap.removeMarkerList(null, 2);
        };
        
        
        $.material.ripples(".wl-map-filter, .wl-btn-map-search");
        $(".wl-map-filter").click(function(){
            if($(this).hasClass("wl-active")){//off filter
                $(this).removeClass("wl-active");
                wasteMap.filterFunction["not_"+$(this).attr("filter_type")]();
            }else{
                $(this).addClass("wl-active");
                wasteMap.filterFunction[$(this).attr("filter_type")]();
            }
        });
        $('.wl-datetimepicker').bootstrapMaterialDatePicker
        ({
            time: false,
            clearButton: true
        });
        $(".dtp-btn-clear").click(function(){
            $(".wasteMapDateFilter[filter_type=6]").trigger("change");
        });
    });


</script>
