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
                        <div class="wl-home-content wl-page-content col-sm-12" style="background-color:gray;">

                        </div>

                        <!-- Map -->
                        <div id="map" data-mode="" style="Height:">
                            <input type="hidden" data-map-markers="" value="" name="map-geojson-data"/>
                            <!-- footer container-->
                            <div id="wl-footer-content">
                            </div>
                        </div>

                        <!-- Information -->
                        <div class="wl-information-content wl-page-content col-sm-12 wl-hide">
                            <div class="col-sm-4 wl-info-list no-padding">
                                <div class="col-sm-12 wl-info-header">
                                    <span>Information Thread</span> <span class="badge">5k</span>
                                </div>
                                <div class="col-sm-12 wl-info-mainlist">
                                    <ul>
                                        <li>
                                            <p>Proper Garbage Disposal</p>
                                            <p>just now</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 wl-info-display">

                            </div>
                        </div>

                        <!-- Profile -->
                        <div class="wl-profile-content wl-page-content col-sm-12 wl-hide no-padding">
                            <div class="col-sm-3 no-padding wl-pro-full-info">
                                <a height="32" width="32" class="circle">
                                    <img src="http://data.freelancer.com/logo/2752925/negris_avatar.jpg" alt="Oh! It's you.">
                                </a>
                                <p class="wl-full-name">
                                    John Michael Doe
                                </p>
                                <p class="wl-username">
                                    john.doe
                                </p>
                                <p class="wl-complete-address">
                                    A. S. Fortuna St, Banilad, Mandaue City, Cebu
                                </p>
                                <hr>
                                <p class="wl-slogan">Your Slogan</p>
                                <p class="wl-slogan-edit">( Just start typing to edit )</p>
                                <p class="wl-slogan-text" contenteditable="true">
                                    You can’t change the past but you can change the future, always remember to recycle
                                </p>
                            </div>

                            <div class="col-sm-4 wl-pro-edit scroll-on" style="height:100%;">
                                <h5>Edit Your Personal Settings</h5>
                                <hr>
                                <div class="form-group">
                                    <label for="inputFirstName" class="col-md-12 control-label">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="inputFirstName" placeholder="first name" value="John">
                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMiddleName" class="col-md-12 control-label">Middle Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="inputMiddleName" placeholder="middle name" value="Michael">
                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName" class="col-md-12 control-label">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="inputLastName" placeholder="last name" value="Doe">
                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-12 control-label">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="inputUsername" placeholder="username" value="john.doe">
                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-12 control-label">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="johndoe">
                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-md-12 control-label">Complete Address</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="2" id="textArea">A. S. Fortuna St, Banilad, Mandaue City, Cebu</textarea>
                                        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                    </div>
                                </div>

                                <div class="form-group wl-update-info">
                                    <a class="btn btn-success btn-raised" style="float:right;"><span>Update Information</span></a>
                                </div>
                            </div>

                            <div class="col-sm-5 wl-pro-map" style="height:100%;">

                            </div>
                        </div>

                        <!-- Manage Users -->
                        <div class="wl-manage-users-content wl-page-content col-sm-12 wl-hide" style="background-color:green;">

                        </div>


                        <!-- post form -->
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
                                <ul class="unselectable">
                                    <li>
                                        <a class="wl-active">Own Waste</a>
                                    </li>
                                    <li>
                                        <a>Waste Accepted</a>
                                    </li>
                                    <li>
                                        <a>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="col-sm-12 no-padding"></hr>
                            <div id="wl-side-list" class="col-sm-12 no-padding scroll-shadow scroll-on">
                                <ul>
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
                                            <p class="wl-list-category" contenteditable="true">Category</p>
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
    <script src="<?=asset_url('js/jquery-ui.min.js')?>"></script>
    <script src="<?=asset_url('js/jQuery.scrollSpeed.js')?>"></script>
    <script>
        //$.scrollSpeed(100, 800);
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>


    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
    <script>
        $.material.init();
        $.material.ripples(".sidebar-nav li:not(.sidebar-brand), .wl-btn-post");
    </script>

    <!-- Dropdown.js
    <script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script> -->

    <!-- Menu Toggle Script -->
    <script>
    $(document).ready(function(){
        $("#menu-toggle").change(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function run_date_time(){
            var d = new Date();
            $('.wl-date').text(("0"+(d.getMonth()+1)).slice(-2)+'/'+("0"+d.getDate()).slice(-2)+'/'+d.getFullYear().toString().substr(2,2));
            $('.wl-time').text(("0"+d.getHours()).slice(-2)+':'+("0"+d.getMinutes()).slice(-2));
            setTimeout(function(){run_date_time()}, 1000);
        }
        run_date_time();

        $(".wl-btn-post").click(function(){
            if($("#wl-side-content").is(":visible"))
                $("#wl-side-content").hide("slide", { direction: "right" }, 100);
            else
                $("#wl-side-content").show("slide", { direction: "right" }, 300);
        });

        $(document).mouseup(function (e)
        {
            var container = $("#wl-side-content");
            if (container.is(":visible") && !container.is(e.target) && container.has(e.target).length === 0)
                $("#wl-side-content").hide("slide", { direction: "right" }, 100);
        });

        $(".sidebar-nav li:not(.sidebar-brand)").click(function(){
            var ths = $(this);
            var page = ths.children('a').data('pageLink');
            $.when( $('.wl-page-content:not(.wl-'+page+'-content)').hide())
                .done(function(){
                    if($('.wl-page-content:not(.wl-'+page+'-content)').is(":visible"))
                        $('.wl-page-content:not(.wl-'+page+'-content)').hide();
                    $('.wl-'+page+'-content').fadeIn(500);
                    $('.sidebar-nav li.wl-active-page').toggleClass('wl-active-page');
                    ths.toggleClass('wl-active-page');
                    $(".wl-page-title").text(page.replace('-', ' '));
                });
        });
        $(".wl-rectangle-add").click(function(){
            if(!$("#wl-btn-side-submit").is('visible')) {
                $("#wl-btn-side-submit").show('fade',400);
                $("#wl-btn-side-repost").hide();
            }

            var dummy = $("#wl-rectangle-dummy").clone().removeAttr('id').show();
            $(dummy).insertBefore(this);
            setTimeout(function() {
               dummy.addClass('wl-show')
            }, 10);
        });

        $("#wl-side-menu a").click(function(){
            var ths = $(this);
            $('#wl-side-menu a').removeClass('wl-active');
            $.when( $('.wl-rectangle-list:not(#wl-rectangle-dummy)').remove())
                .done(function(){
                    if(!$("#wl-btn-side-submit").is('visible')) {
                        $("#wl-btn-side-repost").show('fade',400);
                        $("#wl-btn-side-submit").hide();
                    }
                    $(ths).addClass('wl-active');
                });
        });
    });
    </script>

</body>

</html>
