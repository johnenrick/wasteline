<link href="<?= asset_url('css/owl.theme.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/owl.carousel.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/owl.transitions.css') ?>" rel="stylesheet">

<script src="<?= asset_url("js/owl.carousel.js") ?>" ></script>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid wl-full-height">
            <div class="row wl-full-height">
                <!-- main content -->
                <div  class="wl-full-height col-sm-12 no-padding">
                    <div id="portalInformationPanel" class="wl-full-height col-sm-7 no-padding" style="background:#2f323a;color:white;">
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
                    <div id='portalLoginPanel' class="col-sm-5 no-padding" style="height:100%;background: url('./assets/images/lp-img4.jpg') no-repeat center center;background-size:cover;">
                        <div class="col-md-12" style="height:100%;padding-top:10%; background:rgba(47,50,58,0.9);">
                            <div id="login-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="padding-top:15%; ">
                                <form id="loginForm" method="post" action="">
                                    <h1 style="color:white;">Login</h1>
                                    <p  style="color:white;font-size:13px;">
                                        Lorem ipsum dolor sit amet, ea eum choro homero forensibus, tantas noster corrumpit sea in.
                                    </p>
                                    <p class="formMessage" style="color:white">

                                    </p>
                                    <div class="form-group label-floating ">
                                        <label class="control-label" for="focusedUsername">Username / Email</label>
                                        <input name="username" class="form-control-light form-control"  type="text" required="true">
                                        <p  class="help-block wl-c-gray-1">Please enter your registered username or email</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="focusedPassword">Password</label>
                                        <input name="password" class="form-control-light form-control" type="password" required="true">
                                        <p class="help-block wl-c-gray-1">Type you password. Make sure capitalization is correct</p>
                                    </div>
                                    <div class="form-group">
                                        <button href="javascript:void(0)" class="btn btn-raised btn-success submitButton">LOGIN</button>
                                        <a href="javascript:void(0)" class="btn btn-landingform"><span class="wl-c-green-1">SIGN UP</span></a>
                                    </div>
                                </form>
                                <br>
                                <span style="color: white">Forgot Password?</span>
                                <form id="passwordRecoveryForm" method="post" action="">
                                     <div class="form-group label-floating">
                                        <p class="formMessage" style="color:white">
                                        </p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        
                                        <input name="email_address" type="email" class="form-control-light form-control" required="true">
                                        <p class="help-block wl-c-gray-1">We will send your reset link through this email</p>
                                    </div>
                                    <div class="form-group">
                                        <button name="recover_password" href="javascript:void(0)" class="btn btn-raised btn-success submitButton" data-loading-text="Please wait..." >RECOVER PASSWORD</button>
                                        
                                    </div>
                                </form>
                            </div>
                            <div id="register-form" class="col-md-7 col-md-offset-1 col-sm-8 col-sm-offset-1" style="display:none">
                                <form id="registrationForm" method="post" action="" >
                                    <h1 style="color:white;">Register</h1>
                                    <p class="formMessage" style="color:white" >

                                    </p>
                                    <input name="account_type_ID" type="hidden" value="4">
                                    <input name="status" type="hidden" value="3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">First Name</label>
                                        <input name="first_name" type="text" class="form-control-light form-control" required="true">
                                        <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Middle Name</label>
                                        <input name="middle_name" type="text" class="form-control-light form-control">
                                        <p class="help-block wl-c-gray-1">Its okay if you don't remember</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Name</label>
                                        <input name="last_name" type="text" class="form-control-light form-control" required="true">
                                        <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input name="email_address" type="email" class="form-control-light form-control" required="true">
                                        <p class="help-block wl-c-gray-1">A valid email is necessary</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Username</label>
                                        <input name="username" type="text" class="form-control-light form-control" required="true">
                                        <p class="help-block wl-c-gray-1">Something unique and cool</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input name="password" type="password" class="form-control-light form-control" required="true" data-minlength="6" >
                                        <p class="help-block wl-c-gray-1">Minimum of 6 alphanumeric characters</p>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Confirm Password</label>
                                        <input name="confirm_password" type="password" class="form-control-light form-control" required="true" data-minlength="6" >
                                        <p class="help-block wl-c-gray-1">Retype your password for security purposes</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-raised btn-success submitButton">SUBMIT</button>
                                        <a href="javascript:void(0)" class="btn btn-landingform cancelFormButton">
                                            <span class="wl-c-green-1">CANCEL</span>
                                        </a>
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
