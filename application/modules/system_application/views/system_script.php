<script>
    var system_data = {
        account_information : {
            user_ID : "<?=user_id()?>"*1,
            first_name : "<?=user_first_name()?>",
            middle_name : "<?=user_middle_name()?>",
            last_name : "<?=user_last_name()?>",
            username : "<?=username()?>",
            user_type : "<?=user_type()?>"*1
        },
        url : {
            base_url : "<?=base_url()?>",
            api_url : "<?=api_url()?>",
            asset_url : "<?=asset_url()?>"
        },
        data : {
            default_page : "<?=$defaultPage?>",
            extra_data : ('<?=$extra_data? $extra_data : "false"?>' !== "false") ? JSON.parse('<?=$extra_data?>') : false
        },
        access_control_list :{},
        refresh_call : {

        }
    };
    function user_id(){
        return system_data.account_information.user_ID;
    }
    function user_type(){
        return system_data.account_information.user_type;
    }
    function user_first_name(){
        return system_data.account_information.first_name;
    }
    function user_middle_name(){
        return system_data.account_information.middle_name;
    }
    function user_last_name(){
        return system_data.account_information.last_name;
    }
    function base_url(link){
       return system_data.url.base_url+((typeof link === "undefined") ? "" : link);
    }
    function api_url(link){
       return system_data.url.api_url+link;
    }
    function asset_url(link){
       return system_data.url.asset_url+link;
    }
    function retrieve_access_control(){
        $.post(api_url("C_access_control_list/retrieveAccessControlList"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                if(response["data"]["access_control_list"]){
                    for(var x = 0; x < response["data"]["access_control_list"].length; x++){
                        system_data.access_control_list[response["data"]["access_control_list"][x]["module_ID"]] = (response["data"]["access_control_list"][x]);
                    }
                }
                if(response["data"]["group_access_control_list"]){
                    for(var x = 0; x < response["data"]["group_access_control_list"].length; x++){
                        system_data.access_control_list[response["data"]["group_access_control_list"][x]["module_ID"]] = (response["data"]["group_access_control_list"][x]);
                    }
                }
            }
            formSideBar();
        });
    }
    function refresh_session(){
        $.post(base_url("portal/refreshSession"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                system_data.account_information.user_ID = response["data"]["ID"];
                system_data.account_information.first_name = response["data"]["first_name"];
                system_data.account_information.middle_name = response["data"]["middle_name"];
                system_data.account_information.last_name = response["data"]["last_name"];
                system_data.account_information.username = response["data"]["username"];
                system_data.account_information.user_type = response["data"]["user_type"];
                system_data.account_information.account_type = response["data"]["account_type_ID"];
                
                $("#headerUserFullName").text(user_first_name()+" "+user_last_name());
                $("#headerUserImg").initial({name:((user_first_name()+"").charAt(0)+(user_last_name()+"").charAt(0)).toUpperCase()});
                
                $("#headerUserImg").height("30px");
                $("#headerUserImg").width("30px");
            }else{
                window.location = base_url();
            }
        });
    }
    function formSideBar(){
        $(".sidebar-nav").find("li:not(.sidebar-brand, .wl-btn-logout)").hide();
        $(".sidebar-nav").find("li").each(function(e){
            if(typeof system_data.access_control_list[$(this).attr("module_id")] !== "undefined"){
                $(this).show();
            }
        });
    }
    
</script>
<!--Modularization-->
<script>
    /*Loading Modules*/
    function load_module(moduleLink, moduleName){
        if($("#moduleContainer").find(".moduleHolder[module_link='"+moduleLink+"']").length === 0){
            $.post(base_url(moduleLink), {}, function(data){
                /*CHECK IF JSON OR HTML FOR AUTHORIZATION*/

                var moduleHolder = $("#systemComponent").find(".moduleHolder").clone();

                moduleHolder.attr("module_link", moduleLink);
                moduleHolder.attr("id",moduleName.replace(/_([a-z])/g, function (g) { return g[1].toUpperCase(); }));
                moduleHolder.append(data);
                $("#moduleContainer").append(moduleHolder);
                /*show page*/
                $('.wl-page-content:not(.moduleHolder[module_link="'+moduleLink+'"])').hide();
                if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                    $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                    refresh_call(moduleName);
                }

            });
        }else{
            /*show page*/
            $('.wl-page-content:not(.moduleHolder[module_link="'+moduleLink+'"])').hide();
            if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                refresh_call(moduleName);
            }

        }
    }
    function refresh_call(moduleName){
        if(typeof system_data.refresh_call[moduleName] !== "undefined"){
            for(var x = 0; x < system_data.refresh_call[moduleName].length; x++){
                system_data.refresh_call[moduleName][x]();
            }
        }
    }
    /**
     * Add functions that needs to be called everytime the module is viewed
     * @param {string} moduleName name of the module in underscore format
     * @param {type} refreshFunction function to be called
     * @returns {undefined}
     */
    function add_refresh_call(moduleName, refreshFunction){
        if(typeof system_data.refresh_call[moduleName] === "undefined"){
            system_data.refresh_call[moduleName] = [];
        }
        if($(".wl-active-page").attr("module_name") === moduleName){
            refreshFunction();
        }
        system_data.refresh_call[moduleName].push(refreshFunction);
    }
