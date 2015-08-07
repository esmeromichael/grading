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
                    <li class="active"><a href="/operations/items/{{ $iteminfo->item_id }}/profile">Profile</a></li>
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

        <div class="container"> 
                   <h5>[{{$iteminfo->item_id}}] - {{$iteminfo->description}}</h5> 
        </div>
 <center>
 <div>
 <form class="form-signin" name="loginform" method="POST" action="{{ action('OperationController@UpdateItems',[$iteminfo->item_id])}}" onsubmit="return update()">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <table>
                     <tr>
                            <td>
                            Item ID:
                            </td>
                            <td>
                            <div class="col-xs-5">
                            <input type="text" class="form-control" id="id" name="id" value="{{$iteminfo->item_id}}" readonly="readonly">
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>
                            Code:
                            </td>
                            <td>
                            <div class="col-xs-5">
                            <b><input type="text" class="form-control" id="code" name="code" value="{{$iteminfo->code}}"></b>
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>
                            SKU:
                            </td>

                            <td>
                            <div  class="col-xs-5">
                            <input type="text" class="form-control" id="sku" name="sku" value="{{$iteminfo->sku}}">
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>Generic:</td>
                            <td>
                            <div class="col-xs-5">
                            <input type="text" id="orig1" onchange="changeTest(this.form)" class="form-control" name="generic" value="{{$iteminfo->generic}}">
                            </div>
                            </td>
                    </tr>
                            
                    <tr><td>Brand:</td>
                            <td>
                            <div class="col-xs-5">
                            <input type="text" id="orig21" onchange="changeTest(this.form)" class="form-control" name="brand" value="{{$iteminfo->brand}}">
                            </div>
                            <div class="col-xs-2" align="right">
                            Make:
                            </div>
                            <div class="col-xs-5">
                            <input type="text" id="orig31" onchange="changeTest(this.form)" class="form-control" name="make" value="{{$iteminfo->make}}">
                            </div>
                            </td>
                    </tr>
                    <tr><td>Model:</td>
                            <td>
                            <div class="col-xs-5">
                            <input type="text" id="orig41" onchange="changeTest(this.form)" class="form-control" name="model" value="{{$iteminfo->model}}">
                            </div>
                            <div class="col-xs-2" align="right">
                            Color:
                            </div>
                            <div class="col-xs-5">
                            <input type="text" id="orig51" onchange="changeTest(this.form)" class="form-control" name="color" value="{{$iteminfo->color}}">
                            </div>
                            </td>
                    </tr>
                    <tr><td>Size/<br>Dimension:</td>
                            <td>
                            <div class="col-xs-5">
                            <input type="text" id="orig61" onchange="changeTest(this.form)" class="form-control" name="size_dim" value="{{$iteminfo->size_dim}}">
                            </div>
                            <div class="col-xs-2" align="right">
                            Gauge/<br>Thickness:
                            </div>
                            <div class="col-xs-5">
                            <input type="text" id="orig71" onchange="changeTest(this.form)" class="form-control" name="gauge_thick" value="{{$iteminfo->gauge_thick}}">
                            </div>
                            </td>
                    </tr>
                    <tr>
                            <td>
                            Description:
                            </td>
                            <td>
                            <div class="col-xs-12">
                            <input type="text" id="echo1" readonly="" class="form-control" name="description" value="{{$iteminfo->description}}">
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>
                            <h4><b>Product Category</b></h4>
                            </td>
                            <td><hr></td>
                    </tr>
                    <tr>
                            <td>
                            Category:
                            </td>
                            <td>
                            <div class="col-xs-8">
                            <select class="cat form-control" name="category">
                            <option value="{{ $itemcatsub->cid }}">{{ $itemcatsub->cname }}</option>
                                     @foreach ($catt as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                            </div>
                            </td>
                    </tr>
                    <tr>
                            <td>
                            Sub-Category:
                            </td>
                            <td>
                            <div class="col-xs-8">
                            <select class="subcat form-control" name="subcategory">
                            <option value="{{ $itemcatsub->sname }}">{{ $itemcatsub->sname }}</option>
                            </select>
                            <div id="load" data-load='{!! $categories !!}'></div>
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>
                            <h4><b>Units of Measure</b></h4>
                            </td>
                            <td><hr></td>
                    </tr>
                    <tr>
                            <td>
                            Base Unit:
                            </td>
                            <td>
                            <div class="col-xs-8">
                            <select class="form-control" name="unit">
                            @foreach($uoms as $uom)
                                 <option value="{{$uom->id}}">{{$uom->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            </td>
                    </tr>

                    <tr>
                            <td>
                            <h4><b>Inventory Details</b></h4>
                            </td>
                            <td><hr></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td>
                            <div class="col-xs-12">
                            Inventoriable&nbsp;<label class="checkbox-inline"><input type="checkbox" name="inventoriable" value="Y" <?php echo ($iteminfo->inventoriable=='Y' ? 'checked' : '');?>></label>
                            Serialized&nbsp;<label class="checkbox-inline"><input type="checkbox" name="serialized" value="Y" <?php echo ($iteminfo->serialized=='Y' ? 'checked' : '');?>></label>
                            </div>
                            <br>
                            <div class="col-xs-6">
                            Re-Order Level <input type="text" name="reoderlevel" placeholder="Re-Order Level" class="form-control">
                            </div>
                            </td>
                    </tr>

                            </table>
                            <br>

                            <button class="btn btn-lg btn-primary btn-sm" type="submit" onclick="return updateconfirm()">Update Info</button>
 </form>
 </div>
</center>

     </div>
    </div>
</div>
@include('operations.modalfunctions.createitem')
@endsection