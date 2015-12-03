
<div class="modal fade" id="mySaveBulkModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Unit</b></h4>
            </div>
                <div class="modal-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <form class="form-horizontal"  name="bulkUnit" role="form"  method="POST" action="{{ action('Operations\ItemController@createBulkUOM')}}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="item_id" value="{{$iteminfo->id}}">
                </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Unit Code</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="unit_code" required>
                    </div>
                </div>
                <div class="form-group">
                     <label class="col-md-4 control-label">Quantity</label>
                     <div class="col-md-6">
                         <input type="text" class="form-control" name="qty" placeholder="Must be input numbers" name="qty" id="qty" onkeypress="return isNumberKey(event);" required>
                     </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">UOM</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"  value="{{$iteminfo->uom->name}}" readonly="">
                        <input type="hidden" class="form-control" name="uom_id" value="{{$iteminfo->uom->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Active</label>
                    <div class="col-md-6">
                        <input type="checkbox" name="active" value="Active" checked >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-sm" id="myBtn" type="submit" >Save</button>
                <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>



