<script>
    var reportManagement = {};
    
    reportManagement.initializeReportManagementTable = function(){
        $("#ReportTableContainer").append($("#pageComponentContainer .table_component").clone());
        
    };
    $(document).ready(function(){
        loadPageComponent("table_component", reportManagement.initializeReportManagementTable);
    });
</script>
