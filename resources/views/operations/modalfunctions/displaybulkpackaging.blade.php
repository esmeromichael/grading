
<div class="modal fade" id="myBulkPackagingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Packaging</b></h4>
                <a  align="right" href="#" data-toggle="modal" data-target="#mySaveBulkPackagingModal"><i class="fa fa-folder"></i></a>
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
                       
                        <td>{{$bulkunits->id}}</td>
                        <td>{{$bulkunits->name}} </td>
                        <td>{{$bulkunits->unit_code}}</td>
                        <td>{{$bulkunits->qty}}</td>
                        <td>{{$bulkunits->name}}</td>
                        <td>{{$bulkunits->active}}</td>
                        
                    </tr>
                    @endforeach
              
            </tbody>

         
    </table>
                           
                </form>
            </div>
        </div>
    </div>
</div>

 @include('operations.modalfunctions.savebulkpackaging')

<!-- @if(!empty($error_code) And $error_code == 5)
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif -->



   