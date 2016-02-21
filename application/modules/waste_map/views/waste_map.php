
<!--<legend>Waste Map</legend>-->
<div id="wasteMapContainer">

</div>
<!-- footer container-->
<div id="wl-footer-content" class="wl-footer-map">
    <div class="row form-inline">
        <div class="col-md-7">
            <a class="btn btn-default capitalize wl-map-filter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to display only Garbages"><span class="circle"></span>Garbage</a>
            <a class="btn btn-default capitalize wl-map-filter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to display only Services"><span class="circle"></span>Services</a>
            <a class="btn btn-default capitalize wl-map-filter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to display only Reports"><span class="circle"></span>Garbage Report</a>
            <a class="btn btn-default capitalize wl-map-filter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to display only Dumping Locations"><span class="circle"></span>Dumping Area</a>
            <a class="btn btn-default capitalize wl-map-filter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to display only Bryg. Hall Location"><span class="circle"></span>LGU Location</a>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control floating-label wl-map-date wl-datetimepicker" placeholder="Min. Date">
            <span>to</span>
            <input type="text" class="form-control floating-label wl-map-date wl-datetimepicker" placeholder="Max. Date">
        </div>
    </div>
</div>
<div class="prototype" style="display:none">
    <div class="illegalDumping panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Report Illegal Dumping</h3>
        </div>
        <div class="panel-body">
            <form class="illegalDumpingForm" method="POST" >
                <input name="report_ID" value="0" type="hidden">
                <input name="map_marker_ID" value="0" type="hidden">
                <input name="associated_ID" value="0" type="hidden">
                <input name="report_type_ID" value="3" type="hidden">
                <input name="longitude" type="hidden">
                <input name="latitude" type="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-top:0px">
                            <div class="col-md-12">
                                <textarea input_name="detail" class="form-control capitalize" rows="4" placeholder="Write the details or leave a note" ></textarea>
                                <p class="wasteMapIllegalDumpingDetail form-control capitalize" style="margin-top:0px"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" button_action="1" class="wasteMapSubmitIllegalDumpingReport btn btn-warning">Submit Report</button>
                        <button type="button" button_action="2" class="wasteMapSubmitIllegalDumpingReport btn btn-danger">Remove Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="wasteMapDumpingLocation panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Dumping Location</h3>
        </div>
        <div class="panel-body">
            </form>
            <form class="wasteMapDumpingLocationForm" method="POST" >
                <input name="map_marker_ID" value="0" type="hidden">
                <input name="associated_ID" value="0" type="hidden">
                <input name="longitude" type="hidden">
                <input name="latitude" type="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating  is-empty " style="margin-top:0px">
                            <label class="control-label" for="focusedUsername">Dumping Description</label>
                            <input input_name="description" class="form-control" type="text" required="true">
                            <p class="help-block wl-c-gray-1">Just a label for this location</p>
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group label-floating  is-empty " style="margin-top:0px">
                            <label class="control-label" for="focusedUsername">Instruction/Note</label>
                            <textarea input_name="detail" class="form-control capitalize" rows="2" ></textarea>
                            <p class="wasteMapDumpingLocationDetail form-control capitalize" style="margin-top:0px"></p>
                            <p class="help-block wl-c-gray-1">Make things clear</p>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" button_action="1" class="wasteMapSubmitDumpingLocationReport btn btn-info">Place Dumping Location</button>
                        <button type="button" button_action="2" class="wasteMapSubmitDumpingLocationReport btn btn-danger">Remove Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
