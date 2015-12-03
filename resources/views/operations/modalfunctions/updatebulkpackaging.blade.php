<body >
<div class="modal fade" id="updateBulkPackagingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Update Bulk Packaging</b></h4>
               
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ action('Operations\ItemController@updatebulkPackaging',$iteminfo->id)}}" >

                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">


                            
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="item_id" name="item_id" value="{{$iteminfo->id}}">
                            </div>
                    </div>

                        <div class="form-group"> 
                    <div class="col-md-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Unit Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="unit_code" name="unit_code">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qty" name="qty">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">UOM</label>
                            <div class="col-md-6">
                               <select name="bulk_units_id" class="form-control">
                                   @foreach($dropdownbulkunit as $bulkunit)
                                   <option value="{{$bulkunit->id}}">{{$bulkunit->name}}</option>
                                  @endforeach
                                  
                               </select>

                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">

                                <select name="active" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>                                                             
                                <input type="hidden" class="form-control" name="type" value="bulk">
                            </div>
                    </div>


<div class="modal-footer">
                     <button class="btn btn-lg btn-primary btn-sm" type="submit" >Update</button>
  
          <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>


