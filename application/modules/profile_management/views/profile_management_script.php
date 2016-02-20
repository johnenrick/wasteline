<script>
    var profileManagement = {};
    profileManagement.viewProfile = function(){
        $.post(api_url("c_account/retrieveAccount"), {ID : user_id()}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                $("#profileManagementForm").find("[name='updated_data[first_name]']").val(response["data"]["first_name"]).attr("initial_value", response["data"]["first_name"]);
                $("#profileManagementForm").find("[name='updated_data[middle_name]']").val(response["data"]["middle_name"]).attr("initial_value", response["data"]["middle_name"]);
                $("#profileManagementForm").find("[name='updated_data[last_name]']").val(response["data"]["last_name"]).attr("initial_value", response["data"]["last_name"]);
                $("#profileManagementForm").find("[name='updated_data[email_ID]']").val(response["data"]["email_ID"]).attr("initial_value", response["data"]["email_ID"]);
                $("#profileManagementForm").find("[name='updated_data[email_detail]']").val(response["data"]["email_detail"]).attr("initial_value", response["data"]["email_detail"]);
                $("#profileManagementForm").find("[name='updated_data[contact_number_ID]']").val(response["data"]["contact_number_ID"]).attr("initial_value", response["data"]["contact_number_ID"]);
                $("#profileManagementForm").find("[name='updated_data[contact_number_detail]']").val(response["data"]["contact_number_detail"]).attr("initial_value", response["data"]["contact_number_detail"]);
                $("#profileManagementForm").find("[name='updated_data[username]']").val(response["data"]["username"]).attr("initial_value", response["data"]["username"]);
                //address
                $("#profileManagementForm").find("[name='updated_data[account_address_ID]']").val(response["data"]["acount_address_ID"]*1);
                $("#profileManagementForm").find("[name='updated_data[account_address_description]']").text(response["data"]["account_address_description"]);
                $("#profileManagementForm").find("[name='updated_data[account_address_map_marker_ID]']").val(response["data"]["account_address_map_marker_ID"]*1);
                $("#profileManagementForm").find("[name='updated_data[account_address_longitude]']").val(response["data"]["account_address_longitude"]);
                $("#profileManagementForm").find("[name='updated_data[account_address_latitude]']").val(response["data"]["account_address_latitude"]);
                profileManagement.webMap.removeMarkerList(response["data"]["account_address_map_marker_ID"]);
                if(response["data"]["account_address_longitude"]*1 &&  response["data"]["account_address_latitude"]*1){
                    profileManagement.webMap.addMarker(response["data"]["account_address_map_marker_ID"], 5, response["data"]["account_ID"], "Your saved current location", response["data"]["account_address_longitude"]*1, response["data"]["account_address_latitude"]*1);
                        profileManagement.webMap.setView(response["data"]["account_address_latitude"], response["data"]["account_address_longitude"]);
                }
                
                /*profile summary*/
                $("#profileManagementFullName").text(response["data"]["first_name"]+" "+response["data"]["middle_name"]+" "+response["data"]["last_name"]);
                $("#profileManagementUsername").text(response["data"]["username"]);
                $("#profileManagementEmailAddress").text(response["data"]["email_detail"]);
                $("#profileManagementContactNumber").text(response["data"]["contact_number_detail"]);
                $("#profileManagementCompleteAddress").text(response["data"]["account_address_description"]);
                $('#profileManagementProfilePicture').attr("src","");
                $('#profileManagementProfilePicture').initial({name:(response["data"]["first_name"]+"").charAt(0)+(response["data"]["last_name"]+"").charAt(0)});
            }
        });
    };
    profileManagement.changeAddress = function(latlng){
        $("#profileManagementForm").find("[name='updated_data[account_address_longitude]']").val(latlng.lng);
        $("#profileManagementForm").find("[name='updated_data[account_address_latitude]']").val(latlng.lat);
        $("#profileManagementForm").find("[name='updated_data[account_address_description]']").trigger("focus");
    };
    profileManagement.initializeWebMap = function(){
        if(typeof profileManagement.webMap === "undefined"){
            profileManagement.webMap = new WebMapComponent("#profileManagementWebMap");
            profileManagement.webMap.selectLocation(profileManagement.changeAddress);
            profileManagement.webMap.getCurrentLocationCallBack = profileManagement.changeAddress;
            profileManagement.viewProfile();
        }
    };
    $(document).ready(function(){
        load_page_component("web_map_component", profileManagement.initializeWebMap);
        $("#profileManagementForm").validator();
        $("#profileManagementForm").attr("action", api_url("c_account/updateAccount"));
        $("#profileManagementForm").ajaxForm({
            beforeSubmit : function(data, $form, options){
                //password confirmation 8 and 9
                if(data[8]["value"] === ""){
                    data.splice(9,1);
                    data.splice(8,1);
                    
                }else if(!(data[8]["value"] === data[9]["value"]) && data[8]["value"] !== ""){
                    $("#profileManagementForm").find(".formMessage").text("* Password mismatch");
                    $("#profileManagementForm").find("input[name='password']").val("");
                    $("#profileManagementForm").find("input[name='confirm_password']").val("");
                    $("#profileManagementForm").find("input[name='password']").trigger("change");
                    $("#profileManagementForm").find("input[name='confirm_password']").trigger("change");
                    return false;
                }
                
                //email is 4
                if($("#profileManagementForm").find("[name='updated_data[email_detail]']").attr("initial_value") === $("#profileManagementForm").find("[name='updated_data[email_detail]']").val()){
                    data.splice(4,1);
                    data.splice(3,1);
                }
                data.push({
                   name : "ID",
                   value : user_id(),
                   required : true,
                   type : "hidden"
                });
                data.push({
                   name : "condition[account_ID]",
                   value : user_id(),
                   required : true,
                   type : "hidden"
                });
                $("#profileManagementForm").find(".submitButton").button("loading");
            },
            success : function(data){
                var response = JSON.parse(data);
                clear_form_error($("#profileManagementForm"));
                if(!response["error"].length){
                    $("#profileManagementForm").find("input[name='password']").val("");
                    $("#profileManagementForm").find("input[name='confirm_password']").val("");
                    profileManagement.viewProfile();
                }else{
                    show_form_error($("#profileManagementForm"), response["error"]);
                }
                $("#profileManagementForm").find(".submitButton").button("reset");
            }
        });
        
        add_refresh_call("profile_management", profileManagement.viewProfile);
    });
    
</script>
