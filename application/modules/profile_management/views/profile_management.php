<div class="col-sm-3 no-padding wl-pro-full-info">
    <a height="32" width="32" class="circle">
        <img src="<?=  asset_url("images/profile_picture/simpleswag.jpg")?>" alt="Oh! It's you.">
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
                <input name="updated_data[first_name]" type="text" class="form-control" placeholder="First Name">
                <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputMiddleName" class="col-md-12 control-label">Middle Name</label>
            <div class="col-md-12">
                <input name="updated_data[middle_name]" type="text" class="form-control" placeholder="Middle Name" >
                <p class="help-block wl-c-gray-1">Its okay if you don't remember</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLastName" class="col-md-12 control-label">Last Name</label>
            <div class="col-md-12">
                <input name="updated_data[last_name]" type="text" class="form-control" placeholder="Last Name" >
                <p class="help-block wl-c-gray-1">Use your real name so that your LGU can recognize you</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLastName" class="col-md-12 control-label">Email</label>
            <div class="col-md-12">
                <input name="updated_data[email]" type="email" class="form-control" placeholder="Last Name" >
                <p class="help-block wl-c-gray-1">A valid email is necessary</p>
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
                <input name="updated_data[password]" type="password" class="form-control" id="inputPassword" placeholder="Password">
                <p class="help-block wl-c-gray-1">Retype your password for security purposes</p>
            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-md-12 control-label">Complete Address</label>
            <div class="col-md-12">
                <textarea class="form-control" rows="2" id="textArea"></textarea>
                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
        </div>

        <div class="form-group wl-update-info">
            <button class="btn btn-raised btn-success" style="float:right;">Update Information</button>
        </div>
    </form>
</div>

<div class="col-sm-5 wl-pro-map" style="height:100%;">

</div>