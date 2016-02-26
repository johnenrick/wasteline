<script>
    var userManagement = {};
    userManagement.retrieveUserAcount = function(data){
        for(var x = 0; x < data.length; x++){
            var tableRow = $(".prototype").find(".userManagementTableRow").clone();
            tableRow.attr("account_ID", data[x]["ID"]);
            tableRow.find(".userManagementID").text(data[x]["ID"]);
            tableRow.find(".userManagementUsername").text(data[x]["username"]);
            tableRow.find(".userManagementFullName").text(data[x]["last_name"]+", "+data[x]["first_name"]+" "+data[x]["middle_name"]);
            userManagement.userManagementTable.addRow(tableRow);
        }
    };
    
    userManagement.initializeReportManagementTable = function(){
        var config = {
            api_link : api_url("C_account/retrieveAccount"),
            filter : [{
                    name : "like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name",
                    label : "User Full Name",
                    placeholder : "Full Name",
                    type : "text",
                    value_modification : function(formData){
                        for(var x = 0; x < formData.length; x++){
                            if(formData[x]["name"] === "condition["+"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name"+"]"){
                                var valueSegment = (formData[x]["value"]).replace(",","").split(" ");
                                formData.splice(x, 1);
                                for(var y = 0; y < valueSegment.length; y++){
                                    formData.push({
                                        name : "condition["+"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name"+"]["+y+"]",
                                        value : valueSegment[y],
                                        type : "text",
                                        required : false
                                    });
                                }
                            }
                        }
                    }
            },{
                name : "account_type_ID",
                value : 2,
                type : "hidden"
            },{
                name : "status",
                label : "Status",
                placeholder : "Status",
                type : "select",
                select_option :{
                    NULL : "Any",
                    1 : "Active",
                    3 : "Deactivated"
                }
            }],
            header : [{
                column_name: "ID",
                column_label : "ID",
                sort : -1
            },{
                column_name: "username",
                column_label : "Username"
            },{
                column_name: "",
                column_label : "Name",
                sort : 0,
                sort_column : [
                    "account_basic_information__last_name",
                    "account_basic_information__first_name",
                    "account_basic_information__last_name"
                ]
            }],
            result_limit : 30,
            result_callback : userManagement.retrieveUserAcount
        };
        userManagement.userManagementTable = new TableComponent("#userManagementTableContainer", config);
        userManagement.userManagementTable.refreshResult();
        $("#userManagementTableContainer").find(".tableComponentTable").on("click", ".userManagementTableViewDetail", function(){
           userManagement.viewUserDetail($(this).parent().parent().attr("account_ID"));
        });
    };
    userManagement.viewUserDetail = function(accountID){
                            
                  
        $("#userManagementTableContainer").find(".tableComponentTable .userManagementTableViewDetail").button("loading");
        $.post(api_url("C_account/retrieveAccount"), {ID : accountID}, function(data){
           var response = JSON.parse(data);
           if(!response["error"].length){
                $("#userManagementUserDetailForm").attr("action", api_url("C_account/updateAccount"));
                $("#userManagementUserDetailForm").find("input[is_data=1]").each(function(){
                    $(this).attr("name", "updated_data["+$(this).attr("input_name")+"]");
                });
                $("#userManagementUserDetailForm").find("[name=ID]").val(response["data"]["ID"]);
                $("#userManagementUserDetailForm").find("[input_name=first_name]").val(response["data"]["first_name"]);
                $("#userManagementUserDetailForm").find("[input_name=middle_name]").val(response["data"]["middle_name"]);
                $("#userManagementUserDetailForm").find("[input_name=last_name]").val(response["data"]["last_name"]);
                $("#userManagementUserDetailForm").find("[input_name=contact_number_detail]").val(response["data"]["contact_number_detail"]);
                $("#userManagementUserDetailForm").find("[input_name=email_detail]").val(response["data"]["email_detail"]);
                $("#userManagementUserDetailForm").find("[input_name=email_detail]").attr("initial_value", response["data"]["email_detail"]);
                $("#userManagementUserDetailForm").find("[input_name=username]").val(response["data"]["username"]);
                $("#userManagementUserDetailForm").find("[input_name=username]").attr("initial_value", response["data"]["username"]);
                $("#userManagementUserDetailForm").find("[input_name=password]").val("");
                $("#userManagementUserDetailForm").find("[input_name=confirm_password]").val("");
                $("#userManagementUserDetailForm").find("[name=account_address_latitude]").val(response["data"]["account_address_latitude"]);
                $("#userManagementUserDetailForm").find("[name=account_address_longitude]").val(response["data"]["account_address_longitude"]);
                $("#userManagementUserDetailForm").find("[name=account_address_map_marker_ID]").val(response["data"]["account_address_map_marker_ID"]);
                $("#userManagementUserDetailForm").find("[name=account_address_ID]").val(response["data"]["account_address_ID"]);
                $("#userManagementUserDetailForm").find("[name=account_address_description]").val(response["data"]["account_address_description"]);
                $("#userManagementUserDetail").modal("show");
                if(response["data"]["status"]*1 === 1){
                    $(".userManagementUserDetailChangeAccountStatus[status=3]").show();
                    $(".userManagementUserDetailChangeAccountStatus[status=1]").hide();
                    $("#userManagementUserDetailDeactiveNotice").hide();
                }else if(response["data"]["status"]*1 === 3){
                    $(".userManagementUserDetailChangeAccountStatus[status=3]").hide();
                    $(".userManagementUserDetailChangeAccountStatus[status=1]").show();
                    $("#userManagementUserDetailDeactiveNotice").show();
                }
                $(".userManagementUserDetailChangeAccountStatus").button("reset");
                $("#userManagementTableContainer").find(".tableComponentTable .userManagementTableViewDetail").button("reset");
                setTimeout(function(){
                    if(userManagement.isMapInitialized){
                        if(typeof userManagement.webMap === "undefined"){
                            userManagement.webMap = new WebMapComponent("#userManagementDetailMapContainer");
                        }
                        if(typeof userManagement.webMap !== "undefined" ){
                            for(var x in userManagement.webMap.markerList){
                                if(x*1 > 0){
                                    userManagement.webMap.removeMarkerList(x);
                                }
                            }
                            if($("#userManagementUserDetailForm").find("[name=account_address_map_marker_ID]").val() !== ""){
                                userManagement.webMap.addMarker(
                                        $("#userManagementUserDetailForm").find("[name=account_address_map_marker_ID]").val(), 
                                        1, 
                                        $("#userManagementUserDetailForm").find("[name=account_address_ID]").val(), 
                                        $("#userManagementUserDetailForm").find("[name=account_address_description]").val(), 
                                        $("#userManagementUserDetailForm").find("[name=account_address_longitude]").val(), 
                                        $("#userManagementUserDetailForm").find("[name=account_address_latitude]").val()
                                        );
                                userManagement.webMap.setView($("#userManagementUserDetailForm").find("[name=account_address_latitude]").val(), $("#userManagementUserDetailForm").find("[name=account_address_longitude]").val());
                            }
                        }
                    }else{
                        
                    }
                },500);
           }
        });
    };
    userManagement.isMapInitialized = false;
    userManagement.initializeWebMapComponent = function(){
        userManagement.isMapInitialized = true;
    };
    $(document).ready(function(){
        $("#userManagementHolder").addClass("scroll-on");
        load_page_component("table_component", userManagement.initializeReportManagementTable);
        load_page_component("web_map_component", userManagement.initializeWebMapComponent);
        $("#userManagementCreateUser").click(function(){
            $(".userManagementUserDetailChangeAccountStatus").hide();
            $("#userManagementUserDetailDeactiveNotice").hide();
            $("#userManagementUserDetailForm")[0].reset();
            $("#userManagementUserDetailForm").find("[name=ID]").val(0);
            $("#userManagementUserDetailForm").attr("action", api_url("C_account/createAccount"));
            $("#userManagementUserDetailForm").find("input[is_data=1]").each(function(){
               $(this).attr("name", $(this).attr("input_name"));
            });
            $("#userManagementUserDetail").modal("show");
        });
        $(".userManagementUserDetailChangeAccountStatus").click(function(){
            $(".userManagementUserDetailChangeAccountStatus").button("loading");
            $.post(api_url("C_account/updateAccount"), {ID : $("#userManagementUserDetailForm").find("[name=ID]").val(),updated_data : {status : $(this).attr("status")}}, function(data){
            
                var response = JSON.parse(data);
                if(!response["data"].length){
                    userManagement.viewUserDetail($("#userManagementUserDetailForm").find("[name=ID]").val());
                }else{
                    
                }
            });
        });
        
    });
    
</script>