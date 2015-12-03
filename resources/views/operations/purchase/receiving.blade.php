@extends('layouts.mainreceiving')
@section('content')
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/operations">Home</a></li>
            <li><a href="/operations/items">Items</a></li>
            <li class="active"><a href="/operations/purchase">Purchase</a></li>
            <li><a href="/operations/sales">Sales</a></li>
        </ul>
    </div>
</nav>
<section class="container main_section">
    <nav id="top_navigation" class="text_nav">
        <div class="container">
            <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                <li ><a href="/operations/purchase">Request</a></li>
                <li><a href="/operations/purchase/adviser/">Adviser</a></li>
                <li ><a href="/operations/purchase/order">Order</a></li>
                <li class="active"><a href="/operations/purchase/receiving">Receiving</a></li>
                <li><a href="/operations/purchase/payables">Payables</a></li>
                <li><a href="/operations/purchase/returns">Returns</a></li>
            </ul>
        </div>
    </nav>
    <h5>This is the listing of Purchase Receipt. You can view the details by clicking on the RR No.</h5>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>RR No.</th>
                <th>RR Date</th>
                <th>Supplier</th>
                <th>Branch</th>
                <th>Remarks</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</section>
@endsection
