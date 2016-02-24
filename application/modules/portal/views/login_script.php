<script>
    $(document).ready(function(){
        $("#loginForm").validator();
        $("#loginForm").attr("action", base_url("portal/login"));
        $("#loginForm").ajaxForm({
            beforeSubmit : function(){
                $("#loginForm").find(".submitButton").button("loading");
            },
            success : function(data){
                
                var response = JSON.parse(data);
                //console.log(response);
                clear_form_error($("#loginForm"));
                if(!response["error"].length){
                    window.location = base_url();
                }else{
                    show_form_error($("#loginForm"), response["error"]);
                }
                $("#loginForm").find(".submitButton").button("reset");
            }
        });
        $("#passwordRecoveryForm").validator();
        $("#passwordRecoveryForm").attr("action", base_url("portal/passwordRecoveryRequest"));
        $("#passwordRecoveryForm").ajaxForm({
            beforeSubmit : function(){
                $("#passwordRecoveryForm").find(".submitButton").button("loading");
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#passwordRecoveryForm"));
                if(!response["error"].length){
                    setTimeout(function(){
                        $("#passwordRecoveryForm").find("[name='recover_password']").html("Email Sent!");
                    }, 50);
                }else{
                    show_form_error($("#passwordRecoveryForm"), response["error"]);
                }
                $("#passwordRecoveryForm").find(".submitButton").button("reset");
            }
        });
    });
</script>