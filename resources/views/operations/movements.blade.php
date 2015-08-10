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

   <h5>This is the movements tab</h5>

            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Document</th>
                                        <th>Date</th>
                                        <th>Partner</th>
                                        <th>Moved by</th>
                                        <th>Location</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>

                                   @foreach ($movements as $movements)
                                     <tr>
                                         <td>{{ $movements->type }}-{{ $movements->doc_no }}</td>
                                         <td>{{ $movements->doc_date }}</td>
                                         <td># </td>
                                         <td>#</td>
                                         <td>#</td>
                                         <td>{{ $movements->quantity }}</td>
                                         <td>{{ $movements->unit }}</td>
                                         
                                      </tr>
                                    @endforeach


                                    
                                </tbody>
            </table>
@endsection
