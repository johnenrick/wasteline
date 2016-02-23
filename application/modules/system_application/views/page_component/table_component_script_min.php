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
                column.find(".tableComponentColumnName").text(tableConfig["header"][x]["column_label"]);
                //Sort
                if(typeof tableConfig["header"][x]["sort_column"] !== "undefined"){
                    if(tableConfig["header"][x]["sort_column"].constructor === Array){
                        var sortColumn = "";
                        for(var y = 0; y < tableConfig["header"][x]["sort_column"].length; y++){
                            sortColumn += (((y !== 0) ? "," : "") + tableConfig["header"][x]["sort_column"][y]);
                        }
                        column.attr("sort_column", sortColumn);
                    }
                }else{
                    column.attr("sort_column", tableConfig["header"][x]["column_name"]);
                }
                column.attr("sort", (typeof tableConfig["header"][x]["sort"] !== "undefined") ? tableConfig["header"][x]["sort"] : 0);
                tableComponent.tableContainer.find("thead tr").append(column);
            }
        }
        /*Filter*/
        tableComponent.filterModification = [];
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
                if(typeof tableConfig["filter"][x]["value_modification"] !== "undefined"){
                    tableComponent.filterModification.push(tableConfig["filter"][x]["value_modification"]);
                }
                
                filter.find(".form-control").attr("name", "condition[" +tableConfig["filter"][x]["name"] +"]");
                filter.find(".form-control").attr("type", tableConfig["filter"][x]["type"]);
                filter.find(".form-control").attr("placeholder", tableConfig["filter"][x]["placeholder"]);
                filter.find("label").text(tableConfig["filter"][x]["label"]);
                if(typeof tableConfig["filter"][x]["value"] !== "undefined"){
                    filter.find(".form-control").val(tableConfig["filter"][x]["value"]);
                }
                tableComponent.tableContainer.find(".tableComponentFilterForm").prepend(filter);
            }
        }
        /*Sorting*/
        /**Functions**/
        /*Request Result*/
        tableComponent.tableContainer.find(".tableComponentFilterForm").find("input[name=limit]").val(tableConfig["result_limit"]);
        tableComponent.tableContainer.find(".tableComponentFilterForm").attr("action", tableConfig["api_link"]);
        tableComponent.tableContainer.find(".tableComponentFilterForm").ajaxForm({
            beforeSubmit : function(data, $form, options){
                //set offset for current page
                data.push({
                    name : "offset",
                    type : "text",
                    required : false,
                    value : tableConfig["result_limit"]*((tableComponent.tableContainer.find(".tableComponentCurrentPage").val() > 0) ? tableComponent.tableContainer.find(".tableComponentCurrentPage").val() - 1 : 0)
                });
                //add sorting parameters
                tableComponent.tableContainer.find(".tableComponentTable thead th[sort!='0']").each(function(){
                    var column = $(this).attr("sort_column").split(",");
                    for(var x = 0; x < column.length; x++){
                        data.push({
                            name : "sort["+column[x]+"]",
                            type : "text",
                            required : false,
                            value : ($(this).attr("sort")*1 === 1 )? "asc" : "desc"
                        });
                    }
                });
                //Value modification
                for(var x = 0; x < tableComponent.filterModification.length; x++){
                    tableComponent.filterModification[x](data);
                }
                for(var x = data.length-1; x >= 0; x--){
                    if(data[x]["value"] === "NULL" ){
                        delete data[x];
                    }
                }
                //pagination
                tableComponent.tableContainer.find(".tableComponentPreviousPage").hide();
                tableComponent.tableContainer.find(".tableComponentNextPage").hide();
                tableComponent.tableContainer.find(".tableComponentLoading").show();
            },
            success : function(data){
                var response = JSON.parse(data);
                tableComponent.tableContainer.find("table tbody").empty();
                tableComponent.tableContainer.find(".tableComponentTotalPage").text(Math.ceil(response["result_count"]/tableConfig.result_limit));
                tableComponent.tableContainer.find(".tableComponentTotalResult").text(response["result_count"]);
                if(!response["error"].length){
                    tableComponent.tableContainer.find(".tableComponentCurrentPage").val((tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1 <= 0) ? 1 :  tableComponent.tableContainer.find(".tableComponentCurrentPage").val());
                    tableConfig.result_callback(response["data"]);
                }else{
                    if(response["error"][0]["status"]*1 === 2){//No Result
                        if((tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1  > tableComponent.tableContainer.find(".tableComponentTotalPage").text()*1) && response["result_count"]*1){
                            tableComponent.tableContainer.find(".tableComponentPreviousPage").trigger("click");
                        }else{
                            tableComponent.tableContainer.find(".tableComponentCurrentPage").val(0);
                        }
                    }
                }
                if(tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1 > 1){
                    tableComponent.tableContainer.find(".tableComponentPreviousPage").show();
                }
                tableComponent.tableContainer.find(".tableComponentNextPage").show();
                tableComponent.tableContainer.find(".tableComponentLoading").hide();
            }
        });
        //get result
        tableComponent.refreshResult = function(){
            tableComponent.tableContainer.find(".tableComponentFilterForm").trigger("submit");
        };
        /*Sorting*/
        tableComponent.tableContainer.find(".tableComponentTable thead th").click(function(){
            var selectedColumnSort =$(this).attr("sort")*1;
            tableComponent.tableContainer.find(".tableComponentTable thead th").attr("sort", 0);
            switch(selectedColumnSort){
                 case 1 :
                    $(this).attr("sort", -1);
                    break;
                 case -1 :
                    $(this).attr("sort", 0);
                    break;
                 case 0 :
                    $(this).attr("sort", 1);
                    break;
            }
            tableComponent.sortIndicator();
            tableComponent.refreshResult();
        });
        tableComponent.sortIndicator = function(){
            tableComponent.tableContainer.find(".tableComponentTable thead th").each(function(){
                switch($(this).attr("sort")*1){
                    case 1:
                        $(this).find(".tableComponentColumnSortIndicator").removeClass("glyphicon-triangle-bottom");
                        $(this).find(".tableComponentColumnSortIndicator").addClass("glyphicon-triangle-top");
                        break;
                    case -1:
                        $(this).find(".tableComponentColumnSortIndicator").addClass("glyphicon-triangle-bottom");
                        $(this).find(".tableComponentColumnSortIndicator").removeClass("glyphicon-triangle-top");
                        break;
                    default :
                        $(this).find(".tableComponentColumnSortIndicator").removeClass("glyphicon-triangle-bottom");
                        $(this).find(".tableComponentColumnSortIndicator").removeClass("glyphicon-triangle-top");
                        break;
                }
            });
        };
        /*Pagination*/
        tableComponent.tableContainer.find(".tableComponentPreviousPage").click(function(){
           if(tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1 > 1){
               tableComponent.tableContainer.find(".tableComponentCurrentPage").val((tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1)-1);
               tableComponent.tableContainer.find(".tableComponentFilterForm").trigger("submit");
            }
        });
        tableComponent.tableContainer.find(".tableComponentNextPage").click(function(){
            tableComponent.tableContainer.find(".tableComponentCurrentPage").val(tableComponent.tableContainer.find(".tableComponentCurrentPage").val()*1+1);
            tableComponent.tableContainer.find(".tableComponentFilterForm").trigger("submit");
        });
        /**
         * Appending Row
         *
         * @param {DOM} newRow Row element to be appended
         * @returns {boolean}
         */
        tableComponent.addRow = function(newRow){
            tableComponent.tableContainer.find(".tableComponentTable tbody").append(newRow);
            return true;
        };
        tableComponent.sortIndicator();
    };
</script>