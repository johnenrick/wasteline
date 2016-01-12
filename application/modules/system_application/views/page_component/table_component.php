<div class="table_component">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline pull-right">
                <div class="form-group">
                    <label for="exampleInputName2">Report Type </label>
                    <select class="form-control">
                        <option>All</option>
                        <option>Illegal Dumping</option>
                        <option>Inappropriate Content</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Reported by </label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Name of the reporter">
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Date </label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="mm/dd/yy">
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Status </label>
                    <select class="form-control">
                        <option>All</option>
                        <option>Resolved</option>
                        <option>Pending</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter</button>
            </form>
        </div>
    </div>
    <div class="row table-responsive">
        <div class="col-sm-12">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>ID <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></th>
                        <th>Type <span class="glyphicon glyphicon-triangle-up" aria-hidden="true"></span></th>
                        <th>Detail</th>
                        <th>Reported by</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Illegal dumping</td>
                        <td>tae</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>


        </div>

    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <nav>
                <ul class="pager">
                    <li><a href="#" class="inactive-link"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Previous</a></li>
                    <li><a href="#">Next <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-4">
            <form class="form-inline pull-right">
                <div class="form-group">
                    <label>Page</label> 
                    <input type="text" class="form-control input-sm" placeholder="" size="2" style="text-align:right">
                    <label>/ 3</label>
                </div>
            </form>
        </div>
    </div>
</div>