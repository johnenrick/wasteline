<script>
    var LGUManagement = {};
    LGUManagement.retrieveAccount = function(data){
        //loop result
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
                    name : "condition[like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name]",
                    label : "User Full Name",
                    placeholder : "Full Name",
                    type : "text"
            }],
            header : [{
                column_name: "ID",
                sort : 1
            },{
                column_name: "Username"
            },{
                column_name: "Full Name"
            }],
            result_callback : LGUManagement.retrieveAccount
        };
        var LGUManagementTable = new TableComponent("#LGUManagementTableContainer", config);
        
    };
    $(document).ready(function(){
        load_page_component("table_component", LGUManagement.initializeReportManagementTable);
    });

    
</script>
