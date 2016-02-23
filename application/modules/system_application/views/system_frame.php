<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>WasteLine</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?=asset_url('images/portal/garbage.png')?>" />


        <!-- Bootstrap CSS -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous"><!--CDN-->
        <link href="<?= asset_url('css/bootstrap.min.css') ?>" rel="stylesheet"><!--->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet"><!--CDN-->
        <link href="<?= asset_url('css/jquery-ui.min.css') ?>" rel="stylesheet"><!---->
        <link href="<?= asset_url('css/jquery-ui.structure.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/jquery-ui.theme.min.css') ?>" rel="stylesheet">

        <link href="<?= asset_url('css/font-awesome.min.css') ?>" rel="stylesheet">

        <!-- Material Design for Bootstrap -->
        <link href="<?= asset_url('css/roboto.min.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('/css/material-fullpalette.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('/css/ripples.min.css') ?>" rel="stylesheet">
        <link href="<?=asset_url('css/bootstrap-material-datetimepicker.css')?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= asset_url('css/nav.css') ?>" rel="stylesheet">
        <link href="<?= asset_url('css/simple-sidebar.css') ?>" rel="stylesheet">
        <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
        <!--<link href="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.min.css" rel="stylesheet"><!--CDN-->
        <link href="<?=asset_url('css/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet">
        <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">

        <style>
            [contenteditable=true]:empty:before{
              content: attr(placeholder);
              display: block;
            }
        </style>

    </head>
    <body>
        <div id="wrapper" class="<?=((user_id())?'':'disabled')?>">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a class="wl-menu-toggle"><span class="lnr lnr-trash"></span></a>
                    </li>
                    <li module_id="1" module_link="portal" module_name="portal" style="display:none">
                        <a data-page-link="home" data-toggle="tooltip" data-placement="right" title="" data-original-title="Home"><span class="lnr lnr-home"></span></a>
                    </li>
                    <li module_id="2" module_link="waste_map" module_name="waste_map" style="display:none">
                        <a data-page-link="waste-map" data-toggle="tooltip" data-placement="right" title="" data-original-title="Waste Map"><span class="lnr lnr-map"></span></a>
                    </li>
                    <li module_id="3" module_link="information_page" module_name="information_page" style="display:none">
                        <a data-page-link="information_page" data-toggle="tooltip" data-placement="right" title="" data-original-title="Information"><span class="lnr lnr-book"></span></a>
                    </li>
                    <li module_id="7" module_link="report_management" module_name="report_management" style="display:none">
                        <a data-page-link="report_management" data-toggle="tooltip" data-placement="right" title="" data-original-title="Report Management"><span class="lnr lnr-flag"></span></a>
                    </li>


                    <li id="tae" module_id="4" module_link="profile_management" module_name="profile_management" style="display:none">
                        <a data-page-link="profile" data-toggle="tooltip" data-placement="right" title="" data-original-title="Profile"><span class="lnr lnr-user"></span></a>
                    </li>
                    <li module_id="5" module_link="lgu_management" module_name="LGU_management">
                        <a data-page-link="manage-LGU" data-toggle="tooltip" data-placement="right" title="" data-original-title="LGU Management"><span class="lnr lnr-users"></span></a>
                    </li>
                    <li class="wl-btn-logout" module_name="home">
                        <a data-page-link="logout" data-toggle="tooltip" data-placement="right" title="" data-original-title="Log Out"><span class="lnr lnr-power-switch"></span></a>
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
                                <span class="input-group-btn wl-header-btn">
                                    <a class="wl-menu-toggle"><span class="lnr lnr-menu"></span></a>
                                </span>
                                <span class="wl-c-green-1">Wasteline</span>
                                <span class="wl-c-gray-1">&nbsp;|&nbsp;</span>
                                <span class="wl-c-black-1 wl-page-title">Home</span>
                                <div id="wl-header-menu" class="col-xs-12 moduleHolder wl-page-content" module_link="information_page" style="display:none">
                                    <ul class="unselectable">
                                        <li>
                                            <a class="wl-active" typeid="1">Articles</a>
                                        </li>
                                        <li>
                                            <a typeid="2">Guidelines</a>
                                        </li>
                                    </ul>
                                </div>
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
                                    <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Post to Waste Map">
                                        <div class="wl-btn-post unselectable">+</div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- end top -->

                        <!-- main content -->
                        <div id="moduleContainer" class="wl-main-content col-xs-12">
                            <!-- Home -->
                            <div id="systemMessageContainer" class="alert-container" >

                            </div>
                            <div id="wl-side-content">
                                <div id="wl-side-header" class="col-xs-12">
                                    <div class="row">
                                    <div class="col-xs-3 no-padding">
                                        <h3 class="wl-c-green-6">Post</h3>
                                    </div>
                                    <div class="col-xs-9 no-margin no-padding">
                                        <div class="form-group col-xs-12 no-margin no-padding">
                                            <a id="wl-btn-side-repost" class="btn btn-warning btn-raised" style="float:right"><span>Repost</span></a>
                                            <a id="wl-btn-side-submit" class="btn btn-success btn-raised" style="float:right;display:none"><span>Submit</span></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div id="wl-side-menu" class="col-xs-12">
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
                                <hr class="col-xs-12 no-padding"></hr>
                                <div id="wl-side-list" class="col-xs-12 no-padding scroll-shadow scroll-on">
                                    <ul id="post-container-list">
                                        <li id="wl-rectangle-dummy" class="wl-rectangle-list col-xs-12">
                                            <div class="col-xs-2">
                                                <div class="circle"><i class="fa fa-check"></i></div>
                                            </div>
                                            <div class="col-xs-10">
                                                <p class="wl-list-desciption wl-c-green-1" contenteditable="true" placeholder="Click to add Description" holder="description"></p>
                                                <p class="wl-list-quantity-price" style="display:inline-block;height:auto">
                                                    <span class="wl-list-quantity" contenteditable="true" onkeypress="return wastePostContainer.isNumberInput(event)" placeholder="Quantity" holder="quantity"></span>
                                                </p>

                                                <div class="form-group form-group-sm wl-list-category-div" style="display:inline-block;height:auto">
                                                    <select class="form-control wl-list-category" id="wastePostQuantityUnitList">
                                                        <option value="0"hidden >Unit</option>
                                                    </select>
                                                </div>

                                                 <p class="wl-list-quantity-price" style="display:inline-block;height:auto">
                                                    <span class="wl-list-price" contenteditable="true" onkeypress="return wastePostContainer.isNumberInput(event)" placeholder="Price" holder="price"></span>
                                                </p>


                                                <div class="form-group form-group-sm wl-list-category-div">
                                                    <select class="form-control wl-list-category" id="wastePostCategoryList">
                                                        <option val="0" hidden >Category</option>
                                                    </select>
                                                </div>
                                                <i class="fa fa-times fa-3 deleteWastePost btn" style="position: absolute; top: 0px; right: 2px; font-size: 1.5em; color: #f55549"></i>
                                            </div>
                                        </li>
                                        <li class="wl-rectangle-add col-xs-12 unselectable">
                                            <div class="col-xs-2">
                                                <div class="circle wl-c-green-1">+</div>
                                            </div>
                                            <div class="col-xs-10">
                                                <span class="wl-c-green-1">Add item to post</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <!-- post form -->
                            <div id="wl-side-content">

                            </div>

                            <span id="wl-return-floating-btn" class="input-group-btn wl-draggable wl-floating-btn button" style="display:none">
                                <button type="button" class="btn btn-fab btn-warning btn-fab-mini">
                                    <span class="lnr lnr-chevron-left"></span>
                                <div class="ripple-container"></div></button>
                            </span>
                            <span id="wl-post-floating-btn" class="input-group-btn wl-draggable wl-floating-btn button">
                                <button type="button" class="btn btn-fab btn-primary btn-fab-mini">
                                    <span>+</span>
                                <div class="ripple-container"></div></button>
                            </span>
                        </div>
                        <!-- end main content -->

                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
           <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>

    </body>
    <footer>
        <!-- jQuery -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script><!--CDN-->
        <script src="<?= asset_url('js/jquery-2.1.4.min.js') ?>"></script><!--->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script><!--CDN-->
        <script src="<?= asset_url('js/jquery-ui.min.js') ?>"></script><!--->

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>


        <!-- Material Design for Bootstrap -->
        <script src="<?= asset_url('js/material.js') ?>"></script>
        <script src="<?= asset_url('js/ripples.min.js') ?>"></script>
        <script src="<?= asset_url('js/moment.min.js')?> "></script>
        <script src="<?= asset_url('js/bootstrap-material-datetimepicker.js') ?>"></script>

        <script src="<?= asset_url("js/jquery.form.min.js"); ?>"></script>
        <script src="<?= asset_url('js/validator.js') ?>"></script>


        <script src="<?=asset_url('js/initial.min.js')?>"></script>
        <!--<script src="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.min.js"></script><!--CDN-->
        <script src="<?=asset_url('js/jquery.mCustomScrollbar.concat.min.js')?>"></script><!--->
        <script src="<?=asset_url('js/wl-global.js')?>"></script>
    </footer>
</html>
