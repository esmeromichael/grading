
<div class="modal fade" id="myBulkModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Bulk Unit</b></h4>
                <a  align="right" href="#" data-toggle="modal" data-target="#mySaveBulkModal"><i class="fa fa-folder"></i></a>
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
                        <td> <a href="#"  data-toggle="modal"  value="{{$bulkunit->id}}" data-target="#myUpdateBulkModal"><input type="hidden" class="form-control" id="id" name="id" value="{{$bulkunit->id}}" readonly="readonly">{{ $bulkunit->id }} </a></td>
                        <td>{{$bulkunit->name}} </td>
                        <td>{{$bulkunit->unit_code}}</td>
                        <td>{{$bulkunit->qty}}</td>
                        <td>{{$bulkunit->uom->name}}</td>
                        <td>{{$bulkunit->active}}</td>
                    </tr>
                    @endforeach
            </tbody>
    </table>            
                </form>
            </div>
        </div>
    </div>
</div>

@include('operations.modalfunctions.updatebulkunit')
