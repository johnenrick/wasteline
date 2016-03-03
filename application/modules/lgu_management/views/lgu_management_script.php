<script>
    var LGUManagement = {};
    LGUManagement.retrieveLGUAccount = function(data){
        for(var x = 0; x < data.length; x++){
            var tableRow = $(".prototype").find(".LGUManagementTableRow").clone();
            tableRow.attr("account_ID", data[x]["ID"]);
            tableRow.find(".LGUManagementID").text(data[x]["ID"]);
            tableRow.find(".LGUManagementUsername").text(data[x]["username"]);
            tableRow.find(".LGUManagementFullName").text(data[x]["last_name"]+", "+data[x]["first_name"]+" "+data[x]["middle_name"]);
            LGUManagement.LGUManagementTable.addRow(tableRow);
        }
    };

    LGUManagement.initializeReportManagementTable = function(){
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
            result_limit : 3,
            result_callback : LGUManagement.retrieveLGUAccount
        };
        LGUManagement.LGUManagementTable = new TableComponent("#LGUManagementTableContainer", config);
        LGUManagement.LGUManagementTable.refreshResult();
        $("#LGUManagementTableContainer").find(".tableComponentTable").on("click", ".LGUManagementTableViewDetail", function(){
           LGUManagement.viewUserDetail($(this).parent().parent().attr("account_ID"));
        });
    };
    LGUManagement.viewUserDetail = function(accountID){
        $("#LGUManagementTableContainer").find(".tableComponentTable .LGUManagementTableViewDetail").button("loading");
        $.post(api_url("C_account/retrieveAccount"), {ID : accountID}, function(data){
           var response = JSON.parse(data);
           if(!response["error"].length){
                $("#LGUManagementUserDetailForm").attr("action", api_url("C_account/updateAccount"));
                $("#LGUManagementUserDetailForm").find("input[is_data=1]").each(function(){
                    $(this).attr("name", "updated_data["+$(this).attr("input_name")+"]");
                });
                $("#LGUManagementUserDetailForm").find("[name=ID]").val(response["data"]["ID"]);
                $("#LGUManagementUserDetailForm").find("[input_name=first_name]").val(response["data"]["first_name"]);
                $("#LGUManagementUserDetailForm").find("[input_name=middle_name]").val(response["data"]["middle_name"]);
                $("#LGUManagementUserDetailForm").find("[input_name=last_name]").val(response["data"]["last_name"]);
                $("#LGUManagementUserDetailForm").find("[input_name=contact_number_detail]").val(response["data"]["contact_number_detail"]);
                $("#LGUManagementUserDetailForm").find("[input_name=email_detail]").val(response["data"]["email_detail"]);
                $("#LGUManagementUserDetailForm").find("[input_name=email_detail]").attr("initial_value", response["data"]["email_detail"]);
                $("#LGUManagementUserDetailForm").find("[input_name=username]").val(response["data"]["username"]);
                $("#LGUManagementUserDetailForm").find("[input_name=username]").attr("initial_value", response["data"]["username"]);
                $("#LGUManagementUserDetailForm").find("[input_name=password]").val("");
                $("#LGUManagementUserDetailForm").find("[input_name=confirm_password]").val("");
                $("#LGUManagementUserDetail").modal("show");
                if(response["data"]["status"]*1 === 1){
                    $(".LGUManagementUserDetailChangeAccountStatus[status=3]").show();
                    $(".LGUManagementUserDetailChangeAccountStatus[status=1]").hide();
                    $("#LGUManagementUserDetailDeactiveNotice").hide();
                }else if(response["data"]["status"]*1 === 3){
                    $(".LGUManagementUserDetailChangeAccountStatus[status=3]").hide();
                    $(".LGUManagementUserDetailChangeAccountStatus[status=1]").show();
                    $("#LGUManagementUserDetailDeactiveNotice").show();
                }
                $(".LGUManagementUserDetailChangeAccountStatus").button("reset");
                $("#LGUManagementTableContainer").find(".tableComponentTable .LGUManagementTableViewDetail").button("reset");
           }
        });
    };
    $(document).ready(function(){
        load_page_component("table_component", LGUManagement.initializeReportManagementTable);
        $("#LGUManagementCreateUser").click(function(){
            $(".LGUManagementUserDetailChangeAccountStatus").hide();
            $("#LGUManagementUserDetailDeactiveNotice").hide();
            $("#LGUManagementUserDetailForm")[0].reset();
            $("#LGUManagementUserDetailForm").find("[name=ID]").val(0);
            $("#LGUManagementUserDetailForm").attr("action", api_url("C_account/createAccount"));
            $("#LGUManagementUserDetailForm").find("input[is_data=1]").each(function(){
               $(this).attr("name", $(this).attr("input_name"));
            });
            $("#LGUManagementUserDetail").modal("show");
        });
        $(".LGUManagementUserDetailChangeAccountStatus").click(function(){
            $(".LGUManagementUserDetailChangeAccountStatus").button("loading");
            $.post(api_url("C_account/updateAccount"), {ID : $("#LGUManagementUserDetailForm").find("[name=ID]").val(),updated_data : {status : $(this).attr("status")}}, function(data){

                var response = JSON.parse(data);
                if(!response["data"].length){
                    LGUManagement.viewUserDetail($("#LGUManagementUserDetailForm").find("[name=ID]").val());
                }else{

                }
            });
        });

        $("#LGUManagementUserDetailForm").validator();
        $("#LGUManagementUserDetailForm").attr("action", api_url("C_account/createAccount"));
        $("#LGUManagementUserDetailForm").ajaxForm({
            beforeSubmit : function(data){
                //If Update
                if(($("#LGUManagementUserDetailForm").attr("action") === api_url("C_account/updateAccount"))){
                    if($("#LGUManagementUserDetailForm").find("input[input_name='password']").val() === ""){
                        data.splice(11,1);
                    }
                    if($("#LGUManagementUserDetailForm").find("input[input_name='username']").val() === $("#LGUManagementUserDetailForm").find("input[input_name='username']").attr("initial_value")){
                        data.splice(10,1);
                    }
                    if($("#LGUManagementUserDetailForm").find("input[input_name='email_detail']").val() === $("#LGUManagementUserDetailForm").find("input[input_name='email_detail']").attr("initial_value")){
                        data.splice(9,1);
                        data.splice(8,1);
                    }
                }
                //match password
                if( $("#LGUManagementUserDetailForm").find("input[input_name='password']").val() !== $("#LGUManagementUserDetailForm").find("input[input_name='confirm_password']").val()){
                    $("#LGUManagementUserDetailForm").find(".formMessage").text("* Password mismatch");
                    $("#LGUManagementUserDetailForm").find("input[input_name='password']").val("");
                    $("#LGUManagementUserDetailForm").find("input[input_name='confirm_password']").val("");
                    $("#LGUManagementUserDetailForm").find("input[input_name='password']").trigger("change");
                    $("#LGUManagementUserDetailForm").find("input[input_name='confirm_password']").trigger("change");
                    return false;
                }
                $("#LGUManagementUserDetailForm").find("button[type='submit']").button("loading");
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#LGUManagementUserDetailForm"));
                $("#LGUManagementUserDetailForm").find("button[type='submit']").button("reset");
                if(!response["error"].length){
                    LGUManagement.viewUserDetail(($("#LGUManagementUserDetailForm").find("[name=ID]").val()*1) ? $("#LGUManagementUserDetailForm").find("[name=ID]").val() : response["data"]);
                    LGUManagement.LGUManagementTable.refreshResult();
                }else{
                    show_form_error($("#LGUManagementUserDetailForm"), response["error"]);
                }

            }
        });

    });

</script>
