<script>
    var system_data = {
        account_information : {
            user_ID : "<?=user_id()?>"*1,
            first_name : "<?=user_first_name()?>",
            middle_name : "<?=user_middle_name()?>",
            last_name : "<?=user_last_name()?>",
            username : "<?=username()?>"
        },
        url : {
            base_url : "<?=base_url()?>",
            api_url : "<?=api_url()?>",
            asset_url : "<?=asset_url()?>"
        },
        data : {
            default_page : "<?=$defaultPage?>"
        },
        access_control_list :{},
        refresh_call : {
            
        }
    }
    function user_id(){
        return system_data.account_information.user_ID;
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
    //Loading Modules
    function load_module(moduleLink, moduleName){
        if($("#moduleContainer").find(".moduleHolder[module_link='"+moduleLink+"']").length === 0){
            $.post(base_url(moduleLink), {}, function(data){
                //CHECK IF JSON OR HTML FOR AUTHORIZATION
                
                var moduleHolder = $("#systemComponent").find(".moduleHolder").clone();
                
                moduleHolder.attr("module_link", moduleLink);
                moduleHolder.attr("id",moduleName);
                moduleHolder.append(data);
                $("#moduleContainer").append(moduleHolder);
                //show page
                $('.wl-page-content:not(.moduleHolder[module_link="'+moduleLink+'"])').hide();
                if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                    $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);

                    $(".wl-page-title").text(moduleLink.replace('-', ' '));
                    refresh_call(moduleName);
                }
                
            });
        }else{
            //show page
            $('.wl-page-content:not(.moduleHolder[module_link="'+moduleLink+'"])').hide();
            if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                
                $(".wl-page-title").text(moduleLink.replace('-', ' '));
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
            if(errorValue["status"] > 100){
                for(var index in errorValue["message"]){
                    elementSelected.find(".formMessage").append("* "+errorValue["message"][index]+"<br>");
                    elementSelected.find("input[name='"+index+"']").parent().addClass("has-error");
                }
            }else{
                elementSelected.find(".formMessage").append("* "+errorValue["message"]+"<br>");
            }
        });
    }
    function clear_form_error(elementSelected){
        elementSelected.find(".formMessage").empty();
        elementSelected.find(".has-error").removeClass(".has-error");
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
<!--Document Ready-->
<script>
    $(document).ready(function(){
        //load_module(system_data.data.default_page);
        retrieve_access_control();
        if(user_id()){
            $("#headerUserFullName").text(user_first_name()+" "+user_last_name());
        }else{
            $("#headerUserFullName").text("Sign Up");
        }
    });
</script>