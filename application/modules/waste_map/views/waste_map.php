
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" style="margin-top:0px">
                        <div class="col-md-12">
                            <textarea name="" class="form-control capitalize" rows="4" placeholder="Write the details or leave a note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="wasteMapSubmitIllegalDumpingReport btn btn-warning">Submit Report</button>
                </div>
            </div>
        </div>
    </div>
</div>
