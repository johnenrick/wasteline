<script>
    var reportManagement = {};
    
    reportManagement.initializeReportManagementTable = function(){
        var reportManagementTable = new TableComponent("#reportTableContainer");
        
    };
    $(document).ready(function(){
        load_page_component("table_component", reportManagement.initializeReportManagementTable);
    });
</script>
