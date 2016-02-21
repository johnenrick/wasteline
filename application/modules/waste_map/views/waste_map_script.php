<script src="<?=asset_url('js/autoresize.jquery.js')?>"></script>
</script>
<script>
    var wasteMap = {};
    wasteMap.mapMarkerDescriptionList = {
        1 : "account_address_description",
        2 : "dumping_location_description",
        3 : "illegal_dumping_detail"
    };
    wasteMap.openIllegalDumpingReport = function(latlng){
        
        
        wasteMap.webMap.addMarker(-1, 3, 0, "Illegal Dumping", latlng.lng, latlng.lat, false, wasteMap.createIllegalDumpingForm(0));
        wasteMap.bindIllegalDumpingFormAction(-1);
        wasteMap.webMap.markerList[-1].on("popupclose",function(e){
            wasteMap.webMap.removeMarkerList(e.target.options.map_marker_ID);
        });
        wasteMap.webMap.markerList[-1].fireEvent("click");
    };
    wasteMap.bindIllegalDumpingFormAction = function(markerListID){
        wasteMap.webMap.markerList[markerListID].on("click",function(e){
            if(e.target._popup._isOpen){
                $(e.target._popup._contentNode).find("[name=longitude]").val(e.target._latlng.lng);
                $(e.target._popup._contentNode).find("[name=latitude]").val(e.target._latlng.lat);
                $(e.target._popup._contentNode).find("[name=detail]").autoResize();//bind autoresize on detail field
                $(e.target._popup._contentNode).find("button[button_action=2]").click(function(){//event for removing report
                    var mapMarkerID = $(this).parent().parent().parent().find("input[name=map_marker_ID]").val();
                    $.post(api_url("C_report/deleteReport"), {ID : wasteMap.webMap.markerList[mapMarkerID].options.associated_ID}, function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            wasteMap.webMap.removeMarkerList(mapMarkerID);
                        }
                    });
                });
                $(e.target._popup._contentNode).find("form").ajaxForm({
                    beforeSubmit : function(data){
                        if(data[6]["value"] === ""){//default value for detail
                            data[6]["value"] = "Illegal Dumping";
                        }
                        
                    },
                    success : function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            $.post(api_url("C_report/retrieveReport"), {ID: response["data"]}, function(data){
                                var response = JSON.parse(data);
                                if(!response["error"].length){
                                    console.log(wasteMap.webMap.removeMarkerList(-1));
                                    console.log(wasteMap.webMap.markerList);
                                    var datetime = new Date(response["data"]["datetime"]*1000);
                                    var detail  = response["data"]["detail"]+"<br> <i>Reported on "+datetime.getDate()+"/"+datetime.getMonth()+"/"+datetime.getFullYear()+"</i>";
                                    wasteMap.webMap.addMarker(response["data"]["map_marker_ID"], response["data"]["map_marker_type_ID"], response["data"]["ID"], response["data"]["detail"], response["data"]["longitude"], response["data"]["latitude"], false, wasteMap.createIllegalDumpingForm(response["data"]["map_marker_ID"], detail));
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
    } 
    wasteMap.removeIllegalDumpingReport = function(ID){
        if(ID){
            $.post(api_url("C_report/deleteReport"), {ID : ID}, function(data){
                var response = JSON.parse(data);
            });
        }
    }
    wasteMap.createIllegalDumpingForm = function(mapMarkerID, detail){
        var popupContent  = $(".prototype .illegalDumping").clone();
        popupContent.find("[name=map_marker_ID]").val(mapMarkerID);
        if(mapMarkerID){
            popupContent.find("[input_name=detail]").hide();
            popupContent.find("button[button_action=1]").hide();
            popupContent.find(".wasteMapIllegalDumpingDetail").html(detail);
        }else{
            popupContent.find("[input_name=detail]").attr("name", "detail");
            popupContent.find(".wasteMapIllegalDumpingDetail").hide();
            popupContent.find("button[button_action=2]").hide();
            popupContent.find(".illegalDumpingForm").attr("action",api_url("C_report/createReport"));
        }
        
        return popupContent.prop("outerHTML");
    };
    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webMap = new WebMapComponent("#wasteMapContainer");
        wasteMap.retrieveMapMarker();
        wasteMap.webMap.selectLocation(wasteMap.openIllegalDumpingReport);
    };
    wasteMap.retrieveMapMarker = function(){
        var condition = {
                map_marker_type_ID : [1,2,4,6]
        };
        $.post(api_url("C_map_marker/retrieveMapMarker"), {condition: condition}, function(data){
            var response = JSON.parse(data);
            for(var x = 0;x<response["data"].length;x++){
                wasteMap.webMap.addMarker(response["data"][x]["ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["associated_ID"], response["data"][x][wasteMap.mapMarkerDescriptionList[response["data"][x]["map_marker_type_ID"]]], response["data"][x]["longitude"], response["data"][x]["latitude"], false);
            }
        });
        //view own reported illegal dumping
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
                    wasteMap.webMap.addMarker(response["data"][x]["map_marker_ID"], response["data"][x]["map_marker_type_ID"], response["data"][x]["ID"], response["data"][x]["detail"], response["data"][x]["longitude"], response["data"][x]["latitude"], false, wasteMap.createIllegalDumpingForm(response["data"][x]["map_marker_ID"], detail));
                    wasteMap.bindIllegalDumpingFormAction(response["data"][x]["map_marker_ID"]);
                }
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
    });


</script>
