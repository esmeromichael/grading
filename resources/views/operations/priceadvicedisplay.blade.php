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
    </nav>
<div class="container"> 
    <h5><b>[{{$iteminfo->id}}] - {{$iteminfo->description}}</b></h5> 
</div>
<div class="container"><h6> Update Price Advice Info </h6>    
    <form class="form-signin" name="loginform" method="POST" action="">
        <table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <tr>
                <td>
                    <b>Price ID</b>
                </td>
                <td>
                    <div class="col-xs-3">
                        <b><input type="text"  name="id" class="form-control" placeholder="Price ID"  autofocus="" readonly value="{{$itempriceinfo->id}}"></b>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Supplier
                </td>
                <td>
                    <div class="col-xs-6">
                        <select class="form-control" name="partner_id">
                            <option value="{{ $priceadvice->partner_id }}">{{ $priceadvice->name }}</option>
                            @foreach($partnersinfo as $partnersinfo)
                            <option value="{{$partnersinfo->id}}">{{$partnersinfo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-2" align="right">
                        Effective Date
                    </div>
                    <div class="col-xs-4">
                        <input type="date"  name="start_date" class="form-control" value="{{$itempriceinfo->start_date}}" placeholder="Country"  autofocus="">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Branch
                </td>
                <td>
                    <div class="col-xs-6">
                        <select class="form-control" name="branch_id">
                            <option value="{{ $branchpartner->branchid }}">{{ $branchpartner->branchpartner }}</option>
                            @foreach($branchinfo as $branchinfo)
                            <option value="{{$branchinfo->id}}">{{$branchinfo->name}}</option>
                            @endforeach
                        </select>
                    <div id="load" data-load='{!! $categories !!}'></div>
                    </div>
                    <div class="col-xs-2" align="right">
                        Valid Until
                    </div>
                    <div class="col-xs-4">
                        <input type="date"  name="end_date" class="form-control" value="{{$itempriceinfo->end_date}}" placeholder="Country"  autofocus="">
                            <span id="confirmMessage1" class="confirmMessage1"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Remarks
                </td>
                <td>
                    <div class="col-xs-12">
                        <textarea  name="remarks" class="form-control" placeholder="Remarks"  rows="3"  >{{$itempriceinfo->remarks}}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5><br><b>UOM [{{ $uoms->name }}(Bases)]</b></h5>
                </td>
            </tr>
            <tr>
                <td>
                    Quoted Price
                </td>
                <td>
                    <div class="col-xs-3">
                        <input type="text" id="q_price2" onchange="changeTest2(this.form)" name="q_price" class="form-control" value="{{$itempriceinfo->q_price}}" placeholder="Quoted price"  autofocus="">
                    </div>
                    <div class="col-xs-2" align="right">
                        Discount Type
                    </div>
                    <div class="col-xs-3">
                        <select name="disc_type" id="disc_type2" class="form-control" onchange="changeTest2(this.form)">
                            <option value="Amount">Fixed Amount</option>
                            <option value="Percent">Percent (%)</option>
                        </select>
                    </div>
                    <div class="col-xs-1" align="right">
                        Discount
                    </div>
                    <div class="col-xs-3">
                        <input type="text" id="disc2" onchange="changeTest2(this.form)" name="disc" class="form-control" value="{{$itempriceinfo->disc}}" placeholder="Discount"  autofocus="">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Net Price
                </td>
                <td>
                    <div class="col-xs-3">
                        <input type="text"  name="cost" id="cost2" class="form-control" placeholder="Net Price"  autofocus="" readonly value="{{$itempriceinfo->cost}}">
                    </div>
                </td>
            </tr>
        </table>
        @if($itempriceinfo->status == "Void")
            <div class="modal-footer">
            </div>
        @else
            <div class="modal-footer">
                <button type="submit" class="btn btn-lg btn-primary btn-sm" onclick="return updateconfirm()">Void</button>
            </div>
        @endif
    </form>
</div>
</section>
@include('operations.modalfunctions.createitempriceadvice')
@endsection