<div class="table_component">
    <div class="row">
        <div class="col-sm-12">
            <form action="" class="tableComponentFilterForm form-inline pull-right" method="post">
                <input name="limit" value="20" type="hidden">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter</button>
            </form>
        </div>
    </div>
    <div class="row table-responsive">
        <div class="col-sm-12">
            <table class="tableComponentTable table table-hover ">
                <thead>
                    <tr>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


        </div>

    </div>
    <div class="row">
        <div class="col-sm-4">
            <form class="form-inline ">
                <div class="form-group">
                    <label class="tableComponentTotalResult"></label> 
                    <label>Result(s)</label>
                </div>
            </form>
        </div>
        <div class="col-sm-4 ">
            <nav>
                <ul class="pager">
                    <li class="tableComponentPreviousPage"><a href="#" class="inactive-link"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Previous</a></li>
                    <li class="tableComponentLoading"><a href="#" class="inactive-link"> Retrieving Data</a></li>
                    <li class="tableComponentNextPage" ><a href="#">Next <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-4">
            <form class="form-inline pull-right">
                <div class="form-group">
                    <label>Page</label>
                    <input type="text" class="form-control input-sm tableComponentCurrentPage" placeholder="" size="2" value="0" style="text-align:right">
                    <label>/ <span class="tableComponentTotalPage">3</span></label>
                </div>
            </form>
        </div>
    </div>
    <div class="prototype" style="display:none">
        <input name="sort" value="0" type="hidden">
        <table>
            <th class="tableComponentColumnHead" ><span class="tableComponentColumnName"></span> <span class="tableComponentColumnSortIndicator glyphicon glyphicon-triangle-bottom" ></span></th>
        </table>
        <div class="tableComponentFilterOptionSelect form-group">
            <label></label>
            <select class="form-control">
            </select>
        </div>
        <div class="tableComponentFilterOption form-group">
            <label ></label>
            <input class="form-control">
        </div>
    </div>
</div>