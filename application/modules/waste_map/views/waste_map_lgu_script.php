<script>
    /* global wasteMap*/
    /**
     * Create a Report form when map is clicked
     * @param {type} latlng
     * @returns {undefined}
     */
    wasteMap.openDumpingLocationForm = function(latlng){
        wasteMap.webMap.addMarker(-1, 2, 0, "Dumping Location", latlng.lng, latlng.lat, false, wasteMap.createDumpingLocationForm(0));
        wasteMap.bindDumpingLocationFormAction(-1);
        wasteMap.webMap.markerList[-1].on("popupclose",function(e){
            wasteMap.webMap.mapRemoveMarkerList(e.target.options.map_marker_ID);
        });
        wasteMap.webMap.markerList[-1].fireEvent("click");
    };
    /**
     * Bind events to the html in PopUp since it recreates the popup eveytime it is viewed so events will have to be rebinded
     * @param {type} markerListID
     * @returns {undefined}
     */
    wasteMap.bindIllegalDumpingFormAction = function(markerListID){
        wasteMap.webMap.markerList[markerListID].on("click",function(e){
            if(e.target._popup._isOpen){
                $(e.target._popup._contentNode).find("[name=longitude]").val(e.target._latlng.lng);
                $(e.target._popup._contentNode).find("[name=latitude]").val(e.target._latlng.lat);
                $(e.target._popup._contentNode).find("[name=detail]").autoResize();//bind autoresize on detail field
                /*Removing a Report*/
                $(e.target._popup._contentNode).find("button[button_action=2]").click(function(){
                    var mapMarkerID = $(this).parent().parent().parent().find("input[name=map_marker_ID]").val();
                    $.post(api_url("C_report/deleteReport"), {ID : wasteMap.webMap.markerList[mapMarkerID].options.associated_ID}, function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            wasteMap.webMap.removeMarkerList(mapMarkerID);
                        }
                    });
                });
                $(e.target._popup._contentNode).find("button[button_action=3]").click(function(){
                    var mapMarkerID = $(this).parent().parent().parent().find("input[name=map_marker_ID]").val();
                    var latlng = {
                        lat : $(this).parent().parent().parent().find("input[name=latitude]").val(),
                        lng : $(this).parent().parent().parent().find("input[name=longitude]").val()
                    };
                    $.post(api_url("C_report/updateReport"), {ID : wasteMap.webMap.markerList[mapMarkerID].options.associated_ID, updated_data : {status : 2}}, function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            //add heat map
                            wasteMap.webMap.removeMarkerList(mapMarkerID);
                            wasteMap.webMap.addHeat(latlng);
                        }
                    });
                });
            }
        });
    };
    /**
     * Bind events to the html in PopUp since it recreates the popup eveytime it is viewed so events will have to be rebinded
     * @param {type} markerListID
     * @returns {undefined}
     */
    wasteMap.bindDumpingLocationFormAction = function(markerListID){
        wasteMap.webMap.markerList[markerListID].on("click",function(e){
            if(e.target._popup._isOpen){
                $(e.target._popup._contentNode).find("[name=longitude]").val(e.target._latlng.lng);
                $(e.target._popup._contentNode).find("[name=latitude]").val(e.target._latlng.lat);
                $(e.target._popup._contentNode).find("[name=detail]").autoResize();//bind autoresize on detail field
                /*Removing a Report*/
                $(e.target._popup._contentNode).find("button[button_action=2]").click(function(){
                    var mapMarkerID = $(this).parent().parent().parent().find("input[name=map_marker_ID]").val();
                    $.post(api_url("C_dumping_location/deleteDumpingLocation"), {ID : wasteMap.webMap.markerList[mapMarkerID].options.associated_ID}, function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            wasteMap.webMap.removeMarkerList(mapMarkerID);
                        }
                    });
                });
                /*Submit the report form*/
                $(e.target._popup._contentNode).find("form").ajaxForm({
                    beforeSubmit : function(data){
                        if(data[4]["value"] === ""){//default value for description
                            data[4]["value"] = "Dumping Location";
                        }
                        
                    },
                    success : function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            $.post(api_url("C_dumping_location/retrieveDumpingLocation"), {ID: response["data"]}, function(data){
                                var response = JSON.parse(data);
                                if(!response["error"].length){
                                    wasteMap.webMap.markerList[-1].closePopup();
                                    //wasteMap.webMap.mapRemoveMarkerList(-1);//delete the report form
                                    /*Add the Dumping location to the map*/
                                    var detail  = response["data"]["detail"];
                                    wasteMap.webMap.addMarker(response["data"]["map_marker_ID"], response["data"]["map_marker_type_ID"], response["data"]["ID"], response["data"]["description"], response["data"]["longitude"], response["data"]["latitude"], false, wasteMap.createDumpingLocationForm(response["data"]["map_marker_ID"], response["data"]["description"],detail));
                                    wasteMap.bindIllegalDumpingFormAction(response["data"]["map_marker_ID"]);
                                }else{
                                    console.log(response);
                                }
                            });
                            
                        }
                    }
                })
            }
        });
    };
    /*
        Adding a Prototype to the report popup
     * @param {int} mapMarkerID
     * @param {string} detail
     * @returns {unresolved}     */
    wasteMap.createIllegalDumpingForm = function(mapMarkerID, detail){
        var popupContent  = $(".prototype .illegalDumping").clone();
        popupContent.find("[name=map_marker_ID]").val(mapMarkerID);
        if(mapMarkerID){
            popupContent.find("[input_name=detail]").hide();
            popupContent.find("button[button_action=1]").hide();
            popupContent.find("button[button_action=3]").show();
            popupContent.find(".wasteMapIllegalDumpingDetail").html(detail);
            popupContent.find(".panel-title").text("Illegal Dumping");
        }
        return popupContent.prop("outerHTML");//converts the html to string since popup only accept string
    };
    wasteMap.createDumpingLocationForm = function(mapMarkerID, description, detail){
        var popupContent  = $(".prototype .wasteMapDumpingLocation").clone();
        popupContent.find("[name=map_marker_ID]").val(mapMarkerID);
        if(mapMarkerID){
            popupContent.find("[input_name=detail]").parent().hide();
            popupContent.find("[input_name=description]").parent().hide();
            popupContent.find("button[button_action=1]").hide();
            popupContent.find(".wasteMapDumpingLocationDetail").html("<strong>"+description+"</strong><br>"+detail);
        }else{
            popupContent.find("[input_name=detail]").attr("name", "detail");
            popupContent.find("[input_name=description]").attr("name", "description");
            popupContent.find(".wasteMapDumpingLocationDetail").parent().hide();
            popupContent.find("button[button_action=2]").hide();
            popupContent.find(".wasteMapDumpingLocationForm").attr("action",api_url("C_dumping_location/createDumpingLocation"));
        }
        return popupContent.prop("outerHTML");//converts the html to string since popup only accept string
    };
    wasteMap.retrieveIllegalDumpingHeatMap = function(startDate, endDate){
        var condition = {
            status : 2,
            report_type_ID : 3
        };
        if(typeof startDate !== "undefined" && startDate){
            condition.greater_equal__report__datetime = startDate;
        }
        if(typeof endDate !== "undefined" && endDate){
            condition.lesser_equal__report__datetime = endDate;
        }
        $.post(api_url("C_report/retrieveReport"), {condition: condition}, function(data){
            var response = JSON.parse(data);
            wasteMap.webMap.heatLayer.setLatLngs([]); //reset the heat map
            if(!response["error"].length){
                for(var x =0 ; x < response["data"].length;x++){
                    wasteMap.webMap.addHeat({lat: response["data"][x]["latitude"]*1, lng : response["data"][x]["longitude"]*1, alt:0.1});
                }
            }
        });
    };
    $(document).ready(function(){
        wasteMap.filterFunction["5"] = function(){
            $(".wasteMapDateFilter").trigger("change");
        };
        wasteMap.filterFunction["not_5"] = function(){
            wasteMap.webMap.heatLayer.setLatLngs([]);
        };
        wasteMap.addInitFunction(function(){
            wasteMap.webMap.selectLocation(wasteMap.openDumpingLocationForm);//open a dumping location form if the map is clicked)
            wasteMap.webMap.tileLayer.on("load", wasteMap.filterFunction["5"]);
        });
        $(".wasteMapDateFilter").change(function(){
            var startDate = ($(".wasteMapDateFilter[filter_type=6]").val() !== "") ? (new Date($(".wasteMapDateFilter[filter_type=6]").val()+"T00:00:00")).setHours(0,0,0,0)/1000 : null;
            var endDate = ($(".wasteMapDateFilter[filter_type=7]").val() !== "") ? (new Date($(".wasteMapDateFilter[filter_type=7]").val()+"T00:00:00")).setHours(0,0,0,0)/1000 : null;
            wasteMap.retrieveIllegalDumpingHeatMap(startDate, endDate);
        });
        $(".wasteMapLGUFilter").show();
        
    });


</script>
