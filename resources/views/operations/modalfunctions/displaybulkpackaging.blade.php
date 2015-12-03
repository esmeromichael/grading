
<div class="modal fade" id="myBulkPackagingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <a  align="right" href="#" id="myBtn5"><i class="fa fa-folder modal-saveIcon"></i></a>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Packaging</b></h4>
                
            </div>
            <div class="modal-body">
                <form class="form-signin" name="createcontactform" method="POST" action="" >                   
                    <input type="hidden" class="form-control"  name="item_id" value="{{$iteminfo->id}}" readonly="readonly">
                     
                    <table class="table table-striped table-hover">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Packaging Name</th>
                                <th>Unit Code</th>
                                <th>Qty</th>
                                <th>UOM</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bulkunits2 as $bulkunits)
                            <tr>
                                
                                 <td> <a href="#updateBulkPackagingModal"  data-toggle="modal" data-name="{{$bulkunits->name}}" data-id="{{$bulkunits->id}}" 
                                        data-unitcode="{{$bulkunits->unit_code}}" data-qty="{{$bulkunits->qty}}" data-status="{{$bulkunits->active}}"
                                        id="myBtn6">{{ $bulkunits->id }} </a></td>
                                <td>{{$bulkunits->name}} </td>
                                <td>{{$bulkunits->unit_code}}</td>
                                <td>{{$bulkunits->qty}}</td>
                                <td>{{$bulkunits->baseunit->name}}</td>
                                <td>{{$bulkunits->active}}</td>                                            
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


@include('operations.modalfunctions.savebulkpackaging')
@include('operations.modalfunctions.updatebulkpackaging')
<!-- @if(!empty($error_code) And $error_code == 5)
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif -->



   