<div  class="col-md-8 col-md-offset-2">
    <button id="LGUManagementCreateUser" type="submit" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create LGU User</button>
</div>

<div id="LGUManagementTableContainer" class="col-md-8 col-md-offset-2">

</div>
<div class="prototype" style="display:none">
    <table>
        <tr class="LGUManagementTableRow">
            <td class="LGUManagementID"></td>
            <td class="LGUManagementUsername wl-c-green-1" ></td>
            <td class="LGUManagementFullName capitalize" ></td>
            <td ><button class="LGUManagementTableViewDetail btn btn-raised btn-xs btn-info no-margin">view</button></td>
        </tr>
    </table>
</div>
<!-- info modal -->
<div id="LGUManagementUserDetail" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="LGUManagementUserDetailForm" method="POST">
                <input name="ID" value="0" type="hidden">
                <input name="account_type_ID" value="3" type="hidden">
                <input name="status" value="1" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">User Information</h4>
                </div>

                <div class="modal-body scroll-on">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="formMessage" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            
                            <div class="col-md-12"> 
                                <h5 class="modal-title">Personal Information</h5>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">First Name</label>
                                <div class="col-md-12">
                                    <input  input_name="first_name" is_data="1" type="text" class="form-control" placeholder="First Name">
                                    <p class="help-block wl-c-gray-1">First Name</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Middle Name</label>
                                <div class="col-md-12">
                                    <input input_name="middle_name" is_data="1" type="text" class="form-control"  placeholder="Middle Name">
                                    <p class="help-block wl-c-gray-1">Middle Name</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Last Name</label>
                                <div class="col-md-12">
                                    <input input_name="last_name" is_data="1" type="text" class="form-control"  placeholder="Last Name">
                                    <p class="help-block wl-c-gray-1">Last Name</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Contact Information</label>
                                <div class="col-md-12">
                                    <input input_name="contact_number_ID" is_data="1" type="hidden">
                                    <input input_name="contact_number_detail" is_data="1" type="text" class="form-control"  placeholder="Contact Number">
                                    <p class="help-block wl-c-gray-1">Contact Number</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Email Address</label>
                                <div class="col-md-12">
                                    <input input_name="email_ID" is_data="1" type="hidden">
                                    <input input_name="email_detail" is_data="1" type="email" class="form-control"  placeholder="Email Address">
                                    <p class="help-block wl-c-gray-1">Email Address</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="modal-title">Log In Information</h5>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Username</label>
                                <div class="col-md-12">
                                    <input input_name="username" is_data="1" type="text" class="form-control"  placeholder="Username">
                                    <p class="help-block wl-c-gray-1">Unique name for the user. This will be used for them to log in</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Password</label>
                                <div class="col-md-12">
                                    <input input_name="password" is_data="1" type="password" class="form-control" data-minlength="6" placeholder="Password">
                                    <p class="help-block wl-c-gray-1">Minimum of 6 characters</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Confirm Password</label>
                                <div class="col-md-12">
                                    <input input_name="confirm_password" is_data="1" type="password" class="form-control" data-minlength="6" placeholder="Confirm Password">
                                    <p class="help-block wl-c-gray-1">Retype your password to verify it is correct</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p id="LGUManagementUserDetailDeactiveNotice" style="color:red">NOTE: This account has been deactivated.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="background-image:url('<?= asset_url("images/lp-img1.jpg") ?>'); height:200px;margin-top:30px">
                            <!-- insert Leaflet here -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button status="3" type="button" class="LGUManagementUserDetailChangeAccountStatus btn btn-warning pull-left ">Deactivate Account</button>
                    <button status="1" type="button" class="LGUManagementUserDetailChangeAccountStatus btn btn-info pull-left">Activate Account</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>