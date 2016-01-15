<script type="text/javascript">
    $(document).ready(function(){
        $.material.init();
        $(".btn-landingform").click(function(){
            $("#login-form").toggle();
            $("#register-form").toggle();
        });
        $("#contentCarousel").owlCarousel({
            singleItem : true,
            stopOnHover : true,
            autoPlay: 3000,
            paginationNumbers : true,
            autoHeight : true
        });
    });
</script>