<script>
    $(document).ready(function(){
        listModule();
    });
    function listModule(){
        $.post("<?=api_url()?>C_access_control_list/retrieveModule", {}, function(data){
            var response = JSON.parse(data);
            console.log(response);
            if(!response["error"].length){
                $("#moduleTable tbody").empty();
                for(var ctr = 0; ctr < response["data"].length; ctr++){
                    var moduleTableRow = $(".prototype .moduleTableRow").clone();
                    moduleTableRow.find(".moduleID").text(response[ctr]["ID"]);
                    moduleTableRow.find(".moduleDescription").text(response[ctr]["description"]);
                    moduleTableRow.find(".moduleParent")
                    moduleTableRow.find(".moduleParent").text(response[ctr]["parent_ID"]);
                }
            }
        });
        
    }
</script>