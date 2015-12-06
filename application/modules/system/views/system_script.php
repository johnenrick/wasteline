<script>
    var systemData = {
        account_information : {
            user_ID : "<?=user_id()?>",
            first_name : "<?=user_first_name()?>",
            middle_name : "<?=user_middle_name()?>",
            last_name : "<?=user_last_name()?>"
        },
        url : {
            base_url : "<?=base_url()?>",
            api_url : "<?=api_url()?>",
            asset_url : "<?=asset_url()?>"
        }
    }
    function user_id(){
        return systemData.account_information.user_ID;
    }
    function user_first_name(){
        return systemData.account_information.first_name;
    }
    function user_middle_name(){
        return systemData.account_information.middle_name;
    }
    function user_last_name(){
        return systemData.account_information.last_name;
    }
    function base_url(link){
       return systemData.url.base_url+link;
    }
    function api_url(link){
       return systemData.url.api_url+link;
    }
    function asset_url(link){
       return systemData.url.asset_url+link; 
    }
</script>