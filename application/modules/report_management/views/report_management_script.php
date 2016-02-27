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
            tableRow.find(".reportManagementType").text((data[x]["report_type_ID"] == 3)? "Illegal Dumping" : (data[x]["report_type_ID"] == 2)? "Article" : "Marker");
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
    };

    reportManagement.initializeWebMap = function(){
        if(typeof reportManagement.webMap === "undefined"){
            reportManagement.webMap = new WebMapComponent("#reportManagementWebMap");
            //reportManagement.webMap.selectLocation(reportManagement.changeAddress);
            //reportManagement.webMap.getCurrentLocationCallBack = reportManagement.changeAddress;
            //reportManagement.viewProfile();

        }
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
                }else{
                    
                }
            });
        });
    });
    
</script>

    

