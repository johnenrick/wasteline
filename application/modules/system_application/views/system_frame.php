<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>WasteLine</title>

        <!-- Bootstrap CSS -->
        <link href="<?= asset_url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/jquery-ui.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/jquery-ui.structure.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/jquery-ui.theme.min.css') ?>" rel="stylesheet">

        <!-- Material Design for Bootstrap -->
        <link href="<?= asset_url('css/roboto.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('/css/material-fullpalette.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('/css/ripples.min.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= asset_url('css/nav.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/simple-sidebar.css') ?>" rel="stylesheet">
        <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">



    </head>
    <body>
        <div id="wrapper" class="<?=((user_id())?'':'disabled')?>">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a><span class="lnr lnr-trash"></span></a>
                    </li>
                    <li module_id="1" module_link="portal" module_name="home" style="display:none">
                        <a data-page-link="home" ><span class="lnr lnr-home"></span></a>
                    </li>
                    <li module_id="2" module_link="wastemap" module_name="home" style="display:none">
                        <a data-page-link="map"><span class="lnr lnr-map"></span></a>
                    </li>
                    <li module_id="3" module_link="report_management" module_name="home" style="display:none">
                        <a data-page-link="information"><span class="lnr lnr-book"></span></a>
                    </li>
                    

                    <li id="tae" module_id="4" module_link="profile_management" module_name="profile_management" style="display:none">
                        <a data-page-link="profile" ><span class="lnr lnr-user"></span></a>
                    </li>
                    <li module_id="5" module_link="lgu_management" module_name="LGU_management">
                        <a data-page-link="manage-LGU"><span class="lnr lnr-users"></span></a>
                    </li>
                    <li class="wl-btn-logout" module_name="home">
                        <a data-page-link="logout" ><span class="lnr lnr-power-switch"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->



            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid wl-full-height">
                    <div class="row wl-full-height">

                        <!-- top -->
                        <div class="wl-header-content col-xs-12 col-sm-12">

                            <div class="wl-top-grp col-sm-4">
                                <span class="wl-c-green-1">Wasteline</span>
                                <span class="wl-c-gray-1">&nbsp;|&nbsp;</span>
                                <span class="wl-c-black-1 wl-page-title">Home</span>
                            </div>
                            <div class="wl-top-grp col-sm-4 unselectable">
                                <span class="lnr lnr-calendar-full wl-c-green-1"></span>
                                <span class="wl-c-green-2 wl-date">--/--/--</span>
                                <span class="wl-c-green-3">&nbsp;|&nbsp;</span>
                                <span class="wl-c-green-1 wl-time">--:--</span>
                                <div class="col-sm-12" style="padding: 10px 0 0">
                                    <a href="http://google.com" style="color:#413f4c;text-decoration:none"><h4>Brgy. Banilad, Mandaue City</h4></a>
                                </div>
                            </div>
                            <div class="wl-top-grp col-sm-4 no-padding">
                                <div class="col-sm-10 padding-top-15">
                                    <div class="col-sm-12 no-padding">
                                        <img id="headerUserImg" data-char-count="2" class="wl-header-img">
                                        <span id="headerUserFullName" class="wl-c-green-5">John Doe</span>
                                    </div>
<!--
                                    <div class="col-sm-12" style="padding: 5px 0 0">
                                        <div class="form-group">
                                            <div class="btn-group">
                                                <a data-target="#" class="btn btn-default btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <span class="lnr lnr-funnel wl-c-green-1"></span>
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
-->
                                </div>

                                <div class="col-sm-2 no-padding">
                                    <div class="wl-btn-post unselectable">+</div>
                                </div>
                            </div>

                        </div>
                        <!-- end top -->

                        <!-- main content -->
                        <div id="moduleContainer" class="wl-main-content col-sm-12">
                            <!-- Home -->
                            <div id="systemMessageContainer" class="alert-container" >

                            </div>
                            <div id="wl-side-content">
                                <div id="wl-side-header" class="col-sm-12">
                                    <div class="col-sm-3 no-padding">
                                        <h3 class="wl-c-green-6">Post</h3>
                                    </div>
                                    <div class="form-group col-sm-9 no-margin no-padding">
                                        <a id="wl-btn-side-repost" class="btn btn-warning btn-raised" style="float:right"><span>Repost</span></a>
                                        <a id="wl-btn-side-submit" class="btn btn-success btn-raised" style="float:right;display:none"><span>Submit</span></a>
                                    </div>
                                </div>
                                <div id="wl-side-menu" class="col-sm-12">
                                    <ul class="unselectable wastePostTypeList">
                                        <li>
                                            <a class="wl-active" typeID="1">Own Waste</a>
                                        </li>
                                        <li>
                                            <a typeID="2">Waste Accepted</a>
                                        </li>
                                        <li>
                                            <a typeID="3">Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <hr class="col-sm-12 no-padding"></hr>
                                <div id="wl-side-list" class="col-sm-12 no-padding scroll-shadow scroll-on">
                                    <ul id="post-container-list">
                                        <li id="wl-rectangle-dummy" class="wl-rectangle-list col-sm-12">
                                            <div class="col-sm-2">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-desciption wl-c-green-1" contenteditable="true">Click to add Description</p>
                                                <p class="wl-list-quantity-price">
                                                    <span class="wl-list-quantity" contenteditable="true">Quantity</span>
                                                    &nbsp;|&nbsp;Php.
                                                    <span class="wl-list-price" contenteditable="true">Price</span></p>
                                                <div class="form-group form-group-sm wl-list-category-div">
                                                    <select class="form-control wl-list-category" id="wastePostCategoryList">
                                                        <option hidden >Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="wl-rectangle-add col-sm-12 unselectable">
                                            <div class="col-sm-2">
                                                <div class="circle wl-c-green-1">+</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <span class="wl-c-green-1">Add item to post</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <!-- post form -->
                            <div id="wl-side-content">

                            </div>

                        </div>
                        <!-- end main content -->

                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </body>
    <footer>
        <!-- jQuery -->
        <script src="<?= asset_url('js/jquery-2.1.4.min.js') ?>"></script>
        <script src="<?= asset_url('js/jquery-ui.min.js') ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>


        <!-- Material Design for Bootstrap -->
        <script src="<?= asset_url('js/material.js') ?>"></script>
        <script src="<?= asset_url('js/ripples.min.js') ?>"></script>

        <script src="<?= asset_url("js/jquery.form.min.js"); ?>"></script>
        <script src="<?= asset_url('js/validator.js') ?>"></script>


        <script src="<?=asset_url('js/initial.min.js')?>"></script>
        <script src="<?=asset_url('js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
        <script src="<?=asset_url('js/wl-global.js')?>"></script>
    </footer>
</html>
