@extends('layouts.mainreceiving')
@section('content')
<html>
<head>
  <meta charset="utf-8">
  <script src="{{ asset('/additional/js/jquery-1.11.3.min.js') }}"></script>
  <link href="{{ asset('/additional/css/select2.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('/additional/js/select2.min.js') }}"></script>

</head>
<body>


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
                <li><a href="/operations/purchase">Request</a></li>
                <li><a href="/operations/purchase/adviser/">Adviser</a></li>
                <li ><a href="/operations/purchase/order">Order</a></li>
                <li class="active"><a href="/operations/purchase/receiving">Receiving</a></li>
                <li><a href="/operations/purchase/payables">Payables</a></li>
                <li><a href="/operations/purchase/returns">Returns</a></li>
            </ul>
        </div>
    </nav>
 <h5>Create New Receving Receipt.</h5>
</section>

<div class="row">
 <form class="form-horizontal" role="form" name="createRR" method="POST" action="" >
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-sm-2" for="rrno">RR No:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="" name="" placeholder="New">
      </div>
       <label class="control-label col-sm-4" for="">RR Date:</label>
      <div class="col-sm-2">
        <input type="date" class="form-control" id="" name="" >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="rrno">Supplier:</label>
      <div class="col-sm-4">
      <select class="supllier" id="supplier" style="width: 300px;">
          <option value="" selected="selected">Search ...</option>
        </select>
      </div>
       <label class="control-label col-sm-2" for="">Document No:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="" name="" >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="rrno">Branch:</label>
      <div class="col-sm-4">
       <select class="branch control-label col-sm-2" style="width: 300px;" name="branch" id="branch">
        </select>
      </div>
       <label class="control-label col-sm-2" for="">Document Date:</label>
      <div class="col-sm-2">
        <input type="date" class="form-control" id="" name="" >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="rrno">Remarks:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="" name="" placeholder="Remarks">
      </div>
       <label class="control-label col-sm-2" for="">Tax Type:</label>
      <div class="col-sm-2">
        
        <select class="form-control" name="">
            <option value="">--Select One--</option>
             <option>VAT</option>
              <option>Non_VAT</option>
               <option>Zero_Rated</option>
                <option>None</option>
        </select>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="rrno">Notes:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="" name="" placeholder="Notes">
      </div> 
     </div>

    <div class="modal-footer">
        <button class="btn btn-lg btn-primary btn-sm" id="myBtn" type="submit" >Save</button>
    </div>
    
  
 </form>

</div>


<script type="text/javascript">
$(".supllier").select2({
    minimumInputLength : 1,
    allowClear: true,
    ajax : {
        url : "/dev/api/supplier",
        dataType : 'json',
        data : function (params) {
            return {
                name: params.term
            };
        },
        processResults: function (data) {
            return {
                results: data.supplier
            };
        },
   cache: true
  },
escapeMarkup: function (markup) { return markup; }, 
  templateResult: function(repo) { 
    return repo.name;
  },
  templateSelection: function(repo) { 
    return repo.name;
  }
});


 $('#supplier').on('change',function(e){
        var id = e.target.value;
        $.get('/dev/api/branch?id=' + id, function(data){
           console.log(e);
            $('#branch').empty();
            $.each(data, function(index, branch){
                $('#branch').append('<option value"'+branch.partner_id+'">'+branch.name+'</option>');
            })
        });
    });


</script>

</body>
</html>
@endsection

