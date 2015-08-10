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
           
        
        </nav>
 <div class="container"> 
                   <h5><b>[{{$iteminfo->item_id}}] - {{$iteminfo->description}}</b></h5> 
            </div>

   <div class="panel-heading"> <h6> Update Price Advice Info </h6></div>
    
  
   

<form class="form-signin" name="loginform" method="POST" action="">

 <table>
                   <tr>
                            <td>
                            <b>Price ID &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>
                            <div class="col-md-7">
                            <b><input type="text"  name="id" class="form-control" placeholder="Price ID"  autofocus="" readonly value="{{$itempriceinfo->id}}"></b>
                            </div>
                            </td>
                    </tr>

                    
                      <tr>
                            <td><b>Supplier &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="name" class="form-control" value="{{$priceadvice->name}}" placeholder="Supplier"  autofocus=""></b>
                            </div>
                            </td>
                             <td><b>Effective Date &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="start_date" class="form-control" value="{{$itempriceinfo->start_date}}" placeholder="Country"  autofocus=""></b>
                            </div>
                            </td>
                    </tr>

                     <tr>
                            <td><b>Branch &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="branch" class="form-control" value="" placeholder="Branch"  autofocus=""></b>
                            </div>
                            </td>
                             <td><b>Valid Until: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="end_date" class="form-control" value="{{$itempriceinfo->end_date}}" placeholder="Country"  autofocus=""></b>
                            </div>
                            </td>
                    </tr>

                     <tr>
                            <td>
                            <b>Remarks &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="remarks" class="form-control" placeholder="Remarks"  autofocus=""  value=""></b>
                            </div>
                            </td>
                    </tr>

                 
                         <tr>

                            <td><b>Quoted Price &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="q_price" class="form-control" value="{{$itempriceinfo->q_price}}" placeholder="Country"  autofocus=""></b>
                            </div>
                            </td>
                             <td><b>Discount Type &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="disc_type" class="form-control" value="{{$itempriceinfo->disc_type}}" placeholder="Discount Type"  autofocus=""></b>
                            </div>
                            </td>
                             <td><b>Discount  &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="disc" class="form-control" value="{{$itempriceinfo->disc}}" placeholder="Discount"  autofocus=""></b>
                            </div>
                            </td>
                    </tr>

                         <tr>
                            <td>
                            <b>Net Price: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>
                            <div class="col-md-12">
                            <b><input type="text"  name="remarks" class="form-control" placeholder="Price ID"  autofocus="" readonly value="{{$itempriceinfo->cost}}"></b>
                            </div>
                            </td>
                    </tr>

                



</table>
</form>




  
@endsection
