<script>
    $(document).ready(function(){
        $("#loginForm").attr("action", base_url("portal/login"));
        $("#loginForm").ajaxForm({
            beforeSubmit : function(){
            },
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                if(!response["error"].length){
                    
                }else{
                    show_form_error($("#loginForm"), response["error"]);
                }
            }
        });
    });
</script>