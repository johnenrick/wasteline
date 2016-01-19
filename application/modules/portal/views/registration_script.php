<script>
    $(document).ready(function(){
        $("#registrationForm").validator();
        $("#registrationForm").attr("action", api_url("c_account/createAccount"));
        $("#registrationForm").ajaxForm({
            beforeSubmit : function(){
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#registrationForm"));
                if(!response["error"].length){
                    console.log(response);
                }else{
                    console.log(response);
                    show_form_error($("#registrationForm"), response["error"]);
                }
            }
        });
    });
</script>