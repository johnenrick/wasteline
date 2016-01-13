<html>
    <head>
        <link href="<?=asset_url('css/bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/roboto.min.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/material-fullpalette.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/ripples.min.css')?>" rel="stylesheet">
        <link rel="stylesheet" href="<?=  asset_url("css/owl.carousel.css")?>">
        <link rel="stylesheet" href="<?=  asset_url("css/owl.theme.css")?>">
        <script src="<?=asset_url("js/jquery-2.1.4.min.js")?>" ></script>
        <script src="<?=asset_url("js/owl.carousel.js")?>" ></script>   
        <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>
        <script src="<?=asset_url('js/material.js')?>"></script>
        <script src="<?=asset_url('js/ripples.min.js')?>"></script>
        <script src="<?=asset_url("js/jquery.form.min.js");?>"></script>
    </head>
    <body>
        <div class="container">
            <div id="contentCarousel" class="owl-carousel">
                <div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="thumbnail">
                                <img src="<?=  asset_url("images/portal/trashbin1.png")?>" alt="...">
                            </a>

                        </div>
                        <div class="col-xs-6">
                            <h1>WasteLine</h1>
                            <p>Lots of waste are being disposed every day. In order to minimize this dilemma, the sources of waste such as households and Micro, Small, Medium Enterprises (SMEs) should practice proper waste management. Developing a web portal could help the households and SMEs in locating people who can make use of their recyclable waste. The Local Government Unit (LGU) could also easily disseminate information regarding proper waste management and waste management guidelines to their respective community. Thus, preventing recyclable waste being disposed, save resources and promote a greener environment</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="thumbnail">
                                <img src="<?=  asset_url("images/portal/garbage.png")?>" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <h1>Give your Garbage!</h1>
                            <p>
                                Help mother nature by giving you garbage to the people who can make use of it.
                            </p>
                            <h1>Collect their Garbage!</h1>
                            <p>
                                Wasteline helps people find a particular waste or junks near their place.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="registration">
                <form id="registrationForm" method="post" action="">
                    <button type="submit" value="register">
                        Register!
                    </button>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $("#contentCarousel").owlCarousel({
                singleItem : true,
                stopOnHover : true,
                autoPlay: 3000,
                paginationNumbers : true,
                autoHeight : true
            });
        });
    </script>
</html>