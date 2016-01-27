<script>
    $(document).ready(function(){
        $("#registrationForm").validator();
        $("#registrationForm").attr("action", api_url("c_account/createAccount"));
        $("#registrationForm").ajaxForm({
            beforeSubmit : function(data){
                //password confirmation 7 and 8
                if(!(data[7]["value"] === data[8]["value"])){
                    $("#registrationForm").find(".formMessage").text("* Password mismatch");
                    $("#registrationForm").find("input[name='password']").val("");
                    $("#registrationForm").find("input[name='confirm_password']").val("");
                    $("#registrationForm").find("input[name='password']").trigger("change");
                    $("#registrationForm").find("input[name='confirm_password']").trigger("change");
                    return false;
                }
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#registrationForm"));
                if(!response["error"].length){
                    $("#registrationForm").find(".cancelFormButton").trigger("click");
                    $("#loginForm").find("input[name='username']").val($("#registrationForm").find("input[name='username']").val());
                    $("#loginForm").find("input[name='password']").val("");
                    $("#loginForm").find("input[name='username']").trigger("change");
                    $("#loginForm").find("input[name='password']").trigger("change");
                    $("#registrationForm")[0].reset();
                }else{
                    show_form_error($("#registrationForm"), response["error"]);
                }
            }
        });
    });
</script>