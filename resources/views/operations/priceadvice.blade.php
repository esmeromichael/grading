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
            <li><a href="/operations/items/{{ $iteminfo->id }}/profile">Profile</a></li>
            <li class="active"><a href="/operations/items/{{ $iteminfo->id }}/priceadvice">Price Advice</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/purchases">Purchases</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/suppliers">Suppliers</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/movements">Movements</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/accounting">Accounting</a></li>
            <li><a href="/operations/items/{{ $iteminfo->id }}/serials">Serials</a></li>
        </ul>
    </div>
    <div class="container"> 
        <h5><b>[{{$iteminfo->id}}] - {{$iteminfo->description}}</b></h5> 
    </div>
</nav>
<h5>This is the Price Advice Tab. Click on the Price ID to view details</h5>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Price ID</th>
                <th>Supplier</th>
                <th>Quoted Price</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>Net Price</th>
                <th>Effective Date</th>
                <th>Valid Until</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($priceadvice as $padvice)
                <tr>
                    <td> <a href="/operations/items/{{$iteminfo->id}}/priceadvicedisplay/{{$padvice->id}}">{{ $padvice->id }}</a></td>
                    <td>{{ $padvice->name }}</td>
                    <td>{{ $padvice->q_price }} </td>
                    <td>{{ $padvice->disc_type }}</td>
                    <td>{{ $padvice->disc }}</td>
                    <td>{{ $padvice->cost }} </td>
                    <td>{{ $padvice->start_date }}</td>
                    <td>{{ $padvice->end_date }}</td>
                    <td>{{ $padvice->status }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@include('operations.modalfunctions.createitempriceadvice')
@endsection
