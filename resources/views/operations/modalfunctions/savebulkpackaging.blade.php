
<div class="modal fade" id="SaveBulkPackagingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Packaging</b></h4>              
            </div>

            <div class="modal-body">
                <form class="form-horizontal" id="" role="form" method="POST" action="{{ action('Operations\ItemController@createBulkPackaging')}}" >
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
                            <input type="text" class="form-control" name="unit_code"  required>
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
                           <select name="bulk_units_id">
                               @foreach($dropdownbulkunit as $bulkunit)
                               <option value="{{$bulkunit->id}}">{{$bulkunit->name}}</option>
                              @endforeach                                 
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Active</label>
                        <div class="col-md-6">
                             <input type="checkbox" name="active" value="Active" checked >
                             <input type="hidden" class="form-control" name="type" value="bulk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-lg btn-primary btn-sm" type="submit" >Save</button>
                        <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


