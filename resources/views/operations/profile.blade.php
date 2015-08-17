@extends('layouts.main2')

@section('content')
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/operations">Home</a></li>
            <li class="active"><a href="/operations/items">Items</a></li>
            <li><a href="/operations/purchase">Purchase</a></li>
            <li><a href="/operations/sales">Sales</a></li>
        </ul>
    </div>
</nav>
<section class="container main_section">
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li class="active"><a href="/operations/items/{{ $iteminfo->id }}/profile">Profile</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/priceadvice">Price Advice</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/purchases">Purchases</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/suppliers">Suppliers</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/movements">Movements</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/accounting">Accounting</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/serials">Serials</a></li>
        </ul>
    </div>
</nav>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="container"> 
@if(Session::has('message'))
<div class="alert alert-success"> 
{{Session::get('message')}} 
</div>
<script type="text/javascript">
      $('#myBulkModal').modal('show');
    </script>
@endif
    <h5><b>[{{$iteminfo->id}}] - {{$iteminfo->description}}</b></h5> 
</div>
<div class="container">
    <center><form class="form-signin" name="loginform" method="POST" action="{{ action('Operations\ItemController@UpdateItems',[$iteminfo->id])}}" onsubmit="return update()">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
            <tr>
                <td>
                    Item ID
                </td>
                <td>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" id="id" name="id" value="{{$iteminfo->id}}" readonly="readonly">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    Code
                </td>
                <td>
                    <div class="col-xs-5">
                        <b><input type="text" class="form-control" id="code" name="code" value="{{$iteminfo->code}}"></b>
                    </div>
                    <div class="col-xs-2" align="right">
                        SKU
                    </div>
                    <div  class="col-xs-5">
                        <input type="text" class="form-control" id="sku" name="sku" value="{{$iteminfo->sku}}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Generic</td>
                <td>
                    <div class="col-xs-5">
                        <input type="text" id="orig1" onchange="changeTest(this.form)" class="form-control" name="generic" value="{{$iteminfo->generic}}">
                    </div>
                    <div class="col-xs-2" align="right">
                        Brand
                    </div>
                    <div class="col-xs-5">
                        <input type="text" id="orig21" onchange="changeTest(this.form)" class="form-control" name="brand" value="{{$iteminfo->brand}}">
                    </div>
                </td>
            </tr>  

            <tr>
                <td>Make</td>
                <td>
                    <div class="col-xs-5">
                        <input type="text" id="orig31" onchange="changeTest(this.form)" class="form-control" name="make" value="{{$iteminfo->make}}">
                    </div>
                    <div class="col-xs-2" align="right">
                        Model
                    </div>
                    <div class="col-xs-5">
                        <textarea id="orig41" onchange="changeTest(this.form)" name="model" class="form-control" placeholder="Model">{{$iteminfo->model}}</textarea>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Color</td>
                <td>
                    <div class="col-xs-5">
                        <input type="text" id="orig51" onchange="changeTest(this.form)" class="form-control" name="color" value="{{$iteminfo->color}}">
                    </div>
                    <div class="col-xs-2" align="right">
                        Size/<br>Dimension
                    </div>
                    <div class="col-xs-5">
                        <input type="text" id="orig61" onchange="changeTest(this.form)" class="form-control" name="size_dim" value="{{$iteminfo->size_dim}}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Gauge/<br>Thickness</td>
                <td>
                    <div class="col-xs-5">
                        <input type="text" id="orig71" onchange="changeTest(this.form)" class="form-control" name="gauge_thick" value="{{$iteminfo->gauge_thick}}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <div class="col-xs-12">
                        <input type="text" id="echo1" readonly="" class="form-control" name="description" value="{{$iteminfo->description}}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5><b>Product Category</b></h5>
                </td>
            </tr>
            <tr>
                <td>
                    Category
                </td>
                <td>
                    <div class="col-xs-8">
                        <select class="cat form-control" name="category_id">
                            <option value="{{ $iteminfo->category->id }}">{{ $iteminfo->category->name  }}</option>
                            @foreach($catt as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Sub-Category
                </td>
                <td>
                    <div class="col-xs-8">
                        <select class="subcat form-control" name="subcategory_id">
                            <option value="{{ $iteminfo->subcategory->name }}">{{ $iteminfo->subcategory->name }}</option>
                        </select>
                    <div id="load" data-load='{!! $categories !!}'></div>

                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <h5><b>Units of Measure</b></h5>
                </td>
            </tr>
            <tr>
                <td>
                    Base Unit
                </td>
                <td>
                    <div class="col-xs-8">
                        <select class="form-control" name="uom_id">
                            @foreach($uoms as $uom)
                            <option value="{{$uom->id}}">{{$uom->name}}</option>
                            @endforeach
                        </select>
                    </div>

                   
                    <div class="checkbox-inline">

                        <a class="dropdown-toggle" href="#"  data-toggle="modal" data-target="#myBulkModal"> <label class="checkbox-inline">Bulk Unit:</label> </a>
                        
                        @foreach($bulkunits as $baseunit)
                        <span display="inline">
                        <span>{{$baseunit->name}}</span>
                        @endforeach
                         
                      
                        <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myBulkPackagingModal"> <label class="checkbox-inline">Bulk Packaging Unit:</label> </a>
                        @foreach($bulkunits2 as $bulkpackaging)
                        <span class="checkbox-inline">{{$bulkpackaging->name}}</span>
                        @endforeach
                    </div>

                </td>
                
            </tr>
            <tr>
                <td>
                    <h5><b>Inventory Details</b></h5>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="col-xs-7">
                        Inventory Types 
                            <select class="form-control" name="inventory_types_id">
                                @foreach ($inventory_types as $InvTypes)
                                <option <?php if ($iteminfo->inventory_types_id == $InvTypes->id): ?> selected="selected"<?php endif; ?> value="{{$InvTypes->id}}">{{ $InvTypes->inventory_type }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-xs-5">
                            Re-Order Level <input type="text" name="reoderlevel" placeholder="0.00" class="form-control">
                    </div>
                </td>
            </tr>
        </table>
            <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-sm" type="submit" onclick="return updateconfirm()">Update Info</button>
            </div>
            
    </form></center>
</div>

@include('operations.modalfunctions.createitem')
@include('operations.modalfunctions.displaybulkunit')
@include('operations.modalfunctions.savebulkunit')
@include('operations.modalfunctions.displaybulkpackaging')

@endsection


