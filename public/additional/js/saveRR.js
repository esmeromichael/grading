$('#myBtn').on('click', function(){
  var x = $('.table tr').filter(':has(:checkbox:checked)').length;
 if (x < 1){
  alert('Please select item(s)');
  return false;
}
});

$(".rrsupplier").select2({
    minimumInputLength : 1,
    allowClear: true,
    width: 294,
    ajax : {
        url : "/dev/api/supplierRR",
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

 $('.rrsupplier').on('change',function(e){
        var id = e.target.value;
        $.get('/dev/api/branch?id=' + id, function(data){
           console.log(e);
            $('#branch_id').empty();
            $.each(data, function(index, branch){
                $('#branch_id').append('<option value="'+branch.partner_id+'">'+branch.name+'</option>');
            })
        });

    $.get('/dev/api/getPOHeader?id=' + id, function(data){
      console.log(e);
        $('table.table tbody').empty();
    $.each(data, function(index, getPOHeader){
      $.get('/dev/api/getPODetails?id=' + getPOHeader.id , function(data1){
       $('.table tbody').append('<tr><td><label ><strong>PO #'+getPOHeader.id+'</strong></label></td></tr>');
         $.each(data1, function(index, getPODetails){
            var total = (getPODetails.ordered - getPODetails.rec_qty) * getPODetails.netunitprice;
            var total2 = total.toFixed(2);
            var rec = getPODetails.ordered - getPODetails.rec_qty;
            var rec2 = rec.toFixed(2);
            $('.table tbody').append('<tr> \
                <td><div class="grpCheck"><input type="checkbox" name="detailscheck" class="detailscheck" id="details" value="no" ></div></td> \
                <td><input type="hidden" class="pono" id="po_no" name="header_pono" value="'+getPODetails.po_no+'"> \
                <input type="hidden" class="poid" id="po_id" value="'+getPODetails.poid+'"> \
                <input type="hidden" id="item_id" class="item_id" value="'+getPODetails.itemid+'"> \
                <input type="hidden" id="invtype" class="invtype" name="invtype[]" value="'+getPODetails.inventorytype+'"><label>'+getPODetails.itemdesc+'</label></td> \
                <td><input type="hidden" class="ordered" id="ordered" value="'+getPODetails.ordered+'"><label style="text-align: right; padding-right:5px;">'+getPODetails.ordered+'</label></td> \
                <td><input type="hidden" class="receive" id="receive" value="'+getPODetails.rec_qty+'"><label style="text-align: right; padding-right:5px;">'+getPODetails.rec_qty+'</label></td> \
                <td><input type="hidden" class="qty" value="'+rec2+'"><input type="text" class="receipt" id="receipt" value="0.00" onkeypress="return isNumberKey(event);" style="text-align: right; padding-right:5px; border: solid 1px #D3D3D3; border-radius:3px; width:100px;" ></td> \
                <td><input type="hidden" class="uomid" id="uomid"  value="'+getPODetails.uomid+'"><input type="hidden" class="uomtype" id="uomtype"  value="'+getPODetails.uomtype+'"> \
                <input type="hidden" class="uomname" id="uomname"  value="'+getPODetails.uomname+'"><label>'+getPODetails.uomname+'</label></td> \
                <td><input type="hidden" class="unitprice" id="unitprice" value="'+getPODetails.price+'"><label style="text-align: right; padding-right:5px;">'+getPODetails.price+'</label></td> \
                <td><input type="hidden" class="disc" id="disc" value="'+getPODetails.disc+'"><label style="text-align: right; padding-right:5px;">'+getPODetails.disc+'</label></td> \
                <td><input type="hidden" class="disctype" id="disctype" value="'+getPODetails.disc_type+'"> <label>'+getPODetails.disc_type+'</label></td> \
                <td><div style=" width:60px; margin-left:10px;"><input type="hidden" class="netunitprice" id="netunitprice" value="'+getPODetails.unitprice+'"><label style="text-align: right; padding-right:5px;">'+getPODetails.unitprice+'</label></div></td> \
                <td><div style="width:80px; margin-left:10px;"><input type="hidden" class="txttotal" id="txttotal" value="'+total2+'"><label class="nettotal" value="" style="text-align: right; padding-right:5px;">0.00</label></div></td> \
                </tr>');})
        // This section is for the checkbox checking
         $('.headcheck').each(function() {
          $('headcheck').empty();
          $('.headcheck').click(function() {
          $('.detailscheck').closest('tr').find(' input:checkbox.detailscheck').prop('checked', this.checked);
                });
          });
          // End section
        });
       })
    })
        $('.table tbody').on('change','.receipt',function(){
            var $this = $(this);
            $this.val(parseFloat($this.val()).toFixed(2));
            var ord = $(this).closest('tr').find(".ordered").val();
            var rc = $(this).closest('tr').find(".receive").val();
            var receipt = $(this).val();
            var netprice = $(this).closest('tr').find(".netunitprice").val();
            var total = $(this).closest('tr').find(".total").val();
            var receipt = $(this).closest('tr').find(".receipt").val();
            var totalamt;
            var ordrec = ord - rc;

            if (receipt > ordrec){
                     $(this).closest('tr').find(".receipt").val(ordrec);
                }
            else{
                  total = receipt * netprice;
                  totalamt = total.toFixed(2);
                  $(this).closest('tr').find(".nettotal").text(totalamt);
                  $(this).closest('tr').find(".txttotal").val(totalamt);
        $('div.finaldata').empty();
        dothings();
        grandtotal();
               }
              })

   $('.table tbody').on('change','.detailscheck', function(){

      var ordered = $(this).closest('tr').find(".ordered").val();
      var receive = $(this).closest('tr').find(".receive").val();
      var receive2 = ordered - receive;
      var totalreceive = receive2.toFixed(2) ;
      var qty = $(this).closest('tr').find(".qty").val();
      var netprice = $(this).closest('tr').find(".netunitprice").val();
      var total = qty * netprice;
      var nettotal = total.toFixed(2);

      if($(this).prop("checked") == false){

        $(this).closest('tr').find(".receipt").val('0.00');
        $(this).closest('tr').find(".nettotal").text('0.00');
        $(this).closest('tr').find(".txttotal").val('0.00');
      }
      else {
        $(this).closest('tr').find(".receipt").val(totalreceive);
        $(this).closest('tr').find(".nettotal").text(nettotal);
        $(this).closest('tr').find(".txttotal").val(nettotal);
      }
      $('div.finaldata').empty();
      dothings();
      grandtotal();
        })
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function dothings(){
  $('.table tr').filter(':has(:checkbox:checked)').each(function() {

      var poid = $(this).closest('tr').find(".poid").val();
      var po_no = $(this).closest('tr').find(".pono").val();
      var itemid = $(this).closest('tr').find(".item_id").val();
      var invtype = $(this).closest('tr').find(".invtype").val();
      var ordered = $(this).closest('tr').find(".ordered").val();
      var receive = $(this).closest('tr').find(".receive").val();
      var receipt = $(this).closest('tr').find(".receipt").val();
      var uomid = $(this).closest('tr').find(".uomid").val();
      var uomtype = $(this).closest('tr').find(".uomtype").val();
      var uomname = $(this).closest('tr').find(".uomname").val();
      var unitprice = $(this).closest('tr').find(".unitprice").val();
      var disc = $(this).closest('tr').find(".disc").val();
      var disctype = $(this).closest('tr').find(".disctype").val();
      var netunitprice = $(this).closest('tr').find(".netunitprice").val();
      var total = $(this).closest('tr').find(".txttotal").val();
      var uomtype = $(this).closest('tr').find(".uomtype").val();


  $('div.finaldata').append('<tr> \
    <td><input type="hidden" style="width:80px;" class="details_poid" id="details_po_id" name="po_id[]" value="'+poid+'"> \
    <td><input type="hidden" style="width:80px;" class="details_pono" id="details_po_no" name="po_no[]" value="'+po_no+'"> \
    <input type="hidden" style="width:80px;" id="details_item_id" class="details_item_id" name="item_id[]" value="'+itemid+'"> \
    <input type="hidden" style="width:80px;" id="details_invtype" class="details_invtype" name="invtype[]" value="'+invtype+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_ordered" id="details_ordered" name="ordered" value="'+ordered+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_receive"  id="details_receive" name="receive" value="'+receive+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_receipt"  id="details_receipt" name="receipt[]" value="'+receipt+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_uomid" id="details_uomid" name="uomid[]" value="'+uomid+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_uomtype" id="details_uomtype" name="uomtype[]" value="'+uomtype+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_uomname" id="details_uomname" name="uomname[]" value="'+uomname+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_unitprice" id="details_unitprice" name="unitprice[]" value="'+unitprice+'"></td> \
    <td><input type="hidden" style="width:80px;" class="details_disc" id="details_disc" name="disc_amt[]" value="'+disc+'"></td> \
    <td><input type="hidden" style="width:80px;" class="disctype" id="disctype" name="disc_type[]" value="'+disctype+'"></td> \
    <td><input type="hidden" style="width:80px;" class="netunitprice" id="netunitprice" name="price[]" value="'+netunitprice+'"></td> \
    <td><div style="width:80px; margin-left:10px;"><input type="hidden"  class="details_txttotal" id="details_txttotal" name="total_amt[]" value="'+total+'"></div></td> \
    </tr>');
    });
}

function grandtotal(){
  var total = 0;
  var grandtotal = 0;
    $('.details_txttotal').each(function() {
       var q = $(this).val();
       total += parseInt(q)
       grandtotal = total.toFixed(2);
        });
    $('div.POamount input.uniquantity2').val(grandtotal);
    $('div.grandtotal label.grndttl').text(grandtotal);
}



