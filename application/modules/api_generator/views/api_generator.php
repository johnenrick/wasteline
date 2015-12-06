<html>
    <head>
        <title>Wasteline API Generator</title>
        <link rel="stylesheet" href="<?php echo asset_url() ?>css/bootstrap.min.css"  >
        
        <script src="<?php echo asset_url() ?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo asset_url()?>js/bootstrap.min.js" ></script>
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Modules
                        </div>
                        <div class="panel-body">
                            <table id="moduleTable" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Parent</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        
                    </div>
                </div>
            </div>
            <div class="prototype" style="display:none">
                <table>
                    <tr class="moduleTableRow">
                        <td class="moduleID">1</td>
                        <td class="moduleDescription">API Controller</td>
                        <td>
                            <select class="moduleParent form-control">
                                <option>Testing</option>
                                <option>Sample</option>
                            </select>
                        </td>
                        <td>
                            <button class="moduleDelete btn btn-danger">
                                &nbsp;<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
    </body>
</html>