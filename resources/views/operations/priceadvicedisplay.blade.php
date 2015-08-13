@extends('layouts.main2')

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
                <li><a href="/operations/items/{{ $iteminfo->id }}/profile">Profile</a></li>
                <li><a href="/operations/items/{{ $iteminfo->id }}/priceadvice">Price Advice</a></li>
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
<div class="panel-heading"> <h6> Update Price Advice Info </h6></div>    
    <form class="form-signin" name="loginform" method="POST" action="">
        <table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <b> <select class="form-control" name="partner_id">
                                <option value="{{ $priceadvice->partner_id }}">{{ $priceadvice->name }}</option>
                                @foreach($partnersinfo as $partnersinfo)
                                <option value="{{$partnersinfo->id}}">{{$partnersinfo->name}}</option>
                                @endforeach
                            </select></b>
                    </div>
                </td>
                <td><b>Effective Date &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <b><input type="date"  name="start_date" class="form-control" value="{{$itempriceinfo->start_date}}" placeholder="Country"  autofocus=""></b>
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Branch &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <b> <select class="form-control" name="branch_id">
                                <option value="{{ $branchpartner->branchid }}">{{ $branchpartner->branchpartner }}</option>
                                @foreach($branchinfo as $branchinfo)
                                <option value="{{$branchinfo->id}}">{{$branchinfo->name}}</option>
                                @endforeach
                            </select></b>
                    </div>
                </td>
                <td><b>Valid Until: &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <b><input type="date"  name="end_date" class="form-control" value="{{$itempriceinfo->end_date}}" placeholder="Country"  autofocus=""></b>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Remarks &nbsp;&nbsp;&nbsp;</b>
                </td>
                <td>
                    <div class="col-md-12">
                        <b><textarea  name="remarks" class="form-control" placeholder="Remarks"  rows="3"  >{{$itempriceinfo->remarks}}</textarea></b>
                    </div>
                </td>
            </tr>      
            <tr>
                <td><b>Quoted Price &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <b><input type="text" id="q_price2" onchange="changeTest2(this.form)" name="q_price" class="form-control" value="{{$itempriceinfo->q_price}}" placeholder="Quoted price"  autofocus=""></b>
                    </div>
                </td>
                <td><b>Discount Type &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <select name="disc_type" id="disc_type2" class="form-control" onchange="changeTest2(this.form)">
                            <option value="">Select</option>
                            <option value="Amount">Fixed Amount</option>
                            <option value="Percent">Percent (%)</option>
                        </select>
                    </div>
                </td>
                <td><b>Discount  &nbsp;&nbsp;&nbsp;</b></td>
                <td>
                    <div class="col-md-12">
                        <b><input type="text" id="disc2" onchange="changeTest2(this.form)" name="disc" class="form-control" value="{{$itempriceinfo->disc}}" placeholder="Discount"  autofocus=""></b>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Net Price: &nbsp;&nbsp;&nbsp;</b>
                </td>
                <td>
                    <div class="col-md-12">
                        <b><input type="text"  name="cost" id="cost2" class="form-control" placeholder="Net Price"  autofocus="" readonly value="{{$itempriceinfo->cost}}"></b>
                    </div>
                </td>
            </tr>
        </table>
        <button class="btn btn-lg btn-primary btn-sm" type="submit" onclick="return updateconfirm()">Update Info</button>
    </form>
@include('operations.modalfunctions.createitempriceadvice')
@endsection