<div class="col-sm-3 no-padding wl-pro-full-info">
    <img id="profileManagementProfilePicture" class="wl-profile-img" data-char-count="2">
    <p id="profileManagementFullName" class="wl-full-name capitalize">
    </p>
    <p id="profileManagementUsername" class="wl-username">
    </p>
    <p id="profileManagementCompleteAddress" class="wl-complete-address">
    </p>
    <hr>
    <p id="profileManagementEmailAddress" class="wl-slogan"></p>
    <p class="wl-slogan-edit">Email</p>
    <p id="profileManagementContactNumber" class="wl-slogan"></p>
    <p class="wl-slogan-edit">Contact Number</p>
</div>

<div class="col-sm-4 wl-pro-edit scroll-on" style="height:100%;">
    <form id="profileManagementForm" method="post">
        <h5>Edit Your Personal Settings</h5>

        <hr>

        <div class="form-group">
            <div class="col-md-12">
                <p class="formMessage" ></p>
            </div>
        </div>

        <div class="form-group">

            <label for="inputFirstName" class="col-md-12 control-label">First Name</label>
            <div class="col-md-12">

                <input name="updated_data[first_name]" type="text" class="form-control capitalize" placeholder="First Name">
                <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputMiddleName" class="col-md-12 control-label">Middle Name</label>
            <div class="col-md-12">
                <input name="updated_data[middle_name]" type="text" class="form-control capitalize" placeholder="Middle Name" >
                <p class="help-block wl-c-gray-1">Its okay if you don't remember</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLastName" class="col-md-12 control-label">Last Name</label>
            <div class="col-md-12">
                <input name="updated_data[last_name]" type="text" class="form-control capitalize" placeholder="Last Name" >
                <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputLastName" class="col-md-12 control-label">Email</label>
            <div class="col-md-12">
                <input name="updated_data[email_ID]" value="0" type="hidden" >
                <input name="updated_data[email_detail]" type="email" class="form-control" placeholder="Email Address" >
                <p class="help-block wl-c-gray-1">A valid email is necessary</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLastName" class="col-md-12 control-label">Contact Number</label>
            <div class="col-md-12">
                <input name="updated_data[contact_number_ID]" value="0" type="hidden" class="form-control" >
                <input name="updated_data[contact_number_detail]" type="text" class="form-control" placeholder="Contact Number" >
                <p class="help-block wl-c-gray-1">Your contact number. You may separate multiple number with "/" </p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputUsername" class="col-md-12 control-label">Username</label>
            <div class="col-md-12">
                <input name="updated_data[username]" type="text" class="form-control" placeholder="Username" >
                <p class="help-block wl-c-gray-1">Something unique and cool</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-md-12 control-label">Password</label>
            <div class="col-md-12">
                <input name="updated_data[password]" type="password" class="form-control" id="inputPassword" placeholder="Password">
                <p class="help-block wl-c-gray-1">Minimum of 6 alphanumeric characters</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-md-12 control-label">Confirm Password</label>
            <div class="col-md-12">
                <input name="updated_data[confirm_password]" type="password" class="form-control" id="inputPassword" placeholder="Password">
                <p class="help-block wl-c-gray-1">Retype your password for security purposes</p>
            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-md-12 control-label">Complete Address</label>
            <div class="col-md-12">
                <input name="updated_data[account_address_ID]" type="hidden" >
                <input name="updated_data[account_address_longitude]" type="hidden">
                <input name="updated_data[account_address_latitude]" type="hidden">
                <input name="updated_data[account_address_map_marker_ID]" type="hidden">
                <textarea name="updated_data[account_address_description]" class="form-control capitalize" rows="2" placeholder="Complete Address"></textarea>
                <span class="help-block">Click the map on the right to indicate your address. Or use GPS <i class="fa fa-map-marker"></i> location on the bottom left in the map</span>
            </div>
        </div>

        <div class="form-group wl-update-info">
            <button class="btn btn-raised btn-success submitButton" data-loading-text="Please wait..." style="float:right;">Update Information</button>
        </div>
    </form>
</div>

<div id="profileManagementWebMap" class="col-sm-5 wl-pro-map" >

</div>
