

<div class="modal fade" id="myUpdateBulkModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Update Bulk Unit</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="bulkUnit" role="form"  method="POST" action="{{ action('Operations\ItemController@updatebulkUnit',$iteminfo->id)}}" >
                        <input type="hidden" class="form-control"  name="item_id" value="{{$iteminfo->id}}" readonly="readonly"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">                                               
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Unit Code</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="unit_code" name="unit_code" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Quantity</label>
                        <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Must be input numbers" name="qty" id="qty" onkeypress="return isNumberKey(event);" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">UOM</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  value="{{$iteminfo->uom->name}}" readonly="">
                            <input type="hidden" class="form-control" name="uom_id" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                
                                <select name="active" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>                                     
                                <input type="hidden" class="form-control" name="type" value="base">
                            </div>
                    </div>
                    <div class="modal-footer">
                     <button class="btn btn-lg btn-primary btn-sm" id="myBtn" type="submit" >Update</button>
                     <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>

