@extends('layouts.main')

@section('content')
        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/operations">Home</a></li>
                    <li><a href="/operations/items">Items</a></li>
                    <li><a href="/operations/purchase">Purchase</a></li>
                    <li><a href="/operations/sales">Sales</a></li>

                </ul>
            </div>
        </nav>

        <section class="container main_section">

        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/profile">Profile</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/priceadvice">Price Advice</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/purchases">Purchases</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/suppliers">Suppliers</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/movements">Movements</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/accounting">Accounting</a></li>
                    <li><a href="/operations/items/{{ $iteminfo->item_id }}/serials">Serials</a></li>
                </ul>
            </div>
            <!-- <div class="container"> 
                   <h5><b>[{{$iteminfo->item_id}}] - {{$iteminfo->description}}</b></h5> 
            </div> -->
        
        </nav>

   <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">[{{$iteminfo->item_id}}] - {{$iteminfo->description}}</div>
            <form class="form-horizontal" role="form" method="post" action="{{ action('OperationController@UpdateItems')}}">
            <table>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                            <label class="col-md-4 control-label">Item ID:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="id" name="id" value="{{$iteminfo->item_id}}" readonly="readonly">
                            </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Code:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="code" name="code" value="{{$iteminfo->code}}">
                            </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="sku" name="sku" value="{{$iteminfo->sku}}">
                            </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Generic</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="generic" name="generic" value="{{$iteminfo->generic}}">
                            </div>
                </div>

                    
                   
                     <div class="form-group">
                            <label class="col-md-4 control-label">Brand</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="brand" name="brand" value="{{$iteminfo->brand}}">

                    </div>

                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Make</label>
                            <div class="col-md-6">
                                <b><input type="text" class="form-control" id="make" name="make" value="{{$iteminfo->make}}"></b>
                    </div>
                </div>
                

                

                        <div class="form-group">
                            <label class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="model" name="model" value="{{$iteminfo->model}}">
                        </div>
                </div>

                          <div class="form-group">
                            <label class="col-md-4 control-label">Color</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="color" name="color" value="{{$iteminfo->color}}">
                        </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Size/Dimension</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="size_dim" name="size_dim" value="{{$iteminfo->size_dim}}">
                            </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Guage/Thickness</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="gauge_thick" name="gauge_thick" value="{{$iteminfo->gauge_thick}}">
                            </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="description" name="description" value="{{$iteminfo->description}}">
                            </div>
                </div>

                <fieldset>
                    <legend>Product Category</legend>

                            <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category">
                                <option value=""></option>
                                </select>
                             </div>

                             <div class="form-group">
                            <label class="col-md-4 control-label">Sub-Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category">
                                <option value=""></option>
                                </select>
                             </div>
                </fieldset>

                 <fieldset>
                    <legend>Units of Measure</legend>

                            <div class="form-group">
                            <label class="col-md-4 control-label">Base Unit</label>
                            <div class="col-md-6">
                                <select class="form-control" id="category" name="category" ">
                                @foreach($displayuom as $uom)
                                 <option value="{{$uom->id}}">{{$uom->name}}</option>
                                @endforeach
                                </select>

                             </div>

                             <div class="form-group">
                            <label class="col-md-4 control-label">Bulk Unit</label>
                            </div>
                             <div class="form-group">
                            <label class="col-md-4 control-label">Bulk Packaging Unit</label>
                            </div>
                            
                </fieldset>

                <fieldset>
                    <legend>Inventory Details</legend>
                     <div  class="col-md-4 control-label">
                     <tr>
                     <td>
                            <label class="checkbox-inline">Inventoriable<input type="checkbox" name="customer" value="Yes"></label>
                            <label class="checkbox-inline">Serialized <input type="checkbox" name="supplier" value="Yes"></label>
                            </td></tr>
                        </div>
                  
                  <div class="form-group">
                            <label class="col-md-4 control-label">Re-Order Level</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="gauge_thick" name="" value="" placeholder="0.00">
                            </div>
                            <label id="label" onchange="copy();"></label>
                </div>

                </fieldset>



                </table>

                 <button type="submit" class="btn btn-lg btn-primary" name="submit1">Update</button>
                 
            </form>
     </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("select.form-control").change(function(){
        var selectedBaseUnit = $(".form-control option:selected").val();
        alert("You have selected the country - " + selectedBaseUnit);
    });
});
</script>

  
@endsection