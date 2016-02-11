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
<!--info-->
    <link href="<?=asset_url('css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/wysiwyg-editor.min.css')?>" rel="stylesheet">

    <link href="<?=asset_url('css/linearicons.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet">
    <link href="<?=asset_url('css/wl-custom.css')?>" rel="stylesheet">



</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a><span class="lnr lnr-trash"></span></a>
                </li>
                <li>
                    <a data-page-link="home" class="wl-active-page" data-toggle="tooltip" data-placement="right" title="" data-original-title="Home"><span class="lnr lnr-home"></span></a>
                </li>
                <li>
                    <a data-page-link="map" data-toggle="tooltip" data-placement="right" title="" data-original-title="Map"><span class="lnr lnr-map"></span></a>
                </li>
                <li>
                    <a data-page-link="information" data-toggle="tooltip" data-placement="right" title="" data-original-title="Information"><span class="lnr lnr-book"></span></a>
                </li>
                <li>
                    <a data-page-link="profile" data-toggle="tooltip" data-placement="right" title="" data-original-title="Profile"><span class="lnr lnr-user"></span></a>
                </li>
                <li>
                    <a data-page-link="manage-users" data-toggle="tooltip" data-placement="right" title="" data-original-title="Manage Users"><span class="lnr lnr-users"></span></a>
                </li>
                <li class="wl-btn-logout">
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
                            <span class="wl-c-green-1">Wasteline</span>
                            <span class="wl-c-gray-1">&nbsp;|&nbsp;</span>
                            <span class="wl-c-black-1 wl-page-title">Home</span>
                            <div id="wl-header-menu" class="col-sm-12 wl-information-content wl-page-content wl-hide">
                                <ul class="unselectable">
                                    <li>
                                        <a class="wl-active">Articles</a>
                                    </li>
                                    <li>
                                        <a>Guidelines</a>
                                    </li>
                                </ul>
                            </div>
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
                                    <img data-name="John" class="wl-header-img">
                                    <span class="wl-c-green-5">John Doe</span>
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
                                <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Post to Waste Map">
                                    <div class="wl-btn-post unselectable">+</div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- end top -->

                    <!-- main content -->
                    <div class="wl-main-content col-sm-12">
                        <div class="alert-container">
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Oh snap!</strong>
                                <a href="javascript:void(0)" class="alert-link">Change a few things up</a> and try submitting again.
                            </div>
                            <div class="alert alert-dismissible alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Well done!</strong> You successfully read
                                <a href="javascript:void(0)" class="alert-link">this important alert message</a>.
                            </div>
                            <div class="alert alert-dismissible alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Heads up!</strong> This
                                <a href="javascript:void(0)" class="alert-link">alert needs your attention</a>, but it's not super important.
                            </div>
                            <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h4>Warning!</h4>

                                <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna,
                                    <a href="javascript:void(0)" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                            </div>
                        </div>

                        <!-- Home -->
                        <div class="wl-home-content wl-page-content col-sm-12" style="background-color:gray;">

                        </div>

                        <!-- Map -->
                        <div class="wl-map-content wl-page-content col-sm-12 wl-hide">
                            <!-- footer container-->
                            <div id="wl-footer-content">
                            </div>
                        </div>

                        <!-- Information -->
                        <div class="wl-information-content wl-page-content col-sm-12 wl-hide">
                            <div class="col-sm-4 col-md-3 wl-info-list no-padding">
                                <div class="col-sm-12 wl-info-header">
                                    <span>Shared Information</span> <span class="badge">105</span>
                                    <span data-toggle="modal" data-target="#wl-info-modal">
                                        <a id="wl-info-addbtn" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="Create new information">+</a>
                                    </span>
                                </div>
                                <div class="col-sm-12 wl-info-mainlist scroll-on no-padding">
                                    <ul>
                                        <li class="wl-info-li wl-list-dummy">
                                            <div class="col-sm-2">
                                                <img class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title"></p>
                                                <p class="wl-list-sub"><span></span></p>
                                            </div>
                                        </li>
                                        <li class="wl-info-li active">
                                            <div class="col-sm-2">
                                                <img data-name="Proper Garbage Disposal" class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title">Proper Garbage Disposal</p>
                                                <p class="wl-list-sub"><span data-livestamp="1454512170"></span></p>
                                            </div>
                                        </li>
                                        <li class="wl-info-li">
                                            <div class="col-sm-2">
                                                <img data-name="Reduce, Reuse and Recycle (3Rs)" class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title">Reduce, Reuse and Recycle (3Rs)</p>
                                                <p class="wl-list-sub"><span data-livestamp="1454502170"></span></p>
                                            </div>
                                        </li>
                                        <li class="wl-info-li">
                                            <div class="col-sm-2">
                                                <img data-name="No Segregation - No Collection" class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title">No Segregation - No Collection</p>
                                                <p class="wl-list-sub"><span data-livestamp="1454415170"></span></p>
                                            </div>
                                        </li>
                                        <li class="wl-info-li">
                                            <div class="col-sm-2">
                                                <img data-name="10 things to do with Softdrink Bottles" class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title">10 things to do with Softdrink Bottles</p>
                                                <p class="wl-list-sub"><span data-livestamp="1454315170"></span></p>
                                            </div>
                                        </li>
                                        <li class="wl-info-li">
                                            <div class="col-sm-2">
                                                <img data-name="Garbage Day is... Payday? Why Your Trash is Worth More Than You Think" class="wl-info-box">
                                            </div>
                                            <div class="col-sm-10">
                                                <p class="wl-list-title">Garbage Day is... Payday? Why Your Trash is Worth More Than You Think</p>
                                                <p class="wl-list-sub"><span data-livestamp="1453315170"></span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9 wl-info-display no-padding">
                                <div class="col-sm-12 wl-info-full scroll-on no-padding">
                                    <div class="col-sm-12 wl-info-description">
                                        <div class="col-sm-12 wl-info-fixed">
                                            <div class="wl-info-box">
                                                <img data-name="Garbage Day is... Payday? Why Your Trash is Worth More Than You Think" class="wl-box">
                                            </div>
                                            <div class="wl-info-title">
                                                <h2>Garbage Day is... Payday? Why Your Trash is Worth More Than You Think</h2>
                                                <h4>
                                                    <span class="wl-info-author">by Kelly Gurnett</span>
                                                    &nbsp;|&nbsp;
                                                    <span class="wl-info-stamp" data-livestamp="1453315170"></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 wl-info-content">
                                        <textarea id="wl-info-editor" name="editor" placeholder="Type your text here...">

                                            <img src="" alt="" style="max-width: 600px; max-height: 200px;">
                                            <img src="http://cdn7.thepennyhoarder.com/wp-content/uploads/2014/08/5575089139_ffec7b5846_z.jpg" alt="" width="100%" height="auto">
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">
                                                <br>
                                            </p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">Do you know how much garbage you produce each week?</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">Better question: Are you prepared to see it firsthand, getting up close and personal by lying amid a week’s worth of your trash?</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">Amazingly, some people were, and photographer Gregg Segal captured the results in his startling series&nbsp;<a title="7 Days of Garbage" href="http://fence.photovillenyc.org/f-2014/atlanta/home/gregg-segal/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">“7 Days of Garbage.”</a>&nbsp;You can take a look at what a typical week of trash looks like for different households in&nbsp;<a title="Mesmerizing Photos of People Lying in a Week’s Worth of Their Trash " href="http://www.slate.com/blogs/behold/2014/07/08/gregg_segal_photographs_people_with_a_week_s_worth_of_their_trash_in_his.html" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">this recent article on Slate</a>.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">We see two morals in this pungent story:</p>
                                            <div style="margin: 10px 0px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; float: none; text-align: center; background-color: rgb(255, 255, 255);">
                                                <center style="margin: 0px; padding: 0px; max-height: 1e+06px;">
                                                    <div id="googmob" style="margin: 0px; padding: 0px; max-height: 1e+06px;"></div>
                                                </center>
                                            </div>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">1. Americans produce a scary amount of trash.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">2. Some of that trash could be put to better use making them cold, hard cash.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">We took a closer look at these unpleasant but powerful photos to identify some ways these people could be turning their trash into cash — and you could be, too.</p>
                                            <h3 style="margin: 28px 0px 14px; max-height: 1e+06px; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; color: rgb(70, 70, 70); font-size: 1.15em; padding: 0px !important; background-color: rgb(255, 255, 255) !important;">Recycling</h3>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Bottles and cans</b></p>
                                            <div style="margin: 10px 0px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; float: none; text-align: center; background-color: rgb(255, 255, 255);">
                                                <center style="margin: 0px; padding: 0px; max-height: 1e+06px;">
                                                    <div id="placement_197470_0" style="margin: 0px; padding: 0px; max-height: 1e+06px;"></div>
                                                </center>
                                            </div>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Depending on your state’s return laws, you can save them up and<a title="How I Made $1,500 Collecting Soda Cans at Work" href="http://www.thepennyhoarder.com/collecting-cans/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">return them</a>&nbsp;to your local grocery store or recycling center for profit.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Wine bottles and corks</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>They’re actually hot material for DIY projects, and arts and crafters will pay for them on eBay. Just wash them off,&nbsp;<a title="Make Money Recycling Wine Corks" href="http://www.thepennyhoarder.com/make-money-recycling-wine-corks/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">list them</a>&nbsp;and profit!</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Metal bits and pieces</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>You don’t have to have a big item like a beat-up car to cash in on<a title="Scrap Your Way to Hundreds" href="http://www.thepennyhoarder.com/scrap-your-way-to-hundreds/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">selling scrap metal</a>. Everything from old door locks to copper wiring can fetch a decent price if you collect enough of it.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: All other miscellaneous recyclable material</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use #1:&nbsp;</b>Get paid for having your city haul it away!&nbsp;<a title="Recyclebank" href="https://www.recyclebank.com/curbside/details" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">Recyclebank</a>works with waste haulers in many communities to track how much recycling they collect from your curb. You earn points for each haul, which can be converted into rewards like magazine subscriptions and shopping discounts. (<a href="http://ctt.ec/9ho1z" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">Like this idea? Click to tweet it</a>!)</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use #2:</b>&nbsp;If you prefer to give back,&nbsp;<a title="Terracycle" href="http://www.terracycle.com/en-US/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">Terracycle</a>&nbsp;will send you a prepaid box to mail your trash in to them. Every box you send in earns you points that can be redeemed for charitable gifts or donations to the nonprofit or school of your choice.</p>
                                            <h3 style="margin: 28px 0px 14px; max-height: 1e+06px; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; color: rgb(70, 70, 70); font-size: 1.15em; padding: 0px !important; background-color: rgb(255, 255, 255) !important;">Reusing</h3>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Unused fruit</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use&nbsp;</b>Not sure you’ll be able to eat all that fruit before it goes bad? Make it into jam or preserves and sell them at your local&nbsp;<a title="Dream of Selling Jam or Produce at a Farmers Market? Here’s Your Guide" href="http://www.thepennyhoarder.com/dream-selling-jam-produce-farmers-market-heres-guide/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">farmers market</a>.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Soggy coffee grounds</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Used coffee grounds actually make great compost, as two business students found out and leveraged into their&nbsp;<a title="Back to the Roots" href="https://www.backtotheroots.com/about-us" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">Back to the Roots</a>urban mushroom growing kits.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Food scraps</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Create a compost heap in your yard and use it to fertilize a kitchen garden to&nbsp;<a title="Choose the Best, Money-Saving Plants for Your Vegetable Garden" href="http://lifehacker.com/choose-the-best-money-saving-plants-for-your-vegetable-510676441" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">reduce your grocery bills</a>.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Random fabric scraps and other odds and ends that can’t be recycled</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Get crafty! You can make everything from purses to picture frames with a little artistic creativity and sell them on sites like Etsy.&nbsp;<a title="She Turns Trash Into Cash" href="http://www.more.com/reinvention-money/second-acts/she-turns-trash-into-cash" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">This woman in Turkey</a>&nbsp;built a whole business out of turning used packaging like candy wrappers and canned-food labels into clutches and handbags.</p>
                                            <h3 style="margin: 28px 0px 14px; max-height: 1e+06px; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; color: rgb(70, 70, 70); font-size: 1.15em; padding: 0px !important; background-color: rgb(255, 255, 255) !important;">Selling</h3>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Food packaging</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Cut out those&nbsp;<a title="Boxtops For Education" href="http://www.thepennyhoarder.com/blog-posting-7/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">Boxtops for Education</a>&nbsp;and sell them on eBay — you may not have any use for them, but other people will pay for them.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Old baby toys/household items/etc.</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:</b>&nbsp;Just because you’re no longer using something, that doesn’t mean someone else won’t be able to get many more years out of it. Rather than trashing your gently used items, consider selling them at a&nbsp;<a title="A Fun and Low-Cost Business: Selling at Flea Markets" href="http://www.thepennyhoarder.com/selling-at-flea-markets/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">flea market</a>, garage sale or on Craigslist to put some extra cash in your pocket (and keep one more item out of a landfill).</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Defunct phones</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Upgraded to something cooler? Don’t junk your old device;&nbsp;<a title="How to Sell Your Old Phone for the Most Amount of Cash" href="http://www.thepennyhoarder.com/how-to-sell-your-old-phone-for-the-most-amount-of-cash/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">you can sell it</a>&nbsp;for profit.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Item: Used stuffed animals</b></p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Better use:&nbsp;</b>Give them a clean-up and&nbsp;<a title="How to Sell Used Stuffed Animals for Extra Cash" href="http://www.thepennyhoarder.com/how-to-sell-used-stuffed-animals-for-extra-cash/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">sell them on eBay</a>. Collectors, gift-givers and people looking to recapture their childhood are all willing to pay to take them off your hands.</p>
                                            <h3 style="margin: 28px 0px 14px; max-height: 1e+06px; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; color: rgb(70, 70, 70); font-size: 1.15em; padding: 0px !important; background-color: rgb(255, 255, 255) !important;">For Bonus Points</h3>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">Once you’ve learned how to max out the profit with your own trash, why not take it up a notch and starting&nbsp;<a title="Why You Should See Dollar Signs When Your Neighbor Puts Junk On the Curb" href="http://www.thepennyhoarder.com/i-found-50-in-the-garbage/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">selling other people’s junk</a>? Dumpster-diving and curbside-trolling aren’t just for recent grads hoping to score a futon; they can also become a nice side business if you’re willing to put in a little work. You can also snag&nbsp;<a title="How to Make Money Reselling Craigslist Freebies" href="http://www.thepennyhoarder.com/how-to-make-money-reselling-craigslist-freebies/" target="_blank" style="margin: 0px; padding: 0px; max-height: 1e+06px; color: rgb(168, 100, 168); text-decoration: underline; outline: 0px; font-weight: bold; font-size: 22px;">free items on Craigslist</a>&nbsp;and resell them for a profit.</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);">Look at you, saving the planet and making money at the same time!</p>
                                            <p style="margin-bottom: 28px; padding: 0px; max-height: 1e+06px; color: rgb(70, 70, 70); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 20px; line-height: 28px; background-color: rgb(255, 255, 255);"><b style="margin: 0px; padding: 0px; max-height: 1e+06px;">Your Turn: These are just a few ideas for making money from commonly thrown-away items. What other ways can you think of to turn your trash into cash?</b></p>
                                        </textarea>
                                    </div>
                                </div>


                                <!-- info modal -->
                                <div id="wl-info-modal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Create New Information</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputTitle" class="col-md-12 control-label">Title</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="inputTitle" placeholder="You should really write something here">
                                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAuthor" class="col-md-12 control-label">Author</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="inputAuthor" placeholder="You should really write something here">
                                                        <p class="help-block wl-c-gray-1">You should really write something here</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" id="wl-info-modal-submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile -->
                        <div class="wl-profile-content wl-page-content col-sm-12 wl-hide no-padding">
                            <div class="col-sm-3 no-padding wl-pro-full-info">
                                <img data-name="John" class="wl-profile-img">
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
                                                <span class="wl-list-quantity" contenteditable="true">Quantity</span> &nbsp;|&nbsp;Php.
                                                <span class="wl-list-price" contenteditable="true">Price</span>
                                            </p>

                                            <div class="form-group form-group-sm">
                                                <select class="form-control wl-list-category">
                                                    <option hidden >Category</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url('js/bootstrap.min.js')?>"></script>


    <!-- Material Design for Bootstrap -->
    <script src="<?=asset_url('js/material.js')?>"></script>
    <script src="<?=asset_url('js/ripples.min.js')?>"></script>
    <script>
        $.material.init();
        $.material.ripples(".sidebar-nav li:not(.sidebar-brand), .wl-btn-post");
    </script>

    <!-- Other Plugins -->
    <script src="<?=asset_url('js/initial.min.js')?>"></script>
    <script src="<?=asset_url('js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <script src="<?=asset_url('js/wl-global.js')?>"></script>


    <script src="<?=asset_url('js/moment.min.js')?>"></script>
    <script src="<?=asset_url('js/livestamp.min.js')?>"></script>
    <script src="<?=asset_url('js/wysiwyg.min.js')?>"></script>
    <script src="<?=asset_url('js/wysiwyg-editor.min.js')?>"></script>
    <script src="<?=asset_url('js/jquery.wysiwyg.js')?>"></script>

    <!-- WL plugins -->

    <script src="<?=asset_url('js/wl-info.js')?>"></script>
    <script src="<?=asset_url('js/wl-profile.js')?>"></script>

</body>

</html>
