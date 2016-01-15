<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WasteLine</title>

    <!-- Material Design fonts -->
    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

    <!-- Bootstrap CSS -->
    <link href="<?=asset_url('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Material Design for Bootstrap -->
    <link href="<?=asset_url('css/roboto.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/material-fullpalette.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/ripples.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset_url('css/nav.css')?>" rel="stylesheet">
<!--    <link href="<?=asset_url('css/simple-sidebar.css')?>" rel="stylesheet">-->

    <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=  asset_url("css/owl.carousel.css")?>">
    <link rel="stylesheet" href="<?=  asset_url("css/owl.theme.css")?>">
    
     <!-- jQuery -->
    <script src="<?=asset_url('js/jquery-2.1.4.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>
    <script src="<?=asset_url("js/owl.carousel.js")?>" ></script>  
    <script src="<?=asset_url("js/jquery.form.min.js");?>"></script>

    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
    .wl-reg-form{
        color: white;
    }



    </style>
</head>

<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid wl-full-height">
                <div class="row wl-full-height">

                    <!-- main content -->
                    <div class="wl-full-height col-sm-12 no-padding">
                        <div class="wl-full-height col-sm-7 no-padding" style="background:#2f323a;color:white;">
                            <div class="col-md-12">
                                <h4 style="padding:20px"><span class="lnr lnr-trash"></span>&nbsp;WasteLine</h4>
                            </div>
                            <div class="col-md-12">
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
                            </div>
                        </div>
                        <div class="col-sm-5 no-padding" style="height:100%;background: url('<?=  asset_url("images/lp-img4.jpg")?>') no-repeat center center;background-size:cover;">
                            <div class="col-md-12" style="height:100%;padding-top:10%; background:rgba(47,50,58,0.9);">
                                <div id="login-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="padding-top:15%; ">
                                    <h1 style="color:white;">Login</h1>
                                    <p style="color:white;font-size:13px;">
                                        Lorem ipsum dolor sit amet, ea eum choro homero forensibus, tantas noster corrumpit sea in.
                                    </p>
                                    <div class="form-group label-floating">
                                      <label class="control-label" for="focusedUsername">Username</label>
                                      <input class="form-control" id="focusedUsername" type="text">
                                      <p class="help-block">You should really write something here</p>
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label" for="focusedPassword">Password</label>
                                      <input class="form-control" id="focusedPassword" type="password">
                                      <p class="help-block">You should really write something here</p>
                                    </div>
                                    <div class="form-group">
                                        <a href="javascript:void(0)" class="btn btn-raised btn-success">
                                            <span>LOGIN</span>
                                        </a>
                                        <label class="wl-c-green-1" style="padding-left:15px"><a href="#signup" class="btn-landingform">SIGN UP</a></label>
                                    </div>
                                </div>
                                <div id="register-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="display:none">
                                    <form id="registrationForm" method="post" action="">
                                        <h1 style="color:white;">Register</h1>
                                        <input name="account_type_ID" type="hidden" value="2">
                                        <input name="status" type="hidden" value="3">
                                        <div class="form-group">
                                            <input name="first_name" type="text" class="form-control" id="inputEmail" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <input name="middle_name" type="text" class="form-control" id="inputEmail" placeholder="Middle Name">
                                        </div>
                                        <div class="form-group">
                                            <input name="last_name" type="text" class="form-control" id="inputEmail" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control" id="inputEmail" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input name="email_address" type="text" class="form-control" id="inputEmail" placeholder="Email Address">
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LehRRUTAAAAAKwiSXnPiK5KPqcVIqn1TWTUQLHb"></div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-raised btn-success">
                                                <span>Submit</span>
                                            </button>
                                            <label class="wl-c-green-1" style="padding-left:15px"><a href="#signin" class="btn-landingform">CANCEL</a></label>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end main content -->

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   


    

    <!-- Dropdown.js
    <script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script> -->


</body>

</html>
