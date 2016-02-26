 
<legend>Report Management</legend>

<div id="reportManagementTableContainer" class="col-sm-12">

</div>
<div class="prototype" style="display:none">
     <table>
        <tr class="reportManagementTableRow">
            <td class="reportManagementID"></td>
            <td class="reportManagementDetails"></td>
            <td class="reportManagementFullName capitalize" ></td>
            <td class="reportManagementType"></td>
            <td class="reportManagementStatus wl-c-green-1" ></td>
            <td ><button class="reportManagementTableViewDetail btn btn-raised btn-xs btn-info no-margin">View</button></td>
        </tr>
    </table>
</div>
<!-- info modal -->
<div id="reportManagementUserDetail" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="reportManagementUserDetailForm" method="POST">
                <input name="ID" value="0" type="hidden">
                <input name="account_type_ID" value="3" type="hidden">
                <input name="status" value="1" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Report Information</h4>
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
                            <div class="form-group">
                                <label  class="col-md-12 control-label">First Name:</label>
                                <div class="col-md-12">
                                    <input  input_name="reporter_first_name" is_data="1" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Middle Name:</label>
                                <div class="col-md-12">
                                    <input input_name="reporter_middle_name" is_data="1" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Last Name:</label>
                                <div class="col-md-12">
                                    <input input_name="reporter_last_name" is_data="1" type="text" class="form-control" readonly>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label  class="col-md-12 control-label">Report Detail:</label>
                                <div class="col-md-12">
                                    <input input_name="detail" is_data="1" type="email" class="form-control" readonly>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p id="reportManagementUserDetailDeactiveNotice" style="color:red">NOTE: This report is already resolved.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="height:450px;width:410px">
                                <div id = "reportManagementWebMap" class="w1-pro-map">
                        	</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button status="3" type="button" class="reportManagementUserDetailChangeAccountStatus btn btn-warning pull-left ">Resolve</button>
                    <button status="1" type="button" class="reportManagementUserDetailChangeAccountStatus btn btn-info pull-left">Ongoing</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

