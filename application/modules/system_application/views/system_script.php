<script>
    var system_data = {
        account_information : {
            user_ID : "<?=user_id()?>"*1,
            first_name : "<?=user_first_name()?>",
            middle_name : "<?=user_middle_name()?>",
            last_name : "<?=user_last_name()?>"
        },
        url : {
            base_url : "<?=base_url()?>",
            api_url : "<?=api_url()?>",
            asset_url : "<?=asset_url()?>"
        },
        data : {
            
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
       return system_data.url.base_url+link;
    }
    function api_url(link){
       return system_data.url.api_url+link;
    }
    function asset_url(link){
       return system_data.url.asset_url+link; 
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
                    elementSelected.find(".formMessage").append(errorValue["message"][index]+"<br>");
                    elementSelected.find("input[name='"+index+"']").parent().addClass("has-error");
                }
            }else{
                elementSelected.find(".formMessage").append(errorValue["message"]+"<br>");
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
            console.log($("."+component));
            callBack();
        }
        
    }
</script>