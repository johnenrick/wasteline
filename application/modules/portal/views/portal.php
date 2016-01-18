<link href="<?= asset_url('css/owl.theme.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/owl.carousel.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/owl.transitions.css') ?>" rel="stylesheet">

<script src="<?= asset_url("js/owl.carousel.js") ?>" ></script>
<script src="<?= asset_url("js/jquery.form.min.js"); ?>"></script>



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
                                        <a href="#" class="">
                                            <img src="<?= asset_url("images/portal/trashbin1.png") ?>" alt="...">
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
                                        <a href="#" class="">
                                            <img src="<?= asset_url("images/portal/garbage.png") ?>" alt="...">
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
                <div class="col-sm-5 no-padding" style="height:100%;background: url('./assets/images/lp-img4.jpg') no-repeat center center;background-size:cover;">
                    <div class="col-md-12" style="height:100%;padding-top:10%; background:rgba(47,50,58,0.9);">
                        <div id="login-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="padding-top:15%; ">
                            <form id="loginForm" method="post" action="">
                                <h1 style="color:white;">Login</h1>
                                <p  style="color:white;font-size:13px;">
                                    Lorem ipsum dolor sit amet, ea eum choro homero forensibus, tantas noster corrumpit sea in.
                                </p>
                                <p class="formMessage" >
                                    
                                </p>
                                <div class="form-group label-floating ">
                                    <label class="control-label" for="focusedUsername">Username</label>
                                    <input name="username" class="form-control-light form-control" id="focusedUsername" type="text" required="true">
                                    <p  class="help-block wl-c-gray-1">You should really write something here</p>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="focusedPassword">Password</label>
                                    <input name="password" class="form-control-light form-control" id="focusedPassword" type="password">
                                    <p class="help-block wl-c-gray-1">You should really write something here</p>
                                </div>
                                <div class="form-group">
                                    <button href="javascript:void(0)" class="btn btn-raised btn-success">LOGIN</button>
                                    <a href="javascript:void(0)" class="btn btn-landingform"><span class="wl-c-green-1">SIGN UP</span></a>
                                </div>
                            </form>
                        </div>
                        <div id="register-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="display:none">
                            <form id="registrationForm" method="post" action="">
                                <h1 style="color:white;">Register</h1>
                                <input name="account_type_ID" type="hidden" value="2">
                                <input name="status" type="hidden" value="3">
                                <div class="form-group label-floating has-error">
                                    <label class="control-label" for="inputFirstName">First Name</label>
                                    <input name="first_name" type="text" class="form-control-light form-control" id="inputFirstName">
                                    <p class="help-block wl-c-gray-1">You should really write something here</p>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="inputMiddleName">Middle Name</label>
                                    <input name="middle_name" type="text" class="form-control-light form-control" id="inputMiddleName">
                                    <p class="help-block wl-c-gray-1">You should really write something here</p>
                                </div>
                                <div class="form-group label-floating has-success">
                                    <label class="control-label" for="inputLastName">Last Name</label>
                                    <input name="last_name" type="text" class="form-control-light form-control" id="inputLastName">
                                    <p class="help-block wl-c-gray-1">Success Sample</p>
                                </div>
                                <div class="form-group label-floating has-warning">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <input name="username" type="text" class="form-control-light form-control" id="inputUsername">
                                    <p class="help-block wl-c-gray-1">Warning Sample</p>
                                </div>
                                <div class="form-group label-floating has-error">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <input name="password" class="form-control-light form-control" id="inputPassword" type="password">
                                    <p class="help-block wl-c-gray-1">Error Sample</p>
                                </div>
                                <div class="form-group">
                                    <button href="javascript:void(0)" class="btn btn-raised btn-success">SUBMIT</button>
                                    <a href="javascript:void(0)" class="btn btn-landingform"><span class="wl-c-green-1">CANCEL</span></a>
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
