<link href="<?= asset_url('css/wysiwyg-editor.min.css') ?>" rel="stylesheet">
<link href="<?=asset_url('css/font-awesome.min.css')?>" rel="stylesheet">
<div class="col-sm-4 col-md-3 wl-info-list no-padding">
    <div class="col-sm-12 wl-info-header">
        <span id="samplehaha">Shared Information</span> <span class="badge information-count"></span>
        <span data-toggle="modal" data-target="#wl-info-modal" class="informationTick">
            <a id="wl-info-addbtn" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="Create new information">+</a>
        </span>
    </div>
    <div class="col-xs-12 wl-info-mainlist scroll-on no-padding">
        <ul id="informationList">
            <li class="wl-info-li wl-list-dummy">
                <div class="col-xs-2">
                    <img class="wl-info-box">
                </div>
                <div class="col-xs-10">
                    <p class="wl-list-title"></p>
                    <p class="wl-list-sub"><span></span></p>
                </div>
            </li>

        </ul>
    </div>
</div>
<div class="col-sm-8 col-md-9 wl-info-display no-padding">
    <div class="col-xs-12 wl-info-full scroll-on no-padding">
        <!-- ######################################## -->
        <div class="col-xs-12 wl-info-description wl-heaher-dummy" style="display: none">
            <div class="col-xs-12 wl-info-fixed">
                <div class="wl-info-box">
                    <img data-name="" class="wl-box" id="sampleid">
                </div>
                <div class="wl-info-title">
                    <h2 contenteditable="true" holder="description"></h2>
                    <h4>
                        <span class="wl-info-author" contenteditable="true" holder="source"></span>
                        <!-- &nbsp;|&nbsp; -->
                        <span class="wl-info-stamp" data-livestamp=""></span>
                    </h4>
                </div>
            </div>
        </div>
        <!-- ############################################ -->
        <div class="col-xs-12 wl-info-content" style="display: none">
            <form id="wl-content-form">
                <textarea id="wl-info-editor" name="editor" placeholder="Type your text here..." >
                </textarea>
            </form>
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
