<script>
    var TableComponent = function(containerSelector, tableConfig){
        var tableComponent = this;
        tableComponent.tableContainer = $(containerSelector);
        tableComponent.tableContainer.append($("#pageComponentContainer .table_component").clone());
        /*Defaul Values*/
        tableConfig["result_limit"] = (typeof tableConfig['result_limit'] === "undefined") ? 20: tableConfig["result_limit"];
        
        /**Creation of Table**/
        /*Header*/
        if(typeof tableConfig["header"] !== "undefined" && tableConfig["header"]){
            for(var x = 0; x < tableConfig["header"].length; x++){
                var column = tableComponent.tableContainer.find(".prototype").find("th").clone();
                column.find(".tableComponentColumnName").text(tableConfig["header"][x]["column_name"]);
                column.attr("sort", (typeof tableConfig["header"][x]["sort"] !== "undefined") ? tableConfig["header"][x]["sort"] : 0);
                tableComponent.tableContainer.find("thead tr").append(column);
            }
        }
        /*Filter*/
        if(typeof tableConfig["filter"] !== "undefined" && tableConfig["filter"]){
            for(var x=0; x < tableConfig["filter"].length; x++){
                var filter;
                switch(tableConfig["filter"][x]["type"]){
                    case "select":
                        filter = tableComponent.tableContainer.find(".prototype").find(".tableComponentFilterOptionSelect").clone();
                        if(typeof tableConfig["filter"][x]["select_option"] !== "undefined" && tableConfig["filter"][x]["select_option"]){
                            for(var y in tableConfig["filter"][x]["select_option"]){
                                filter.find("select").append("<option value='"+y+"'>"+tableConfig["filter"][x]["select_option"][y]+"</option>");
                            }
                        }
                        break;
                    case "textarea":
                        
                        break;
                    default :
                        filter = tableComponent.tableContainer.find(".prototype").find(".tableComponentFilterOption").clone();
                        break;
                }
                filter.find(".form-control").attr("name", "condition[" +tableConfig["filter"][x]["name"] +"]");
                filter.find(".form-control").attr("type", tableConfig["filter"][x]["type"]);
                filter.find(".form-control").attr("placeholder", tableConfig["filter"][x]["placeholder"]);
                filter.find("label").text(tableConfig["filter"][x]["label"]);
                tableComponent.tableContainer.find(".tableComponentFilterForm").prepend(filter);
            }
        }
        
        
        /*Sorting*/
        
        
        /**Functions**/
        /*Filtering*/
        tableComponent.tableContainer.find(".tableComponentFilterForm").find("input[name=limit]").val(tableConfig["result_limit"]);
        tableComponent.tableContainer.find(".tableComponentFilterForm").attr("action", tableConfig["api_link"]);
        tableComponent.tableContainer.find(".tableComponentFilterForm").ajaxForm({
            beforeSubmit : function(data, $form, options){
                data.push({
                    name : "offset",
                    type : "text",
                    required : false,
                    value : tableConfig["result_limit"]*tableComponent.tableContainer.find(".tableComponentCurrentPage").val()
                })
                console.log(data);
            },
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                tableComponent.tableContainer.find("table tbody").empty();
            }
        })
    };
</script>