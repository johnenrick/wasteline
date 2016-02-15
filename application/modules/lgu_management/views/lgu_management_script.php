<script>
    var LGUManagement = {};
    LGUManagement.retrieveLGUAccount = function(data){
        for(var x = 0; x < data.length; x++){
            
            var tableRow = $(".prototype").find(".LGUManagementTableRow").clone();
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
                    name : "test",
                    label : "ID",
                    placeholder : "ID",
                    type : "select",
                    select_option : {
                        1 : "Testing",
                        5 : "Hahasula"
                    },
                    default_value : 1
            }, {
                    name : "like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name",
                    label : "User Full Name",
                    placeholder : "Full Name",
                    type : "text"
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
        
    };
    $(document).ready(function(){
        load_page_component("table_component", LGUManagement.initializeReportManagementTable);
    });

    
</script>
