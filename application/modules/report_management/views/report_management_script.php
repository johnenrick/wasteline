<script src="<?=asset_url('js/autoresize.jquery.js')?>"></script>
   <script>
    var reportManagement = {};
    reportManagement.retrieveReportAccount = function(data){
        console.log(data);
        for(var x = 0; x < data.length; x++){
            var tableRow = $(".prototype").find(".reportManagementTableRow").clone();
            tableRow.attr("account_ID", data[x]["ID"]);
            tableRow.find(".reportManagementID").text(data[x]["ID"]);
            tableRow.find(".reportManagementDetails").text(data[x]["detail"]);
            tableRow.find(".reportManagementFullName").text(data[x]["reporter_last_name"]+", "+data[x]["reporter_first_name"]+" "+data[x]["reporter_middle_name"]);
            tableRow.find(".reportManagementType").text((data[x]["report_type_ID"] == 3)? "Illegal Dumping" : (data[x]["report_type_ID"] == 2)? "Article" : "Reported User");
            tableRow.find(".reportManagementStatus").text((data[x]["status"] == 1)? "Ongoing" : "Resolved");
            reportManagement.reportManagementTable.addRow(tableRow);

        }
    };

    reportManagement.initializeReportManagementTable = function(){
        var config = {
            api_link : api_url("C_report/retrieveReport"),
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
                                    })
                                }
                            }
                        }
                    }
            },{
                name : "account_type_ID",
                value : 3,
                type : "hidden"
            },{
                name : "status",
                label : "Status",
                placeholder : "Status",
                type : "select",
                select_option :{
                    NULL : "Any",
                    1 : "On-going",
                    2 : "Resolved"
                }
            }],
            header : [{
                column_name: "ID",
                column_label : "ID",
                sort : -1
            },{
                column_name: "detail",
                column_label:"Detail"

            },{
                column_name: "",
                column_label : "Name",
                sort : 0,
                sort_column : [
                    "account_basic_information__last_name",
                    "account_basic_information__first_name",
                ]
            },{
                column_name: "report__report_type_ID",
                column_label: "Type"
            },{
                column_name: "status",
                column_label : "Status"
            }],
            result_limit : 5,
            result_callback : reportManagement.retrieveReportAccount
        };
        reportManagement.reportManagementTable = new TableComponent("#reportManagementTableContainer", config);
        reportManagement.reportManagementTable.refreshResult();
        $("#reportManagementTableContainer").find(".tableComponentTable").on("click", ".reportManagementTableViewDetail", function(){
           reportManagement.viewUserDetail($(this).parent().parent().attr("account_ID"));
        });
        $("#reportManagementTableContainer").find(".tableComponentTable").on("click", "tr.reportManagementTableRow", function(){
            var w = $(window).width();
            if(w <= 720){
                reportManagement.viewUserDetail($(this).attr("account_ID"));
            }
        });
    };
    reportManagement.isMapInitialized = false;
    reportManagement.initializeWebMap = function(){
        reportManagement.isMapInitialized = true;
    };

    reportManagement.viewUserDetail = function(accountID){
        $("#reportManagementTableContainer").find(".tableComponentTable .reportManagementTableViewDetail").button("loading");
        $.post(api_url("C_report/retrieveReport"), {ID : accountID}, function(data){
           var response = JSON.parse(data);
           if(!response["error"].length){
                $("#reportManagementUserDetailForm").attr("action", api_url("C_report/updateReport"));
                $("#reportManagementUserDetailForm").find("input[is_data=1]").each(function(){
                    $(this).attr("name", "updated_data["+$(this).attr("input_name")+"]");
                });
                $("#reportManagementUserDetailForm").find("[name=ID]").val(response["data"]["ID"]);
                $("#reportManagementUserDetailForm").find("[input_name=reporter_first_name]").val(response["data"]["reporter_first_name"]);
                $("#reportManagementUserDetailForm").find("[input_name=reporter_middle_name]").val(response["data"]["reporter_middle_name"]);
                $("#reportManagementUserDetailForm").find("[input_name=reporter_last_name]").val(response["data"]["reporter_last_name"]);
                $("#reportManagementUserDetailForm").find("[input_name=detail]").val(response["data"]["detail"]);
                
                $("#reportManagementUserDetailForm").find("[name=associated_ID]").val(response["data"]["associated_ID"]);
                $("#reportManagementUserDetailForm").find("[name=report_type_ID]").val(response["data"]["report_type_ID"]);
                $("#reportManagementUserDetailForm").find("[name=map_marker_ID]").val(response["data"]["map_marker_ID"]);
                $("#reportManagementUserDetailForm").find("[name=longitude]").val(response["data"]["longitude"]);
                $("#reportManagementUserDetailForm").find("[name=latitude]").val(response["data"]["latitude"]);
                
                $("#reportManagementUserDetail").modal("show");
                if(response["data"]["status"]*1 === 1){
                    $(".reportManagementUserDetailChangeAccountStatus[status=2]").show();
                    $(".reportManagementUserDetailChangeAccountStatus[status=1]").hide();
                    $("#reportManagementUserDetailDeactiveNotice").hide();
                }else if(response["data"]["status"]*1 === 2){
                    $(".reportManagementUserDetailChangeAccountStatus[status=2]").hide();
                    $(".reportManagementUserDetailChangeAccountStatus[status=1]").show();
                    $("#reportManagementUserDetailDeactiveNotice").show();
                }
                console.log(response);
                setTimeout(function(){
                    if(reportManagement.isMapInitialized){
                        if(typeof reportManagement.webMap === "undefined"){
                            reportManagement.webMap = new WebMapComponent("#reportManagementWebMap");
                        }
                        if(typeof reportManagement.webMap !== "undefined" ){
                            for(var x in reportManagement.webMap.markerList){
                                if(x*1 > 0){
                                    reportManagement.webMap.removeMarkerList(x);
                                }
                            }
                            if($("#reportManagementUserDetailForm").find("[name=report_type_ID]").val() === "1"){
                                $.post(api_url("C_account_address/retrieveAccountAddress"), {
                                    condition : {
                                        account_ID : $("#reportManagementUserDetailForm").find("[name=associated_ID]").val()
                                    }
                                }, function(data){
                                    var response = JSON.parse(data);
                               
                                    if(!response["error"].length){
                                        reportManagement.webMap.addMarker(
                                                response["data"][0]["map_marker_ID"], 
                                                1, 
                                                response["data"][0]["associated_UD"], 
                                                "Reported Location", 
                                                response["data"][0]["longitude"], 
                                                response["data"][0]["latitude"]
                                                );
                                        reportManagement.webMap.setView(response["data"][0]["latitude"], response["data"][0]["longitude"]);
                                    }
                                })
                            }else if($("#reportManagementUserDetailForm").find("[name=report_type_ID]").val() === "3"){
                                if($("#reportManagementUserDetailForm").find("[name=account_address_map_marker_ID]").val() !== ""){
                                    reportManagement.webMap.addMarker(
                                            $("#reportManagementUserDetailForm").find("[name=map_marker_ID]").val(), 
                                            3, 
                                            $("#reportManagementUserDetailForm").find("[name=associated_ID]").val(), 
                                            "Reported Location", 
                                            $("#reportManagementUserDetailForm").find("[name=longitude]").val(), 
                                            $("#reportManagementUserDetailForm").find("[name=latitude]").val()
                                            );
                                    reportManagement.webMap.setView($("#reportManagementUserDetailForm").find("[name=latitude]").val(), $("#reportManagementUserDetailForm").find("[name=longitude]").val());
                                }
                            }
                        }
                    }else{
                        
                    }
                },500);
                $(".reportManagementUserDetailChangeAccountStatus").button("reset");
                $("#reportManagementTableContainer").find(".tableComponentTable .reportManagementTableViewDetail").button("reset");
           }
        });
    };
    $(document).ready(function(){
        load_page_component("table_component", reportManagement.initializeReportManagementTable);
        load_page_component("web_map_component", reportManagement.initializeWebMap);
        $("#reportManagementCreateUser").click(function(){
            $(".reportManagementUserDetailChangeAccountStatus").hide();
            $("#reportManagementUserDetailDeactiveNotice").hide();
            $("#reportManagementUserDetailForm")[0].reset();
            $("#reportManagementUserDetailForm").find("[name=ID]").val(0);
            $("#reportManagementUserDetailForm").attr("action", api_url("C_report/updateReport"));
            $("#reportManagementUserDetailForm").find("input[is_data=1]").each(function(){
               $(this).attr("name", $(this).attr("input_name"));
            });
            $("#reportManagementUserDetail").modal("show");
        });
        $(".reportManagementUserDetailChangeAccountStatus").click(function(){
            $(".reportManagementUserDetailChangeAccountStatus").button("loading");
            $.post(api_url("C_report/updateReport"), {ID : $("#reportManagementUserDetailForm").find("[name=ID]").val(),updated_data : {status : $(this).attr("status")}}, function(data){
                var response = JSON.parse(data);
                if(!response["data"].length){
                    reportManagement.viewUserDetail($("#reportManagementUserDetailForm").find("[name=ID]").val());
                    var id = $("#reportManagementUserDetailForm").find("[name=ID]").val();
                    var status = ($(".reportManagementUserDetailChangeAccountStatus").attr("status")*1 === 1)? "Resolved" : "Ongoing";
                    $("#reportManagementTableContainer").find("table.tableComponentTable tr[account_id='"+ id +"']").find("td.reportManagementStatus").text(status);
                }else{

                }
            });
        });
    });

</script>



