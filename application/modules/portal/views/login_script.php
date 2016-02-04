<script>
    $(document).ready(function(){
        $("#loginForm").validator();
        $("#loginForm").attr("action", base_url("portal/login"));
        $("#loginForm").ajaxForm({
            beforeSubmit : function(){
            },
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                clear_form_error($("#loginForm"));
                if(!response["error"].length){
                    window.location = base_url();
                }else{
                    show_form_error($("#loginForm"), response["error"]);
                }
            }
        });
        $("#passwordRecoveryForm").validator();
        $("#passwordRecoveryForm").attr("action", base_url("portal/passwordRecovery"));
        $("#passwordRecoveryForm").ajaxForm({
            beforeSubmit : function(){
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#loginForm"));
                 console.log(response);
                if(!response["error"].length){
                    console.log(response);
                }else{
                    show_form_error($("#loginForm"), response["error"]);
                }
            }
        });
    });
</script>