<script>
    $(document).ready(function(){
        $("#registrationForm").attr("action", api_url("c_account/createAccount"));
        $("#registrationForm").ajaxForm({
            beforeSubmit : function(){
                
            },
            success : function(data){
                console.log(data);
               // var response = JSON.parse(data);
            }
        });
    });
</script>