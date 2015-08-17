
<div class="modal fade" id="mySaveBulkPackagingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Packaging</b></h4>
               
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ action('Operations\ItemController@createBulkUOM')}}" >

                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">


                            
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="item_id" value="{{$iteminfo->id}}">
                            </div>
                    </div>


                    <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Unit Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="unit_code">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="qty">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">UOM</label>
                            <div class="col-md-6">
                               <select name="uom">
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

                                 <input type="hidden" class="form-control" name="uom_id" value="">
                            </div>
                    </div>

                     <button class="btn btn-lg btn-primary btn-sm" type="submit" >Save</button>

                </form>
            </div>
        </div>
    </div>
</div>

