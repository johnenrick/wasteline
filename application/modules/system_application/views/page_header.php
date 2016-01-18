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
    <link href="<?=asset_url('css/jquery-ui.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/jquery-ui.structure.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/jquery-ui.theme.min.css')?>" rel="stylesheet">

    <!-- Material Design for Bootstrap -->
    <link href="<?=asset_url('css/roboto.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/material-fullpalette.css')?>" rel="stylesheet">
    <link href="<?=asset_url('/css/ripples.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset_url('css/nav.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/simple-sidebar.css')?>" rel="stylesheet">

    <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">

    
    
    <!-- jQuery -->
    <script src="<?=asset_url('js/jquery-2.1.4.min.js')?>"></script>
    <script src="<?=asset_url('js/jquery-ui.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>


    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
   
</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a><span class="lnr lnr-trash"></span></a>
                </li>
                <li class="wl-active-page">
                    <a data-page-link="home"><span class="lnr lnr-home"></span></a>
                </li>
                <li>
                    <a data-page-link="map"><span class="lnr lnr-map"></span></a>
                </li>
                <li>
                    <a data-page-link="information"><span class="lnr lnr-book"></span></a>
                </li>
                <li>
                    <a data-page-link="profile"><span class="lnr lnr-user"></span></a>
                </li>
                <li>
                    <a data-page-link="manage-users"><span class="lnr lnr-users"></span></a>
                </li>
                <li class="wl-btn-logout">
                    <a data-page-link="logout"><span class="lnr lnr-power-switch"></span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid wl-full-height">
                <div class="row wl-full-height">

                    <!-- top -->
                    <div class="wl-header-content col-xs-12 col-sm-12" style="">

                        <div class="wl-top-grp col-sm-4">
                                <span class="wl-c-green-1">Wasteline</span>
                                <span class="wl-c-gray-1">&nbsp;|&nbsp;</span>
                                <span class="wl-c-black-1">Information</span>
                        </div>
                        <div class="wl-top-grp col-sm-4 unselectable">
                            <span class="lnr lnr-calendar-full wl-c-green-1"></span>
                            <span class="wl-c-green-2 wl-date">--/--/--</span>
                            <span class="wl-c-green-3">&nbsp;|&nbsp;</span>
                            <span class="wl-c-green-1 wl-time">--:--</span>
                        </div>
                        <div class="wl-top-grp col-sm-4 no-padding">
                            <div class="col-sm-10 padding-top-15">
                                <div class="col-sm-12 no-padding">
                                    <span class="wl-c-green-4">Hi, <span class="wl-c-green-5">John Doe</span></span>
                                </div>
                                <div class="col-sm-12" style="padding: 5px 0 0">
                                    <div class="form-group">
                                        <div class="btn-group">
                                          <a data-target="#" class="btn btn-default btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">
                                              <span class="lnr lnr-funnel"></span>
                                              <span>Filter&nbsp;</span>
                                              <span class="caret"></span>
                                          </a>
                                          <ul class="dropdown-menu">
                                            <li><a>filter 1</a></li>
                                            <li><a>filter 2</a></li>
                                            <li><a>filter 3</a></li>
                                          </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 no-padding">
                                <div class="wl-btn-post unselectable">+</div>
                            </div>
                        </div>

                    </div>
                    <!-- end top -->

                    <!-- main content -->
                    <div class="wl-main-content col-sm-12">
                        <!-- Home -->
                        <div class="wl-home-content wl-page-content col-sm-12" style="background-color:gray;">
                        