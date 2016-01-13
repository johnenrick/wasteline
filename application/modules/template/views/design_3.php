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
                        <div class="wl-full-height col-sm-4 no-padding">
                            <div class="col-sm-12 wl-b-green-1" style="height:50%;padding: 14% 12%;color:white">
                                <h3 style="font-weight:bold">Wasteline is here blah blah!</h3>
                                <span>_____________</span>
                                <p>
                                    <h5 style="font-family:Gotham">Hugaw. Waste. Basura. Tae imo nawng.</h5>
                                    <h5 style="font-family:Gotham">blah blah blah.</h5>
                                </p>
                            </div>
                            <div class="col-sm-12 wl-b-white-1 no-padding" style="height:50%">
                                <img src="<?=asset_url('images/objects2.png')?>" style="width:100%;margin-top:-44px;"/>
                            </div>
                        </div>
                        <div class="col-sm-8" style="padding-top:10%; height:100%;">
                            <div class="col-sm-6 col-sm-offset-3" style="height:80%">
                                <div class="form-group label-floating">
                                  <label class="control-label" for="focusedInput2">Username</label>
                                  <input class="form-control" id="focusedInput2" type="text">
                                  <p class="help-block">You should really write something here</p>
                                </div>
                                <div class="form-group label-floating">
                                  <label class="control-label" for="focusedInput2">Password</label>
                                  <input class="form-control" id="focusedInput2" type="password">
                                  <p class="help-block">You should really write something here</p>
                                </div>
                                <div class="form-group">
                                    <label class="wl-c-black-2" style="padding-right:21%">Forgot Password</label>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-success">
                                        <span>Sign in &nbsp;</span>
                                        <span class="lnr lnr-arrow-right"></span>
                                    </a>
                                </div>
                                <hr style="height:3px;background-color:#bbb">
                                <div class="form-group">
                                    <label class="wl-c-black-2" style="padding-right:23%">Need An Account?</label>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-default">
                                        <span>Sign Up</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12" style="text-align:center;vertical-align:bottom;height:20%">
                                <p>Cebuano | English | Chinese | Japanese | Jelly2 Ace</p>
                                <p>WasteLine &copy; 2015 <span>powered by Team Pyangbok</span> | Terms of Use | Help</p>
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

    <!-- jQuery -->
    <script src="<?=asset_url('js/jquery-2.1.4.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>


    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
    <script>
      $.material.init();
    </script>

    <!-- Dropdown.js
    <script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script> -->


</body>

</html>
