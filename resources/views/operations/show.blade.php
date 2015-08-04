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
    	<h5>This is the Items Tab. Click on the Item ID to view details</h5>

			<table class="table table-striped table-hover">
			        <thead>
			            <tr>
			                <th>Item ID</th>
			                <th>Description</th>
			                <th>SKU</th>
			                <th>Code</th>
			                <th>Category</th>
			                <th>Sub-Category</th>
			                <th>Qoh</th>
			                <th>Unit</th>
			                <th>Status</th>
			            </tr>
			        </thead>

			        <tbody>
			            @foreach ($itemlist as $item)
			                <tr>
			                    <td> <a href="/operations/items/{{ $item->item_id }}/profile">{{ $item->item_id }}</a></td>
			                    <td>{{ $item->description }}</td>
			                    <td>{{ $item->sku }} </td>
			                    <td>{{ $item->code }}</td>
			                    <td>{{ $item->name }}</td>
			                    <td># </td>
			                    <td> # </td>
			                    <td> # </td>
			                    <td>{{ $item->status }}</td> 

			                </tr>
			            @endforeach
			        </tbody>
			</table>


@endsection