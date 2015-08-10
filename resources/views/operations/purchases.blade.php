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
            <div class="container"> 
                   <h5><b>[{{$iteminfo->item_id}}] - {{$iteminfo->description}}</b></h5> 
            </div>
        
        </nav>

   <h5>This is the Price Advice Tab. Click on the Price ID to view details</h5>

            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>PO No.</th>
                                        <th>PO Date</th>
                                        <th>Supplier Name</th>
                                        <th>Remarks</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($purchases as $purchase)
                                     <tr>
                                         <td>{{ $purchase->po_no }}</td>
                                         <td>{{ $purchase->delivery_date }}</td>
                                         <td>{{ $purchase->name }} </td>
                                         <td>{{ $purchase->remarks }}</td>
                                         <td>{{ $purchase->qty }}</td>
                                         <td>{{ $purchase->unit }} </td>
                                         <td>{{ $purchase->price }} </td>
                                         <td>{{ $purchase->total_amt }} </td>
                                      </tr>
                                    @endforeach



                                    
                                </tbody>
            </table>
@endsection
