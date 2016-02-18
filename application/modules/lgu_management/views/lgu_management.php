

<div id="LGUManagementTableContainer" class="col-sm-12">

</div>
<div class="prototype">
    <table>
        <tr class="LGUManagementTableRow">
            <td class="LGUManagementID"></td>
            <td class="LGUManagementUsername wl-c-green-1" ></td>
            <td class="LGUManagementFullName capitalize" ></td>
            <td class="LGUManagementAction" ><a class="btn btn-raised btn-xs btn-info no-margin" data-toggle="modal" data-target="#wl-table-modal">view</a></td>
        </tr>
    </table>
</div>
<!-- info modal -->
    <div id="wl-table-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">User Information</h4>
                </div>
                <div class="modal-body scroll-on">
                    <div class="row">
                        <div class="form-group">
                            <label for="inputUsername" class="col-md-12 control-label">Username</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="inputUsername" placeholder="You should really write something here">
                                <p class="help-block wl-c-gray-1">You should really write something here</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-md-12 control-label">Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="inputName" placeholder="You should really write something here">
                                <p class="help-block wl-c-gray-1">You should really write something here</p>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="wl-info-modal-submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
