<script>
    $(document).ready(function(){
        $("#registrationForm").attr("action", api_url("c_account/createAccount"));
        $("#registrationForm").ajaxForm({
            beforeSubmit : function(){
                
            },
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                if(!response["error"].length){
                    
                }else{
                    
                }
            }
        });
    });
</script>