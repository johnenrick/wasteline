<script>
    var TableComponent = function(containerSelector){
        this.tableContainer = $(containerSelector);
        console.log(this.tableContainer);
        this.tableContainer.append($("#pageComponentContainer .table_component").clone());
    };
</script>