</script>
<!--Standard Form validation-->
<script>
    /**
     * Shows error in the form submitted
     * @param {DOM} elementSelected the form that has been submitted
     * @param {type} errorList list of error from the api
     * @returns {undefined}
     */
    function show_form_error(elementSelected, errorList){
        elementSelected.find(".formMessage").empty();
        elementSelected.find(".has-error").removeClass(".has-error");
        errorList.forEach(function(errorValue){
            if(errorValue["status"] > 100 && errorValue["status"] < 1000){/*Form Validation Error*/
                for(var index in errorValue["message"]){
                    elementSelected.find(".formMessage").append("* "+errorValue["message"][index]+"<br>");
                    elementSelected.find("input[name='"+index+"']").parent().addClass("has-error");
                }
            }else if(errorValue["status"] > 1000 && errorValue["status"] < 10000){/*System Error*/

            }else{
                elementSelected.find(".formMessage").append("* "+errorValue["message"]+"<br>");
            }
        });
    }
    function clear_form_error(elementSelected){
        elementSelected.find(".formMessage").empty();
        elementSelected.find(".has-error").removeClass(".has-error");
    }
    /**
     * Show a system message at the bottom of the interface
     *
     * @param {int} status status of the message to avoid conflict
     * @param {int} messageType warning|danger|success|info
     * @param {object} messageDetail the message to be displayed
     * @param {object} link object containing the text and href of the link
     * @returns {undefined}
     */
    function show_system_message(status, messageType, messageDetail, link){
        var messagePrototype = $("#systemComponent").find(".systemMessage").clone();
        messagePrototype.find(".alert-message").text(messageDetail);
        messagePrototype.attr("message_status", status);
        if(typeof link !== "undefined"){
            messagePrototype.find(".alert-link").text(link["text"]);
            if(typeof link["href"] !== "undefined"){
                messagePrototype.find(".alert-link").attr("href", link["href"]);
            }else if(typeof link["callback"] !== "undefined"){
                messagePrototype.find(".alert-link").click(link["callback"]);
            }

        }
        switch(messageType){
            case 1: /*warning*/
                messagePrototype.addClass("alert-warning");
                messagePrototype.find(".alert-title").text("Warning!");
                break;
            case 2: /*danger*/
                messagePrototype.addClass("alert-danger");
                messagePrototype.find(".alert-title").text("Alert!");
                break;
            case 3: /*success*/
                messagePrototype.addClass("alert-success");
                messagePrototype.find(".alert-title").text("Success!");
                break;
            case 4: /*info*/
                messagePrototype.addClass("alert-info");
                messagePrototype.find(".alert-title").text("Information!");
                break;
        }

        $("#systemMessageContainer").prepend(messagePrototype);
        messagePrototype.fadeIn();
    }
    function remove_system_message(status){
        $("#systemMessageContainer").find(".systemMessage[message_status='"+status+"']").remove();
    }
</script>
<!--Component-->
<script>
    /**
     * Load a Page Component to the Document.
     * @param {string} component The name of the component to be loaded
     * @param {function} callBack The function called after the component is loaded. This is where the purpose of loading a component being place
     * @returns {none}
     */
    function load_page_component(component, callBack){
        if($("."+component).length === 0 ){
            $.post("<?=base_url()?>system_application/loadPageComponent", {component : component}, function(data){
                $("#pageComponentContainer").append(data);
                callBack();
            });
        }else{
            callBack();
        }

    }
</script>
<!--Other Functions-->
<script>
/*Account Verification*/
var requestVerificationCode = function(){
    $("#systemMessageContainer").find(".systemMessage[message_status='"+51+"']").find(".alert-link").attr("data-loading-text", "Sending Verification Code...");
    $("#systemMessageContainer").find(".systemMessage[message_status='"+51+"']").find(".alert-link").button("loading");
    $.post(base_url("portal/requestVerificationCode"), {}, function(data){
        var response = JSON.parse(data);
        remove_system_message(51);
        if(!response["error"].length){
            show_system_message(52, 4,
                "Your verification link has been sent to your email: "+response["data"]+".",
                {text: "Please refresh this page after you verify your account", callback : function(){
                        location.reload(true);
                }});
        }else{
            if(response["error"][0]["status"]*1 === 1){
                show_system_message(53, 1, "Your account has already been verified.", {text: "Refresh this page", callback : function(){
                        location.reload(true);
                }});
            }
        }
    });
}
</script>
<!--Document Ready-->
<script>
    $(document).ready(function(){
        //redirect www
        if(window.location.href.indexOf("www") === 0){
            window.history.pushState('Object', 'Title', window.location.href.replace("www."));

        }
        
        
        retrieve_access_control();
        if(user_type() === 4){
            setTimeout(function(){
                show_system_message(51, 1, "Please verify your account by clicking the link sent to your account.", {text : "Send Verification Code", callback: requestVerificationCode});
            }, 1300);

        }
        /*show messages*/
        if(typeof( system_data.data.extra_data["message"]) !== "undefined"){
           for(var x= 0; x < system_data.data.extra_data["message"].length; x++){
               show_system_message(system_data.data.extra_data["message"][x]["status"], system_data.data.extra_data["message"][x]["type"], system_data.data.extra_data["message"][x]["message"]);
           }
        }
        $.post(api_url("C_account/retrieveAccount"), {ID:user_id()}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                if(response["data"]["account_address_map_marker_ID"] === null && (response["data"]["account_type_ID"]*1 === 2 || response["data"]["account_type_ID"]*1 === 4)
                        && (response["data"]["account_address_longitude"]*1 === 123.922587 && response["data"]["account_address_latitude"]*1 === 10.339634)
                    ){
                    $("[module_link='profile_management']").trigger("click");
                    show_system_message(121, 4, "Please complete all the information required especially your location and complete address.");
                }
            }
        });

    });
</script>
