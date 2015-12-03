
<div class="modal fade" id="myDisplayBulkUnit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <a  align="right" href="#" id="myBtn2"><i class="fa fa-folder modal-saveIcon"></i></a>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Unit</b></h4>
                
            </div>
            <div class="modal-body">
                <form class="form-signin" name="createcontactform" method="POST" action="" >                 
                    <input type="hidden" class="form-control"  name="item_id" value="{{$iteminfo->id}}" readonly="readonly">                    
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Packaging Name</th>
                                    <th>Unit Code</th>
                                    <th>Qty</th>
                                    <th>UOM</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($bulkunits as $bulkunit)
                                <tr>
                                    <td> <a href="# #myUpdateBulkModal"  data-toggle="modal" data-name="{{$bulkunit->name}}" data-id="{{$bulkunit->id}}" 
                                            data-unitcode="{{$bulkunit->unit_code}}" data-qty="{{$bulkunit->qty}}" data-status="{{$bulkunit->active}}"
                                            id="myBtn3">{{ $bulkunit->id }} </a></td>
                                    <td>{{$bulkunit->name}} </td>
                                    <td>{{$bulkunit->unit_code}}</td>
                                    <td>{{$bulkunit->qty}}</td>
                                    <td>{{$iteminfo->uom->name}}</td>
                                    <td>{{$bulkunit->active}}</td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>            
                </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
@include('operations.modalfunctions.savebulkunit')
@include('operations.modalfunctions.updatebulkunit')

