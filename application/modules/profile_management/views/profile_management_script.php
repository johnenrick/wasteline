<script>
    var profileManagement = {};
    profileManagement.viewProfile = function(){
        $.post(api_url("c_account/retrieveAccount"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                $("#profileManagementForm").find("[name='updated_data[first_name]']").val(response["data"]["first_name"]).attr("initial_value", response["data"]["first_name"]);
                $("#profileManagementForm").find("[name='updated_data[middle_name]']").val(response["data"]["middle_name"]).attr("initial_value", response["data"]["middle_name"]);
                $("#profileManagementForm").find("[name='updated_data[last_name]']").val(response["data"]["last_name"]).attr("initial_value", response["data"]["last_name"]);
                $("#profileManagementForm").find("[name='updated_data[email]']").val(response["data"]["email_detail"]).attr("initial_value", response["data"]["email_detail"]).attr("email_ID", response["data"]["email_ID"]);
                $("#profileManagementForm").find("[name='updated_data[username]']").val(response["data"]["username"]).attr("initial_value", response["data"]["username"]);
            }else{
                
            }
        });
    };
    $(document).ready(function(){
        $("#profileManagementForm").validator();
        $("#profileManagementForm").attr("action", api_url("c_account/updateAccount"));
        $("#profileManagementForm").ajaxForm({
            beforeSubmit : function(data){
                //password confirmation 5 and 6
                console.log(data[4]);
                if(!(data[5]["value"] === data[6]["value"])){
                    $("#profileManagementForm").find(".formMessage").text("* Password mismatch");
                    $("#profileManagementForm").find("input[name='password']").val("");
                    $("#profileManagementForm").find("input[name='confirm_password']").val("");
                    $("#profileManagementForm").find("input[name='password']").trigger("change");
                    $("#profileManagementForm").find("input[name='confirm_password']").trigger("change");
                    return false;
                }
                data.splice(2);
            },
            success : function(data){
                //console.log(data);
                var response = JSON.parse(data);
                clear_form_error($("#profileManagementForm"));
                if(!response["error"].length){
                }else{
                    show_form_error($("#profileManagementForm"), response["error"]);
                }
            }
        });
        profileManagement.viewProfile();
        add_refresh_call("profile_management", profileManagement.viewProfile);
    });
    
</script>
