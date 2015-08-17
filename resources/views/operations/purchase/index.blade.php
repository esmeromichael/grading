@extends('layouts.main3')

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
            <li class="active"><a href="/operations/purchase/">Request</a></li>
            <li><a href="/operations/purchase/advicer">Advicer</a></li>
            <li><a href="/operations/purchase/order">Order</a></li>
            <li><a href="/operations/purchase/receiving">Receiving</a></li>
            <li><a href="/operations/purchase/payables">Payables</a></li>
            <li><a href="/operations/purchase/returns">Returns</a></li>
        </ul>
    </div>
</nav>
<div class="container"> 
    <h5>This is the listing of Request. You can view the details by clicking on the Request No.</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>PR No.</th>
                    <th>PR Date</th>
                    <th>Departmen</th>
                    <th>Remarks</th>
                    <th>Requested By</th>
                    <th>Created By</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td>#<a href="/operations/purchase/request/"></a></td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td> 
                    </tr>
            
            </tbody>
        </table>
<div id="page-selection" class="pagination" style="position:fixed; bottom: 30px;right: 350px; width: 700px;"></div>
@include('operations.modalfunctions.createpurchaserequest')
@endsection