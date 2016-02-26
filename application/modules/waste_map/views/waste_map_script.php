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
    };
    wasteMap.initializeWastemapManagement = function(){
        wasteMap.webMap = new WebMapComponent("#wasteMapContainer",{
            gps_location : true,
            search_location : true,
            heat_layer : true
        });
        wasteMap.doneInit = true;
        for(var x = 0; x < wasteMap.initFunction.length;x++){
            wasteMap.initFunction[x]();
        }
        
    };
    /**
     * Bind events to the html in PopUp since it recreates the popup eveytime it is viewed so events will have to be rebinded
     * @param {type} markerListID
     * @returns {undefined}
     */
    wasteMap.bindOwnWasteFormAction = function(markerListID){
        wasteMap.webMap.markerList[markerListID].on("click",function(e){
            if(e.target._popup._isOpen){
                var accountID = $(e.target._popup._contentNode).find("[name=account_ID]").val();
                $.post(api_url("C_account/retrieveAccount"), {ID : accountID, with_waste_post : true}, function(data){
                    var response = JSON.parse(data);
                    console.log(response);
                    if(!response["error"].length){
                        $(e.target._popup._contentNode).find(".panel-title span").text((response["data"]["first_name"]+" "+(response["data"]["middle_name"]+"").charAt(0)+(response["data"]["middle_name"] !== "" ? ".":"")+" "+response["data"]["last_name"]).toUpperCase());
                        $(e.target._popup._contentNode).find(".wasteMapOwnWasteEmailDetail").text(response["data"]["email_detail"]);
                        $(e.target._popup._contentNode).find(".wasteMapOwnWasteContactDetail").text(response["data"]["contact_number_detail"]);
                        var wastePost = response["data"]["waste_post"];
                        if(wastePost){
                            for(var x = 0; x < wastePost.length; x++){
                                $(e.target._popup._contentNode).find(".wasteMapPostList[waste_post_type="+wastePost[x]["waste_post_type_ID"]+"]").show();
                                $(e.target._popup._contentNode).find(".wasteMapPostList[waste_post_type="+wastePost[x]["waste_post_type_ID"]+"]").find("tbody").append(
                                        "<tr><td>"
                                        +( wastePost[x]["quantity"] === null ? "":"("+wastePost[x]["quantity"]+ (wastePost[x]["unit_ID"] === "0" ? "":wastePost[x]["unit_notation"])+") ")+wastePost[x]["description"]
                                        +"</td><td>"
                                        +((wastePost[x]["price"] === null) ? "NA": wastePost[x]["price"])
                                        +"</td><tr>"
                                        );
                                if(wastePost[x]["waste_post_type_ID"]*1 === 1){
                                    $(e.target._popup._contentNode).find(".wasteMapLGUOption button").show();
                                }
                                
                            }
                        }
                    }else{
                        console.log(response);
                    }
                });
                
                
                
                /*Collect*/
                $(e.target._popup._contentNode).find("button[button_action=1]").click(function(){
                    var mapMarkerID = e.target.options.map_marker_ID;
                    $.post(api_url("C_waste_post/updateWastePost"), {condition : {account_ID : accountID, waste_post_type_ID:1, status : 1}, updated_data : {status : 2 }}, function(data){
                        var response = JSON.parse(data);
                        if(!response["error"].length){
                            wasteMap.webMap.markerList[mapMarkerID].closePopup();
                            
                        }
                    });
                });
            }
        });
    };
    wasteMap.retrieveMapMarker = function(condition){
        /*Retrieve markers with types specified in condition.map_marker_type_ID */
        $.post(api_url("C_map_marker/retrieveMapMarker"), {condition: condition, waste_post : true}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                for(var x = 0;x<response["data"].length;x++){console.log()
                    if(((typeof wasteMap.webMap.markerList[response["data"][x]["ID"]] === "undefined") || ((response["data"][x]["waste_post_type_ID"] === "3" || response["data"][x]["waste_post_type_ID"] === "2" )) && (wasteMap.webMap.markerList[response["data"][x]["ID"]].options.map_marker_type_ID !== 5))  ){
                        var mapMarkerTypeID = (response["data"][x]["waste_post_type_ID"] === "1") ? 1 : 4;
                        wasteMap.webMap.addMarker(response["data"][x]["ID"], mapMarkerTypeID, response["data"][x]["associated_ID"], response["data"][x][wasteMap.mapMarkerDescriptionList[response["data"][x]["map_marker_type_ID"]]], response["data"][x]["longitude"], response["data"][x]["latitude"], false, wasteMap.createOwnWasteForm(response["data"][x]["ID"], response["data"][x]["account_ID"]));
                        wasteMap.bindOwnWasteFormAction(response["data"][x]["ID"]);
                    }
                }
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
    wasteMap.createOwnWasteForm = function(mapMarkerID, accountID){
        var popupContent  = $(".prototype .wasteMapOwnWaste").clone();
        popupContent.find(".wasteMapOwnWasteForm").find("input[name=map_marker_type_ID]").val(mapMarkerID);
        popupContent.find(".wasteMapOwnWasteForm").find("input[name=account_ID]").val(accountID);
        return popupContent.prop("outerHTML");//converts the html to string since popup only accept string
    };
    $(document).ready(function(){
        load_page_component("web_map_component", wasteMap.initializeWastemapManagement);
        wasteMap.filterFunction["1"] = function(){//User with waste
            wasteMap.retrieveMapMarker({waste_post__waste_post_type_ID : [1, null], waste_post__status : [1, null]});
        };
        wasteMap.filterFunction["not_1"] = function(){
            wasteMap.webMap.removeMarkerList(null, 1);
        };
        wasteMap.filterFunction["2"] = function(){//user with services
            wasteMap.retrieveMapMarker({waste_post__waste_post_type_ID : [2, 3], waste_post__status : 1});
        };
        wasteMap.filterFunction["not_2"] = function(){
            wasteMap.webMap.removeMarkerList(null, 4);
            wasteMap.filterFunction["1"]();
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
        add_refresh_call("waste_map", function(){
            wasteMap.addInitFunction(function(){
                $.post(api_url("C_account/retrieveAccount"), {ID:user_id()}, function(data){
                    var response = JSON.parse(data);
                    if(!response.length){
                        wasteMap.webMap.addMarker(response["data"]["account_address_map_marker_ID"], 5, response["data"]["acount_address_ID"], response["data"]["account_address_description"], response["data"]["account_address_longitude"], response["data"]["account_address_latitude"], false, wasteMap.createOwnWasteForm(response["data"]["account_address_map_marker_ID"], response["data"]["account_ID"]));
                        wasteMap.bindOwnWasteFormAction(response["data"]["account_address_map_marker_ID"]);
                    }
                });
            });
        });
    });


</script>
