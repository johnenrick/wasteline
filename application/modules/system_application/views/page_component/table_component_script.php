<script>
    var TableComponent = function(containerSelector){
        this.tableContainer = $(containerSelector);
        this.tableContainer.append($("#pageComponentContainer .table_component").clone());
    };
</script>