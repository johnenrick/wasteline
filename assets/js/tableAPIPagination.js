/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function ( $ ) {
/*global systemUtility*/
    $.fn.apipagination = function( options ) {
        var selectedTable = this;
        var postRequest = false;
        var messageContainer = false;
        var filterData = {};
        var settings = $.extend({
            apiUrl : "",
            callBackFn : false,
            pageLimit : 20,
            tableStyle: {
            },
            tableSorter : {
            },
            tableFilter :{
            },
            responseCallback : false,
            customFilterGenerator : false
        }, options );
        settings.tableStyle = $.extend({
                theadPosition : 1,
                btnNavClass : "btn"
            }, options.tableStyle);
        settings.tableSorter = $.extend({
            }, options.tableSorter);
        settings.tableFilter = $.extend({
            }, options.tableFilter);
          
        /*table construction*/
        var thead = selectedTable.find("thead tr:nth-child("+settings.tableStyle.theadPosition+")");
        //filter
        if(!jQuery.isEmptyObject(settings.tableFilter)){
            selectedTable.find("thead").prepend("<tr><th colspan='"+thead.find("th").length+"'><div class='btn-group'></div></th></tr>");
            var filterHead = selectedTable.find("thead tr:first-child").find(".btn-group");
            filterHead.prepend(
                    '<button type="button" class="btn btn-default tp_openFilter"> <span class="glyphicon glyphicon-filter"></span> Search Filter</button>' +
                    '<div class="dropdown-menu panel-body tp_filterPanel" style="width:400px">'+
                    '<div class="row"><form class="form-horizontal"><div class="col-md-12 tp_filterOptions"></div></form></div><div class="row"><div class="col-md-12" style="text-align:center"><button class="btn btn-primary tp_startFilter"><span class="glyphicon glyphicon-filter"></span>Filter Search</button> <button class="btn btn-default tp_closeFilter"><span class="glyphicon glyphicon-remove "></span>Close</button></div></div>' 
                    );
            var filterOptionString = '<div class="form-group"><label class="col-sm-5 control-label">Option One</label><div class="col-md-7"><input  class="form-control" type="text"></div></div>';
           
            for(var thIndex in settings.tableFilter){
                
                filterHead.find(".tp_filterOptions").append(filterOptionString);
                filterHead.find(".tp_filterOptions").children().last().find("label").text(settings.tableFilter[thIndex]);
                filterHead.find(".tp_filterOptions").children().last().find("input").attr("placeholder",settings.tableFilter[thIndex]).attr("name",thIndex);
                
            }
        }
        //message
        selectedTable.find("thead").prepend("<tr><th colspan='"+thead.find("th").length+"'><div class='tp_message'></div></th></tr>");
        
        //Header
        if(!jQuery.isEmptyObject(settings.tableSorter)){
            for(var thIndex in settings.tableSorter){
                thead.find("th:nth-child("+thIndex+")").attr("sorter_name", settings.tableSorter[thIndex]);
                thead.find("th:nth-child("+thIndex+")").attr("sort", 0);
                thead.find("th:nth-child("+thIndex+")").removeClass("tp_headerSorter");
                thead.find("th:nth-child("+thIndex+")").addClass("tp_headerSorter");
                thead.find("th:nth-child("+thIndex+")").append("<span style='font-size:10px' class='glyphicon' ></span>");
            }
        }
        
        //footer
        selectedTable.find("tfoot").append("<tr></tr>");
        var pageNav = selectedTable.find("tfoot tr:last-child");
        pageNav.append(
                "<td style='font-size:13px;font-weight:bold' ><span class='tp_totalResult' >0</span> Results</td>" +
                "<td style='text-align:center;'  colspan='"+(thead.find("th").length-2)+"' ><button class='tp_previousPage "+settings.tableStyle.btnNavClass+"' >Previous</button> <button class='tp_nextPage "+settings.tableStyle.btnNavClass+"' >Next</button> </td>"+
                "<td>Page <span class='tp_currentPage'>0</span> of <span class='tp_totalPage'>0</span></td>"   
                );
        
        /*Events*/
        //filter
        selectedTable.find(".tp_openFilter").click(function(){
            selectedTable.find(".tp_filterPanel").toggle('open');
        });
        selectedTable.find(".tp_closeFilter").click(function(){
            selectedTable.find(".tp_filterPanel").toggle('open');
        });
        selectedTable.find(".tp_startFilter").click(function(){
            for(var thIndex in settings.tableFilter){
                (filterHead.find(".tp_filterOptions").find("input[name="+thIndex+"]").val() !== "") ? filterData[thIndex] = filterHead.find(".tp_filterOptions").find("input[name="+thIndex+"]").val() : delete filterData[thIndex];
            }
            selectedTable.find(".tp_currentPage").text(1);
            retrieveData();
        });
        //next & previous
        selectedTable.find(".tp_previousPage").click(function(){
            if(selectedTable.find(".tp_currentPage").text()*1 - 1){
                selectedTable.find(".tp_currentPage").text(selectedTable.find(".tp_currentPage").text()*1-1);
                retrieveData();
            }
            
        });
        selectedTable.find(".tp_nextPage").click(function(){
            selectedTable.find(".tp_currentPage").text(selectedTable.find(".tp_currentPage").text()*1+1);
            retrieveData();
        });
        //sorting
        selectedTable.find(".tp_headerSorter").click(function(){
            filterData.sort = {};
            var sorters = $(this).attr("sorter_name").split(",");
            for(var x = 0; x < sorters.length; x++){
                filterData.sort[sorters[x]] = $(this).attr("sort");
            }
            $(this).attr("sort", ~$(this).attr("sort"));
            retrieveData();
        });
        /*Functions*/
        function retrieveData(){
            if(postRequest){
                postRequest.abort();
                selectedTable.find(".tp_message").find(".alert-info").remove();
                postRequest = false;
                messageContainer.remove();
            }
            selectedTable.find("thead button, tfoot button").button("loading");
            messageContainer = systemUtility.showMessage(selectedTable.find(".tp_message"), "Please Wait...", "info", 0);
            //filterData = (typeof filterData === "undefined") ? {} : filterData;
            filterData.retrieve_type = 1;
            filterData.limit = settings.pageLimit;
            filterData.offset = (((selectedTable.find(".tp_currentPage").text()*1 - 1) >= 0) ? selectedTable.find(".tp_currentPage").text()*1 - 1 : 0) *settings.pageLimit;
            if(settings.customFilterGenerator){
                filterData = $.extend(filterData, settings.customFilterGenerator());
            }
         
            postRequest = $.post(settings.apiUrl, filterData, function(data){
                var response = JSON.parse(data);
                selectedTable.find(".tp_totalResult").text(response["result_count"]);
                (response["result_count"]*1 === 0) ? selectedTable.find(".tp_currentPage").text(0) : null;
                selectedTable.find(".tp_totalPage").text(Math.ceil(response["result_count"]/filterData.limit));
                if(selectedTable.find(".tp_currentPage").text()*1 <= selectedTable.find(".tp_totalPage").text()*1){
                    selectedTable.find("tbody").empty();
                }else{
                    selectedTable.find(".tp_currentPage").text(selectedTable.find(".tp_currentPage").text()*1-1);
                }
                settings.responseCallback(response);
                systemUtility.showErrorMessage(selectedTable.find(".tp_message"), response["error"]);
                selectedTable.find("thead button, tfoot button").button("reset");
                messageContainer.remove();
            });
        }
       
        
        return {
            showPage : function(){
                selectedTable.find(".tp_startFilter").trigger("click")
            }
        };
 
    };
}( jQuery ));

