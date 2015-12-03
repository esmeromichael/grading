 $.getJSON('/dev/api/customer', function(data){
    data = $.map(data, function(partner) {
    return {id: partner.id, text: partner.name };
    });
      $(".customer").select2({
          minimumInputLength: 1,
          multiple: false,
          width: 294,
          data: data
      });
    });

    $.getJSON('/dev/api/itemdesc', function(data){
    data = $.map(data, function(itemdesc) {
    return {id: itemdesc.id, text: itemdesc.description };
    });
     $(".itemdesc").select2({
        minimumInputLength: 1,
        multiple: false,
        width: 300,
        data: data
     });
  });

$('.customer').on('change',function(e){
    var id = e.target.value;
    $.get('/dev/api/branch?id=' + id, function(data){
        $('#branch_id').empty();
        $.each(data, function(index, branch){
          $('#branch_id').append('<option value="'+branch.partner_id+'">'+branch.name+'</option>');
        })
    });

$.get('/dev/api/contactinfo?id=' + id, function(data){
    $('.contactperson').empty();
    $.each(data, function(index, branch){
        $('.contactperson').append('<option value="'+branch.partner_id+'">'+branch.last_name+','+branch.first_name+'</option>');
    })
});
    $.get('/dev/api/customertype?id=' + id, function(data){
        $('#cust_type').val('');
        $('#term').empty();
        cterms = '';
        $.each(data, function(index, gterms){
          $('#term').append('<option value="'+gterms.term['id']+'" selected>'+gterms.term['name']+'</option>');
          cterms = gterms.term['id'];
        })
        $.get('/dev/api/allterms', function(trm){
          $.each(trm, function(index, terms){
            if(terms.id != cterms)
            $('#term').append('<option value="'+terms.id+'">'+terms.name+'</option>');
          })
        })

        $.each(data, function(index, cust_type){
          if(! cust_type.customer_type)
            $('#cust_type').val('Local');
          else
            $('#cust_type').val(cust_type.customer_types['name']);
        })
    });

$.get('/dev/api/customertype?id=' + id, function(data){
    $('#cust_type').val('');
    $('#term').empty();
    cterms = '';
    $.each(data, function(index, gterms){
      $('#term').append('<option value="'+gterms.term['id']+'" selected>'+gterms.term['name']+'</option>');
      cterms = gterms.term['id'];
    })
    $.get('/dev/api/allterms', function(trm){
      $.each(trm, function(index, terms){
        if(terms.id != cterms)
        $('#term').append('<option value="'+terms.id+'">'+terms.name+'</option>');
      })
    })
    $.each(data, function(index, cust_type){
      if(! cust_type.customer_type)
        $('#cust_type').val('Local');
      else
        $('#cust_type').val(cust_type.customer_types['name']);
    })
  });
});

// end section--------------------
//header count
var headcount = 1;
function sort(){
    $( ".content" ).sortable({
      forcePlaceholderSize: true,
      tolerance: "pointer",
      placeholder: "highlight"});
    $( ".content" ).disableSelection();
    $( ".subcontent" ).sortable({
      forcePlaceholderSize: true,
      tolerance: "pointer",
      connectWith:['.subcontent'],
      placeholder: "highlight",
      update: function(){

        var thisloc = $(this).parent().find('.total');
        var inloc = $(this).parent().find('.stotal');
        var eachloc =  $(this).parent().find('.details_total');
        subtotal(thisloc, eachloc, inloc);
        var head = $(this).parent().find('th').data("id");
        $(this).find('.id').each(function(){
          $(this).val(head);
        })

        if($(this).is(':empty')){
            $(this).parent().find('.rm-header').show();
            $(this).parent().find('.total').attr('style','display:inline-block; float:right; margin-right:18px;');
        }
        else{
            $(this).parent().find('.rm-header').hide();
            $(this).parent().find('.total').attr('style','display:inline-block; float:right; margin-right:38px;');
        }
      },
      stop: function(){
        if($(this).is(':empty')){
          $(this).parent().find('.total').text('0.00');
          $(this).parent().find('.stotal').val('0.00');
        }
      }
    });
    $( ".subcontent" ).disableSelection();
}

function edit(dad){
  dad.find('.head:first').hide();
    dad.find('.edit-input:first').show().focus();
    $('.edit-input').focusout(function() {
      var dad = $(this).parent();
      var x = $(this).parent().find('.edit-input').val();
      $(this).hide();
      dad.find('.head').text(x).show();
    });
}

$('.add-header').on('click',function(){
    var header = $(this).parent().find('#header-name').val();
    $('tbody.content').prepend('<div class="groupborder"><tr> \
      <td> \
          <table> \
            <th id="groups" data-id="'+headcount+'" style="background-color: #DCDCDC; width: 1250px;" > \
              <label style="display:inline-block;float:left; margin-left:900px; width:60px; font-weight: bold;">Sub-total: </label> \
              <label class="head" style="display: block; margin-left: -930px; float: left; font-weight: bold;">HEADER '+headcount+'</label> \
              <input type="text" name="header_name[]" class="edit-input" style="height: 20px; display: none; margin-left: -930px; float: left; padding-left:5px;" value="HEADER '+headcount+'"/> \
              <input name="header_id[]" type="hidden" value="'+headcount+'"> \
              <a href="" class="rm-header fa fa-times-circle fa-lg" style="float:right; margin-right:5px; margin-top:5px"></a> \
              <label style="display:inline-block; float:right; margin-right:18px; font-weight: bold;" class="total">0.00</label></th> \
              <input name="header_subtotal[]" class="stotal" type="hidden" value="0.00"> </th> \
            <tbody class="subcontent tbody"></tbody> \
          </table>\
      </td> </tr></div>');
    // header tweak
    var dad = $(this).parent().parent();
    edit(dad);

    $('.head').on('click', function(){
     var dad = $(this).parent().parent();
     edit(dad);
    })
    sort();
    headcount+=1;
    $('.rm-header').on('click',function(){
      a = $(this);
      headrm(a);
      return false;
    })
})


function headrm(a){
    s = a.parent().parent().parent().parent().parent().remove();
    //headcount-=1;
}
// -------this section is for fill function------------
$('.add').on('click',function() {

  var itemdesctext = $(".itemdesc option:selected").text();
  var itemdescid = $(".itemdesc option:selected").val();
  var qoh = $(".qoh").val();
  var qty =  $(".qty").val();
  var unitprice = $(".unitprice").val();
  var disc = $(".disc").val();
  var disc_typeval = $("#disc_type option:selected").val();
  var disc_typetext = $("#disc_type option:selected").text();
  var netunitprice = $(".netunitprice").val();
  var total = $(".total").val();
  var uom = $("#uom option:selected").data("value");
  var uomtype = $("#uom option:selected").data("type");
  var uomname = $("#uom option:selected").data("name");
  var std_price = $(".ref_std").val();
  var min_price = $(".ref_min").val();
  var max_price = $(".ref_max").val();
  var o_uom = $(".o_uom").val();

    if(itemdescid === ""){
      alert('Please fill item first');
      return false;
    }
    else if(qty === ""){
      alert('Please fill Qty');
      $(".qty").focus();
      return false;
    }
    else {
      $.get('/operations/purchase/newrequest/ajax-subcat?item_id=' + itemdescid, function(data){
      $('#uom').empty();
       $('#details_uom:first').append('<option data-value="'+uom+'" data-type="'+uomtype+'" data-name="'+uomname+'">'+uomname+' ('+uomtype+')</option>');
      $.each(data, function(index, uom){
        if(uomname != uom.name)
          $('#details_uom:first').append('<option data-value="'+uom.id+'" data-type="'+uom.type+'" data-name="'+uom.name+'">'+uom.name+' ('+uom.type+')</option>');
      })
    });
      if($('tbody.content').is(':empty')){
       $('tbody.content').prepend('<div class="groupborder"><tr><td> \
            <table> \
              <th id="groups" data-id="'+headcount+'" style="background-color: #DCDCDC; width: 1250px;" > \
                <label style="display:inline-block;float:left; margin-left:900px; width:60px; font-weight: bold;">Sub-total: </label> \
                <label class="head" style="display: block; margin-left: -930px; float: left; font-weight: bold;">HEADER '+headcount+'</label> \
                <input type="text" name="header_name[]" class="edit-input" style="height: 20px; display: none; margin-left: -930px; float: left; padding-left:5px;" value="HEADER '+headcount+'"/> \
                <input name="header_id[]" type="hidden" value="'+headcount+'"> \
                <a href="" class="rm-header fa fa-times-circle fa-lg" style="float:right; margin-right:5px; margin-top:5px"></a> \
                <label style="display:inline-block; float:right; margin-right:18px; font-weight: bold;" class="total">0.00</label> \
                <input name="header_subtotal[]" class="stotal" type="hidden" value="0.00"> </th> \
              <tbody class="subcontent tbody"></tbody> \
            </table>\
         </td> \
       </tr></div>');

  $('.head').on('click', function(){
      var dad = $(this).parent().parent();
      edit(dad);
  })
    // var name = $(this).parent().find('.qty').val();
    variables();
    $('tbody.subcontent:first').parent().find('.rm-header').hide();

    var id = $('tbody.subcontent:first').parent().find('th').data("id");
    $('tbody.subcontent:first').prepend('<tr style="display: inline-block" > \
        <td> \
          <input type="hidden" name="details_id[]" class="id" value="'+id+'" style="width:80px;"> \
          <input type="hidden" name="details_itemid[]" class="details_itemid" value="'+itemdescid+'" style="width:80px;"><label style="width: 294px; margin-left:5px;">'+itemdesctext+'</label> \
        </td> \
         <td> \
          <input type="hidden" name="details_qoh[]" value="'+qoh+'"> \
          <label class="details_qoh sq-inputtxt" id="" style="width:100px;  margin-left:5px;"">'+qoh+'</label> \
        </td> \
         <td> \
          <input type="text" class="details_qty sq-inputtxt" name="details_qty[]" value="'+qty+'" style="width:100px;  margin-left:13px;" onkeypress="return isNumberKey(event, this);">\
        </td> \
        <td> \
          <input type="hidden" name="o_uom_type[]" class="o_uom_type" value="'+o_uom+'"> \
          <input type="hidden" name="uom_type[]" class="uom_type"> \
          <input type="hidden" name="uom_name[]" class="uom_name"> \
          <input type="hidden" name="details_uom[]" class="uom_id"> \
          <select class="details_uom"  id="details_uom" style="background-color: #faf2cc; width:100px; height: 22px; margin-left: 14px; border-radius: 3px;"> \
          </select>\
        </td> \
        <td> \
          <input type="text" style="width:100px; margin-left: 15px;" class="details_unitprice sq-inputtxt"  id="" name="details_unitprice[]" value="'+unitprice+'" onkeypress="return isNumberKey(event, this);"> \
          <input type="hidden" style="width:100px; margin-left: 15px;" class="hidedetails_unitprice sq-inputtxt" value="'+unitprice+'"> \
        </td> \
        <td>\
          <input type="text" style="width:100px; margin-left: 14px;" class="details_disc sq-inputtxt"  id="" name="details_disc[]" value="'+disc+'" onkeypress="return isNumberKey(event, this);"> \
        </td> \
        <td> \
          <select name="details_disctype[]" class="details_disctype"  id="details_disctype" style="margin-left: 14px;"> \
            <option value="'+disc_typeval+'">'+disc_typetext+'</option> \
            '+(disc_typetext === "Fix. Amt" ? '<option value="Percent">Percent</option>' : '<option value="Amount">Fix. Amt</option>')+' \
          </select>\
        </td> \
        <td> \
          <input type="hidden" class="details_stdprice" value="'+std_price+'"> \
          <input type="hidden" class="details_minprice" value="'+min_price+'"> \
          <input type="hidden" class="details_maxprice" value="'+max_price+'"> \
          <input type="hidden" name="details_stdprice2[]" class="details_stdprice2" value="'+std_price+'"> \
          <input type="hidden" name="details_minprice2[]" class="details_minprice2" value="'+min_price+'"> \
          <input type="hidden" name="details_maxprice2[]" class="details_maxprice2" value="'+max_price+'"> \
          '+(netunitprice < min_price ? '<input type="text"  style="width:100px; margin-left: 13px; color:red;" class="details_netunitprice sq-inputtxt" title="tool" id="" name="details_netunitprice[]" value="'+netunitprice+'" readonly>' : '<input type="text"  style="width:100px; margin-left: 13px;" class="details_netunitprice sq-inputtxt" title="tool" id="" name="details_netunitprice[]" value="'+netunitprice+'" readonly>')+' \
        </td>\
        <td> \
          <input type="text"  style="width:100px; margin-left: 13px;" class="details_total sq-inputtxt"  id="" name="details_total[]" value="'+total+'" > \
        </td> \
        <td> \
          <a href="" class="btnDelete1 fa fa-trash fa-lg" style="margin-left:15px;"></a> \
          </td> \
      </tr>');
    $('.uom_type:first').val(uomtype);
      $('.uom_name:first').val(uomname);
      $('.uom_id:first').val(uom);
    headcount+=1;

  }
 else{
    variables();
    var id = $('tbody.subcontent:first').parent().find('th').data("id");
    $('tbody.subcontent:first').parent().find('.rm-header').hide();
    $('tbody.subcontent:first').parent().find('.total').attr('style','display:inline-block; float:right; margin-right:38px; font-weight: bold;');
    $('tbody.subcontent:first').prepend('<tr style="display: inline-block"> \
      <td> \
        <input type="hidden" name="details_id[]" class="id" value="'+id+'" style="width:80px;"> \
        <input type="hidden" name="details_itemid[]" class="details_itemid" value="'+itemdescid+'" style="width:80px;"><label style="width: 294px; margin-left:5px;">'+itemdesctext+'</label> \
      </td> \
      <td> \
        <input type="hidden" name="details_qoh[]" value="'+qoh+'"> \
        <label class="details_qoh sq-inputtxt" id="" style="width:100px;  margin-left:5px;"">'+qoh+'</label> \
      </td> \
      <td> \
        <input type="text" class="details_qty sq-inputtxt" name="details_qty[]" value="'+qty+'" style="width:100px;  margin-left:13px;" onkeypress="return isNumberKey(event, this);">\
      </td> \
      <td> \
        <input type="hidden" name="o_uom_type[]" class="o_uom_type" value="'+o_uom+'"> \
        <input type="hidden" name="uom_type[]" class="uom_type"> \
        <input type="hidden" name="uom_name[]" class="uom_name"> \
        <input type="hidden" name="details_uom[]" class="uom_id"> \
        <select class="details_uom"  id="details_uom" style="background-color: #faf2cc; width:100px; height: 22px; margin-left: 14px; border-radius: 3px;"> \
        </select>\
      </td> \
      <td> \
        <input type="text" style="width:100px; margin-left: 15px;" class="details_unitprice sq-inputtxt"  id="" name="details_unitprice[]" value="'+unitprice+'" onkeypress="return isNumberKey(event, this);"> \
        <input type="hidden" style="width:100px; margin-left: 15px;" class="hidedetails_unitprice sq-inputtxt" value="'+unitprice+'"> \
      </td> \
      <td> \
        <input type="text" style="width:100px; margin-left: 14px;" class="details_disc sq-inputtxt"  id="" name="details_disc[]" value="'+disc+'" onkeypress="return isNumberKey(event, this);"> \
      </td> \
      <td> \
        <select name="details_disctype[]" class="details_disctype"  id="details_disctype" style="margin-left: 14px;"> \
          <option value="'+disc_typeval+'">'+disc_typetext+'</option> \
          '+(disc_typetext === "Fix. Amt" ? '<option value="Percent">Percent</option>' : '<option value="Amount">Fix. Amt</option>')+' \
        </select>\
      </td> \
      <td> \
        <input type="hidden" class="details_stdprice" value="'+std_price+'"> \
        <input type="hidden" class="details_minprice" value="'+min_price+'"> \
        <input type="hidden" class="details_maxprice" value="'+max_price+'"> \
        <input type="hidden" name="details_stdprice2[]" class="details_stdprice2" value="'+std_price+'"> \
        <input type="hidden" name="details_minprice2[]" class="details_minprice2" value="'+min_price+'"> \
        <input type="hidden" name="details_maxprice2[]" class="details_maxprice2" value="'+max_price+'"> \
        '+(netunitprice < min_price || netunitprice > max_price ? '<input type="text"  style="width:100px; margin-left: 13px; color:red;" class="details_netunitprice sq-inputtxt" title="tool" id="" name="details_netunitprice[]" value="'+netunitprice+'" readonly>' : '<input type="text"  style="width:100px; margin-left: 13px;" class="details_netunitprice sq-inputtxt" title="tool" id="" name="details_netunitprice[]" value="'+netunitprice+'" readonly>')+' \
      </td>\
      <td> \
        <input type="text"  style="width:100px; margin-left: 13px;" class="details_total sq-inputtxt"  id="" name="details_total[]" value="'+total+'" > \
      </td> \
      <td> \
        <a href="" class="btnDelete1 fa fa-trash fa-lg" style="margin-left:15px;"></a> \
      </td> \
      </tr>');
  }
  $('.uom_type:first').val(uomtype);
  $('.uom_name:first').val(uomname);
  $('.uom_id:first').val(uom);
  sort();
  var thisloc = $('tbody.subcontent:first').parent().find('.total');
  var inloc = $('tbody.subcontent:first').parent().find('.stotal');
  var headertotal = 0;
  $('tbody.subcontent:first').find('.details_total').each(function(){
    var price = $(this).val();
    headertotal += parseFloat(price);
    $(thisloc).text((headertotal).toFixed(2));
    $(inloc).val((headertotal).toFixed(2));
  })
    grandtotal();
    $('.txtheader').val('Header 1');
    $('.itemdesc').select2("val", null);
    $(".qoh").val('0.00');
    $(".unitprice").attr("placeholder", "0.00").val("").focus().blur();
    $(".min").val('0.00');
    $(".max").val('0.00');
    $(".std").val('0.00');
    $(".netunitprice").attr("placeholder", "0.00").val("").focus().blur();
    $(".total").attr("placeholder", "0.00").val("").focus().blur();
    $('.disc').attr("placeholder", "0.00").val("").focus().blur();
    $('.uom').empty();
    $('.qty').attr("placeholder", "0.00").val("").focus().blur();

    $('.details_uom').on('change',function(){
      thisuom = $(this).parent().parent();
      type = $(thisuom).find('.uom_type').val($(this).find(':selected').data('type'));
      $(thisuom).find('.uom_name').val($(this).find(':selected').data('name'));
      uom = $(thisuom).find('.uom_id').val($(this).find(':selected').data('value'));
    })

    $('tbody.subcontent').on('click','.btnDelete1',function(){
      thisloc = $(this).parent().parent().parent().parent().find('.total');
      eachloc = $(this).parent().parent().parent();
      $(this).parent().parent().remove();

    if (eachloc.is(':empty')){
      $(thisloc).text('0.00');
    }
    else{
      var headertotal = 0.00;
      eachloc.find('.details_total').each(function(){
      var price = $(this).val();
      //alert(price);
      headertotal += parseFloat(price);
      $(thisloc).text((headertotal).toFixed(2));
      $(thisloc).val((headertotal).toFixed(2));
      });
    }
    eachloc.parent().find('.rm-header').show();
    grandtotal();
    return false;
    });
    $('.rm-header').on('click',function(){
      s = $(this);
      headrm(s);
      return false;
    })
  }
   $('.netunitprice').css('color', 'black');
   $('.netunitprice').tooltip({
    disabled:true
   })
   appendpricetooltip();
   checkPrice();
return false;
});
// ---------this section is for the details computation---------
function subtotal(thisloc, eachloc, inloc){
  var headertotal = 0;
  eachloc.each(function(){
  var price = $(this).val();
  headertotal += parseFloat(price);
  $(thisloc).text((headertotal).toFixed(2));
  $(inloc).val((headertotal).toFixed(2));
  });
}

function grandtotal(){
  var total = 0;
  var grandtotal = 0;
  var grandtotal2 = 0;

    $('.details_total').each(function() {
      var q = $(this).val();
      total += parseFloat(q)
      grandtotal = total.toFixed(2);
      grandtotal2 = total.toLocaleString(undefined, {minimumFractionDigits: 2,maximumFractionDigits: 2});
    });
    $('div.grandtotal label.grandtotal').text(grandtotal2);
    $('div.grandtotal input.grandtotal2').val(grandtotal);
   //return false;
}

$('tbody.content').on('change','.details_qty',function(){
  var $this = $(this);
  $this.val(parseFloat($this.val()).toFixed(2));
  var d_qty = $(this).closest('tr').find(".details_qty").val();
  var d_netprice  = $(this).closest('tr').find(".details_netunitprice").val();
  var total = d_qty * d_netprice;
  var totalAmt = total.toFixed(2);
  $(this).closest('tr').find(".details_total").val(totalAmt);
  grandtotal();
  var thisloc = $(this).parent().parent().parent().parent().find('.total');
  var inloc = $(this).parent().parent().parent().parent().find('.stotal');
  var eachloc =  $(this).parent().parent().parent().find('.details_total');
  subtotal(thisloc, eachloc, inloc);
})

$('tbody.content').on('change','.details_disc',function(){
    var $this = $(this);
    $this.val(parseFloat($this.val()).toFixed(2));
    var d_qty = $(this).closest('tr').find(".details_qty").val();
    var d_price =  $(this).closest('tr').find(".details_unitprice").val();
    var d_disctype = $(this).closest('tr').find("#details_disctype option:selected").val();
    var d_discount = $(this).val();

    if(d_disctype == "Amount"){
      var netprice = d_price - d_discount;
      var  totalprice = netprice.toFixed(2);
      $(this).closest('tr').find(".details_netunitprice").val(totalprice);
      var totalprice2 =  $('.details_netunitprice').val();
      var total = netprice * d_qty;
      var totalamt = total.toFixed(2);
      $(this).closest('tr').find(".details_total").val(totalamt);
      grandtotal();
    }
    else {
      var disc = d_discount / 100;
      var getdisc = d_price * disc;
      var disctotal = d_price - getdisc;
      var totalamt = disctotal.toFixed(2);
      $(this).closest('tr').find(".details_netunitprice").val(totalamt);
      var total = totalamt * d_qty;
      var totalamt = total.toFixed(2);
      $(this).closest('tr').find(".details_total").val(totalamt);
      grandtotal();
    }
      var thisloc = $(this).parent().parent().parent().parent().find('.total');
      var inloc = $(this).parent().parent().parent().parent().find('.stotal');
      var eachloc =  $(this).parent().parent().parent().find('.details_total');
      subtotal(thisloc, eachloc, inloc);

      var min = $(this).closest('tr').find(".details_minprice2").val();
      var max = $(this).closest('tr').find(".details_maxprice2").val();
      var price = $(this).closest('tr').find(".details_netunitprice").val();
      if(price < min || price > max){
       $(this).closest('tr').find(".details_netunitprice").css('color', 'red');
      }
      else{
        $(this).closest('tr').find(".details_netunitprice").css('color', 'black');
      }
      })

  $('tbody.content').on('change','.details_disctype',function(){

  var d_qty = $(this).closest('tr').find(".details_qty").val();
  var d_price =  $(this).closest('tr').find(".details_unitprice").val();
  var d_disctype = $(this).closest('tr').find("#details_disctype option:selected").val();
  var d_discount = $(this).closest('tr').find(".details_disc").val();
  if(d_disctype == "Amount"){
    var netprice = d_price - d_discount;
    var  totalprice = netprice.toFixed(2);
    $(this).closest('tr').find(".details_netunitprice").val(totalprice);
    var totalprice2 =  $('.details_netunitprice').val();
    var total = netprice * d_qty;
    var totalamt = total.toFixed(2);
    $(this).closest('tr').find(".details_total").val(totalamt);
    grandtotal();
  }
  else {
    var disc = d_discount / 100;
    var getdisc = d_price * disc;
    var disctotal = d_price - getdisc;
    var totalamt = disctotal.toFixed(2);
    $(this).closest('tr').find(".details_netunitprice").val(totalamt);
    var total = totalamt * d_qty;
    var totalamt = total.toFixed(2);
    $(this).closest('tr').find(".details_total").val(totalamt);
    grandtotal();
  }
  var thisloc = $(this).parent().parent().parent().parent().find('.total');
  var inloc = $(this).parent().parent().parent().parent().find('.stotal');
  var eachloc =  $(this).parent().parent().parent().find('.details_total');
  subtotal(thisloc, eachloc, inloc);
 })

$('tbody.content').on('change','.details_unitprice',function(){
  var $this = $(this);
  $this.val(parseFloat($this.val()).toFixed(2));
  var d_qty = $(this).closest('tr').find(".details_qty").val();
  var d_unitprice = $(this).closest('tr').find(".details_unitprice").val();
  var d_disctype = $(this).closest('tr').find("#details_disctype option:selected").val();
  var d_discount = $(this).closest('tr').find(".details_disc").val();
  if(d_disctype == "Amount"){
    var netprice = d_unitprice - d_discount;
    var  totalprice = netprice.toFixed(2);
    $(this).closest('tr').find(".details_netunitprice").val(totalprice);
    var total = netprice * d_qty;
    var totalamt = total.toFixed(2);
    $(this).closest('tr').find(".details_total").val(totalamt);
    grandtotal();
  }
  else{
    var disc = d_discount / 100;
    var getdisc = d_unitprice * disc;
    var disctotal = d_unitprice - getdisc;
    var totalamt = disctotal.toFixed(2);
    $(this).closest('tr').find(".details_netunitprice").val(totalamt);
    var total = totalamt * d_qty;
    var totalamt = total.toFixed(2);
    $(this).closest('tr').find(".details_total").val(totalamt);
    grandtotal();
  }
  var thisloc = $(this).parent().parent().parent().parent().find('.total');
  var inloc = $(this).parent().parent().parent().parent().find('.stotal');
  var eachloc =  $(this).parent().parent().parent().find('.details_total');
  subtotal(thisloc, eachloc, inloc);
  var min = $(this).closest('tr').find(".details_minprice2").val();
  var max = $(this).closest('tr').find(".details_maxprice2").val();
  var price = $(this).closest('tr').find(".details_netunitprice").val();
  if(price < min || price > max){
    $(this).closest('tr').find(".details_netunitprice").css('color', 'red');
  }
  else{
    $(this).closest('tr').find(".details_netunitprice").css('color', 'black');
  }
})

$('tbody.content').on('change','.details_uom',function(){
    var uom = $(this).closest('tr').find("#details_uom option:selected").data("value");
    var type = $(this).closest('tr').find("#details_uom option:selected").data("type");
    var unitprice = $(this).closest('tr').find(".details_unitprice").val();
    var unitprice2 = $(this).closest('tr').find(".details_unitprice");
    var totalamount = $(this).closest('tr').find(".details_total");
    var totalprice = $(this).closest('tr').find(".details_netunitprice");
    var qty = $(this).closest('tr').find(".details_qty").val();
    var disc = $(this).closest('tr').find(".details_disc").val();
    var disc_type = $(this).closest('tr').find("#details_disctype option:selected").val();
    var hideunitprice = $(this).closest('tr').find(".hidedetails_unitprice").val();
    var thisloc = $(this).parent().parent().parent().parent().find('.total');
    var inloc = $(this).parent().parent().parent().parent().find('.stotal');
    var eachloc =  $(this).parent().parent().parent().find('.details_total');
    var std_price = $(this).closest('tr').find(".details_stdprice").val();
    var min_price = $(this).closest('tr').find(".details_minprice").val();
    var max_price = $(this).closest('tr').find(".details_maxprice").val();
    var clone_stdprice = $(this).closest('tr').find(".details_stdprice2");
    var clone_minprice = $(this).closest('tr').find(".details_minprice2");
    var clone_maxprice = $(this).closest('tr').find(".details_maxprice2");
    if(type == 'base'){

       $.get('/dev/api/uom?id='+uom+'&type='+type,  function(data){
        var price = std_price * data.qty;
        var tprice = price.toFixed(2);
        unitprice2.val(tprice);

        var ref_min = min_price * data.qty;
        var ref_max = max_price * data.qty;
        var ref_min2 = ref_min.toFixed(2);
        var ref_max2 = ref_max.toFixed(2);

        clone_stdprice.empty();
        clone_minprice.empty();
        clone_maxprice.empty();
        clone_stdprice.val(tprice);
        clone_minprice.val(ref_min2);
        clone_maxprice.val(ref_max2);

          if(disc_type == "Amount"){
            var netprice = price - disc;
            var netprice2 = netprice.toFixed(2);
            totalprice.val(netprice2);
            var total = netprice *  qty;
            var total2 = total.toFixed(2);
            totalamount.val(total2);
          }
          else{
            var discount = disc / 100;
            var getdisc = price * discount;
            var totaldisc = price - getdisc;
            var totaldisc2 = totaldisc.toFixed(2);
            totalprice.val(totaldisc2);
            var total = totaldisc * qty;
            var total2 = total.toFixed(2);
            totalamount.val(total2);
          }
          grandtotal();
          subtotal(thisloc, eachloc, inloc);
      })
    }

  else if(type == 'bulk'){
    $.get('/dev/api/uom?id='+uom+'&type='+type, function(data){
      var price = (std_price * data['bulk_unit'].qty) * data.qty;
      var tprice = price.toFixed(2);
      unitprice2.val(tprice);

      var ref_min = (min_price * data['bulk_unit'].qty) * data.qty;
      var ref_max = (max_price * data['bulk_unit'].qty) * data.qty;
      var ref_min2 = ref_min.toFixed(2);
      var ref_max2 = ref_max.toFixed(2);

      clone_stdprice.empty();
      clone_minprice.empty();
      clone_maxprice.empty();
      clone_stdprice.val(tprice);
      clone_minprice.val(ref_min2);
      clone_maxprice.val(ref_max2);

        if(disc_type == "Amount"){
          var netprice = price - disc;
          var netprice2 = netprice.toFixed(2);
          totalprice.val(netprice2);
          var total = netprice *  qty;
          var total2 = total.toFixed(2);
          totalamount.val(total2);
        }
        else{
          var discount = disc / 100;
          var getdisc = price * discount;
          var totaldisc = price - getdisc;
          var totaldisc2 = totaldisc.toFixed(2);
          totalprice.val(totaldisc2);
          var total = totaldisc * qty;
          var total2 = total.toFixed(2);
          totalamount.val(total2);
        }
        grandtotal();
        subtotal(thisloc, eachloc, inloc);
      })
  }
  else{
    $(this).closest('tr').find(".details_unitprice").val(std_price);
     $(this).closest('tr').find(".details_netunitprice").val(std_price);
      if(disc_type == "Amount"){
        var netprice = std_price - disc;
        var netprice2 = netprice.toFixed(2);
        $(this).closest('tr').find(".details_netunitprice").val(netprice2);
        var total = netprice *  qty;
        var total2 = total.toFixed(2);
        $(this).closest('tr').find(".details_total").val(total2);
      }
      else{
        var discount = disc / 100;
        var getdisc = std_price * discount;
        var totaldisc = std_price - getdisc;
        var totaldisc2 = totaldisc.toFixed(2);
        $(this).closest('tr').find(".details_netunitprice").val(totaldisc2);
        var total = totaldisc * qty;
        var total2 = total.toFixed(2);
        $(this).closest('tr').find(".details_total").val(total2);
      }
      grandtotal();
      $(this).closest('tr').find(".details_stdprice2").empty();
      $(this).closest('tr').find(".details_minprice2").empty();
      $(this).closest('tr').find(".details_maxprice2").empty();
      $(this).closest('tr').find(".details_stdprice2").val(std_price);
      $(this).closest('tr').find(".details_minprice2").val(min_price);
      $(this).closest('tr').find(".details_maxprice2").val(max_price);
  }
})

// ------------end section----------
  $('.itemdesc').on('change',function(e){
    var id = e.target.value;
    $.get('/dev/api/iteminfo?id=' + id, function(data){
      $.get('/operations/purchase/newrequest/ajax-subcat?item_id=' + id, function(data){
        $('#uom').empty();
        $.each(data, function(index, uom){
        $('#uom').append('<option data-value="'+uom.id+'" data-type="'+uom.type+'" data-name="'+uom.name+'" data-qty="'+uom.qty+'">'+uom.name+' ('+uom.type+')</option>');
        })
      });
      $.each(data, function(index, item){
        $('.uom').empty();
        $('.o_uom').val(item.uom_id);
        $('.qoh').val(item.qoh['qoh']);
        i_price = item.item_cost;
        if(item.std == '0.00' && item.max == '0.00' && item.min == '0.00' ){
          var item_cost = parseFloat(item.item_cost);

            if(item.subcategory['std'] == '0.00' && item.subcategory['max'] == '0.00' && item.subcategory['min'] == '0.00'){
              var cat_std = parseFloat(item.category['std']);
              var cat_min = parseFloat(item.category['min']);
              var cat_max = parseFloat(item.category['max']);

              if(item.category['over_cost'] == "Amount"){

                var stdprice = item_cost + cat_std;
                var maxprice = item_cost + cat_max;
                var minprice = item_cost + cat_min;
                var stdprice2 = stdprice.toFixed(2);
                var maxprice2 = maxprice.toFixed(2);
                var minprice2 = minprice.toFixed(2);
                $('.unitprice').val(stdprice2);
                $('.netunitprice').val(stdprice2);
                $('.std').val(stdprice2);
                $('.max').val(maxprice2);
                $('.min').val(minprice2);
                $('.ref_std').val(stdprice2);
                $('.ref_max').val(maxprice2);
                $('.ref_min').val(minprice2);
              }
              else{

                var std_price_disc = cat_std / 100;
                var std_price = item_cost * std_price_disc;
                var total_std_price = item_cost + std_price;
                var total_std_price2 = total_std_price.toFixed(2);

                var min_price_disc = cat_min / 100;
                var min_price = item_cost * min_price_disc;
                var total_min_price = item_cost + min_price;
                var total_min_price2 = total_min_price.toFixed(2);

                var max_price_disc = cat_max / 100;
                var max_price = item_cost * max_price_disc;
                var total_max_price = item_cost + max_price;
                var total_max_price2 =total_max_price.toFixed(2);

                $('.unitprice').val(total_std_price2);
                $('.netunitprice').val(total_std_price2);
                $('.std').val(total_std_price2);
                $('.max').val(total_max_price2);
                $('.min').val(total_min_price2);
                $('.ref_std').val(total_std_price2);
                $('.ref_max').val(total_max_price2);
                $('.ref_min').val(total_min_price2);
              }
            }
            else{

              var subcat_std = parseFloat(item.subcategory['std']);
              var subcat_min = parseFloat(item.subcategory['min']);
              var subcat_max = parseFloat(item.subcategory['max']);

              if(item.category['over_cost'] == "Amount"){

                var stdprice = item_cost + subcat_std;
                var maxprice = item_cost + subcat_max;
                var minprice = item_cost + subcat_min;
                var stdprice2 = stdprice.toFixed(2);
                var maxprice2 = maxprice.toFixed(2);
                var minprice2 = minprice.toFixed(2);
                $('.unitprice').val(stdprice2);
                $('.netunitprice').val(stdprice2);
                $('.std').val(stdprice2);
                $('.max').val(maxprice2);
                $('.min').val(minprice2);
                $('.ref_std').val(stdprice2);
                $('.ref_max').val(maxprice2);
                $('.ref_min').val(minprice2);
              }
              else{
                var std_price_disc = subcat_std / 100;
                var std_price = item_cost * std_price_disc;
                var total_std_price = item_cost + std_price;
                var total_std_price2 = total_std_price.toFixed(2);

                var min_price_disc = subcat_min / 100;
                var min_price = item_cost * min_price_disc;
                var total_min_price = item_cost + min_price;
                var total_min_price2 = total_min_price.toFixed(2);

                var max_price_disc = subcat_max / 100;
                var max_price = item_cost * max_price_disc;
                var total_max_price = item_cost + max_price;
                var total_max_price2 =total_max_price.toFixed(2);

                $('.unitprice').val(total_std_price2);
                $('.netunitprice').val(total_std_price2);
                $('.std').val(total_std_price2);
                $('.max').val(total_max_price2);
                $('.min').val(total_min_price2);
                $('.ref_std').val(total_std_price2);
                $('.ref_max').val(total_max_price2);
                $('.ref_min').val(total_min_price2);
              }
            }
        }
        else{
          var item_cost = parseFloat(item.item_cost);
          var std = parseFloat(item.std);
          var min = parseFloat(item.min);
          var max = parseFloat(item.max);

          if(item.over_cost == "Amount"){
            var stdprice = item_cost + std;
            var maxprice = item_cost + max;
            var minprice = item_cost + min;
            var stdprice2 = stdprice.toFixed(2);
            var maxprice2 = maxprice.toFixed(2);
            var minprice2 = minprice.toFixed(2);
            $('.unitprice').val(stdprice2);
            $('.netunitprice').val(stdprice2);
            $('.std').val(stdprice2);
            $('.max').val(maxprice2);
            $('.min').val(minprice2);
            $('.ref_std').val(stdprice2);
            $('.ref_max').val(maxprice2);
            $('.ref_min').val(minprice2);
          }
          else{
            var std_price_disc = std / 100;
            var std_price = item_cost * std_price_disc;
            var total_std_price = item_cost + std_price;
            var total_std_price2 = total_std_price.toFixed(2);

            var min_price_disc = min / 100;
            var min_price = item_cost * min_price_disc;
            var total_min_price = item_cost + min_price;
            var total_min_price2 = total_min_price.toFixed(2);

            var max_price_disc = max / 100;
            var max_price = item_cost * max_price_disc;
            var total_max_price = item_cost + max_price;
            var total_max_price2 =total_max_price.toFixed(2);

            $('.unitprice').val(total_std_price2);
            $('.netunitprice').val(total_std_price2);
            $('.std').val(total_std_price2);
            $('.max').val(total_max_price2);
            $('.min').val(total_min_price2);
            $('.ref_std').val(total_std_price2);
            $('.ref_max').val(total_max_price2);
            $('.ref_min').val(total_min_price2);
          }
        }
        $('.total').val('0.00');
        $('.qty').focus();
      })
    });
      computeQTY();
      computeDiscount();
      computeDiscType();
      computeUnitPrice();
      computeUom();
      pricetooltip();
      $('.netunitprice').tooltip({
      disabled:false
   })
  });
// ----------------------end section
// ---------this section is for row computation--------
function computeQTY(){

$('.qty').on('change',function(e){
  var $this = $(this);
  $this.val(parseFloat($this.val()).toFixed(2));
  var price = $('.netunitprice').val();
  var qty = $(this).val();
  var total = 0;
  var totalamt = 0;
  total = qty * price;
  totalamt = total.toFixed(2);
  $('.total').val(totalamt);
})
}

function variables(){
  var area = $('table.table');
  var qty = area.find('.qty').val();
  var qoh = area.find('.qoh').val();
  var itemdesctext = area.find(".itemdesc option:selected").text();
  var itemdescid =  area.find(".itemdesc option:selected").val();
  var uomid =  area.find("#uom option:selected").val();
  var uomtext =  area.find("#uom option:selected").text();
  var unitprice =  area.find(".unitprice").val();
  var disc =  area.find(".disc").val();
  var disc_typeval =  area.find("#disc_type option:selected").val();
  var disc_typetext =  area.find("#disc_type option:selected").text();
  var netunitprice =  area.find(".netunitprice").val();
  var total =  area.find(".total").val();
}
// for button--------------------
function computeUom(){
  $('.uom').on('change', function(e){

    var uom = $("#uom option:selected").data("value");
    var type = $("#uom option:selected").data("type");
    var unitprice = $('.unitprice').val();
    var qty = $('.qty').val();
    var disc = $('.disc').val();
    var disc_type = $('.disc_type').val();
    var disc_type = $("#disc_type option:selected").val();
    var std_price = $('.std').val();
    var min_price = $('.min').val();
    var max_price = $('.max').val();

    if(type == 'base'){
      $.get('/dev/api/uom?id='+uom+'&type='+type,  function(data){
        var price = std_price * data.qty;
        var tprice = price.toFixed(2);
        $('.unitprice').val(tprice);
        var ref_min = min_price * data.qty;
        var ref_max = max_price * data.qty;
        var ref_min2 = ref_min.toFixed(2);
        var ref_max2 = ref_max.toFixed(2);
        $('.ref_std').empty();
        $('.ref_min').empty();
        $('.ref_max').empty();
        $('.ref_std').val(tprice);
        $('.ref_min').val(ref_min2);
        $('.ref_max').val(ref_max2);
        var min = $('.ref_min').val();
        var max = $('.ref_max').val();
         if(price < min || price > max){
           $('.netunitprice').css('color', 'red');
         }
         else{
           $('.netunitprice').css('color', 'black');
         }
          if(disc_type == "Amount"){
            var netprice = price - disc;
            var netprice2 = netprice.toFixed(2);
            $('.netunitprice').val(netprice2);
            var total = netprice *  qty;
            var total2 = total.toFixed(2);
            $('.total').val(total2);

          }
          else{
            var discount = disc / 100;
            var getdisc = price * discount;
            var totaldisc = price - getdisc;
            var totaldisc2 = totaldisc.toFixed(2);
            $('.netunitprice').val(totaldisc2);
            var total = totaldisc * qty;
            var total2 = total.toFixed(2);
            $('.total').val(total2);
          }
       })
    }
    else if(type == 'bulk'){
      $.get('/dev/api/uom?id='+uom+'&type='+type, function(data){
        var price = (std_price * data['bulk_unit'].qty) * data.qty;
        var tprice = price.toFixed(2);
        $('.unitprice').val(tprice);

        var ref_min = (min_price * data['bulk_unit'].qty) * data.qty;
        var ref_max = (max_price * data['bulk_unit'].qty) * data.qty;
        var ref_min2 = ref_min.toFixed(2);
        var ref_max2 = ref_max.toFixed(2);
        $('.ref_std').empty();
        $('.ref_min').empty();
        $('.ref_max').empty();
        $('.ref_std').val(tprice);
        $('.ref_min').val(ref_min2);
        $('.ref_max').val(ref_max2);

        var min = $('.ref_min').val();
        var max = $('.ref_max').val();
         if(price < min || price > max){
           $('.netunitprice').css('color', 'red');
         }
         else{
           $('.netunitprice').css('color', 'black');
         }

          if(disc_type == "Amount"){
            var netprice = price - disc;
            var netprice2 = netprice.toFixed(2);
            $('.netunitprice').val(netprice2);
            var total = netprice *  qty;
            var total2 = total.toFixed(2);
            $('.total').val(total2);
          }
          else{
            var discount = disc / 100;
            var getdisc = price * discount;
            var totaldisc = price - getdisc;
            var totaldisc2 = totaldisc.toFixed(2);
            $('.netunitprice').val(totaldisc2);
            var total = totaldisc * qty;
            var total2 = total.toFixed(2);
            $('.total').val(total2);
          }
          })
      }
    else{
      $(".unitprice").val(parseFloat(std_price).toFixed(2));
      $('.netunitprice').val(std_price);

        if(disc_type == "Amount"){
          var netprice = std_price - disc;
          var netprice2 = netprice.toFixed(2);
          $('.netunitprice').val(netprice2);
          var total = netprice *  qty;
          var total2 = total.toFixed(2);
          $('.total').val(total2);
        }
        else{
          var discount = disc / 100;
          var getdisc = std_price * discount;
          var totaldisc = std_price - getdisc;
          var totaldisc2 = totaldisc.toFixed(2);
          $('.netunitprice').val(totaldisc2);
          var total = totaldisc * qty;
          var total2 = total.toFixed(2);
          $('.total').val(total2);
        }
        $('.ref_std').empty();
        $('.ref_min').empty();
        $('.ref_max').empty();
        $('.ref_std').val(std_price);
        $('.ref_min').val(min_price);
        $('.ref_max').val(max_price);
        var min = $('.ref_min').val();
        var max = $('.ref_max').val();
        var price = $('.netunitprice').val();
         if(price < min || price > max){
           $('.netunitprice').css('color', 'red');
         }
         else{
           $('.netunitprice').css('color', 'black');
         }
      }
  })
}

function computeUnitPrice(){
  $('.unitprice').on('change',function(e){
    var $this = $(this);
    $this.val(parseFloat($this.val()).toFixed(2));
    var qty = $('.qty').val();
    var discount = $('.disc').val();
    var disc_type = $("#disc_type option:selected").val();
    var price = $(this).val();
      if(disc_type == "Amount"){
        var netprice = price - discount;
        var  totalprice = netprice.toFixed(2);
        $('.netunitprice').val(totalprice);
        var totalprice2 =  $('.netunitprice').val();
        var total = netprice * qty;
        var totalamt = total.toFixed(2);
        $('.total').val(totalamt);
      }
      else {
        var disc = discount / 100;
        var getdisc = price * disc;
        var disctotal = price - getdisc;
        totalamt = disctotal.toFixed(2);
        $('.netunitprice').val(totalamt);
        var total = totalamt * qty;
        var totalamt = total.toFixed(2);
        $('.total').val(totalamt);
      }
      var min = $('.ref_min').val();
      var max = $('.ref_max').val();
      var price2 = $('.netunitprice').val();
      if(price2 < min || price2 > max){
        $('.netunitprice').css('color', 'red');
      }
      else{
        $('.netunitprice').css('color', 'black');
      }
  })
}

  function computeDiscount(){
    $('.disc').on('change',function(e){
    var $this = $(this);
    $this.val(parseFloat($this.val()).toFixed(2));
    var qty = $('.qty').val();
    var price = $('.unitprice').val();
    var disc_type = $("#disc_type option:selected").val();
    var discount = $(this).val();
      if(disc_type == "Amount"){
        var netprice = price - discount;
        var  totalprice = netprice.toFixed(2);
        $('.netunitprice').val(totalprice);
        var totalprice2 =  $('.netunitprice').val();
        var total = netprice * qty;
        var totalamt = total.toFixed(2);
        $('.total').val(totalamt);
      }
      else {
        var disc = discount / 100;
        var getdisc = price * disc;
        var disctotal = price - getdisc;
        totalamt = disctotal.toFixed(2);
        $('.netunitprice').val(totalamt);
        var total = totalamt * qty;
        var totalamt = total.toFixed(2);
        $('.total').val(totalamt);
      }
      var min = $('.ref_min').val();
      var max = $('.ref_max').val();
      var netprice = $('.netunitprice').val();
      if(netprice < min){
        $('.netunitprice').css('color', 'red');
      }
      else{
        $('.netunitprice').css('color', 'black');
      }
    })
  }

function computeDiscType(){
  $('.disc_type').on('change',function(e){

    var qty = $('.qty').val();
    var price = $('.unitprice').val();
    var disc_type = $("#disc_type option:selected").val();
    var discount = $('.disc').val();
    if(disc_type == "Amount"){
      var netprice = price - discount;
      var  totalprice = netprice.toFixed(2);
      $('.netunitprice').val(totalprice);
      var totalprice2 =  $('.netunitprice').val();
      var total = netprice * qty;
      var totalamt = total.toFixed(2);
      $('.total').val(totalamt);
    }
    else {
      var disc = discount / 100;
      var getdisc = price * disc;
      var disctotal = price - getdisc;
      totalamt = disctotal.toFixed(2);
      $('.netunitprice').val(totalamt);
      var total = totalamt * qty;
      var totalamt = total.toFixed(2);
      $('.total').val(totalamt);
    }
  })
}

function isNumberKey(evt, element){
  var charCode = (evt.which) ? evt.which : event.keyCode

    if ((charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
      (charCode < 48 || charCode > 57))
      return false;
    return true;
}

$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
$(function() {
  $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
});

$('.add-terms').on('click', function(){
  $.get('/dev/api/termconditions', function(data){
    $('.showterms').empty();
    $.each(data, function(index, terms){
      $('.showterms').append('<tr class=""> \
        <td><div class=""><input type="checkbox" name="detailscheck" class="detailscheck" id="details" value="'+terms.id+'" ></div></td> \
        <td><label style="margin-left:7px;">'+terms.terms+'</label></td> \
        <td><input type="hidden" class="sort" value="'+terms.sort+'"></td> \
        </tr>');
      $('.add-terms').hide();
      $('.hide-terms').show();
  })
$(".detailscheck").click(function(){
  $('div.finalterms').empty();
  $('div.showterms tr').filter(':has(:checkbox:checked)').each(function() {
    var  terms = $(this).closest('tr').find(".detailscheck").val();
    var  sort = $(this).closest('tr').find(".sort").val();
    $('div.finalterms').append('<tr><td><input type="hidden" name="termcon[]" value="'+terms+'"></td> \
                                <td><input type="hidden" name="termsort[]" value="'+sort+'"></td></tr>');
  });
 });
});
})

$('.hide-terms').on('click', function(){
  $(".showterms input:checkbox:not(:checked)").parent().parent().parent().hide();
  $('.hide-terms').hide();
  $('.add-terms2').show();
})

$('.add-terms2').on('click', function(){
  $(".showterms input:checkbox:not(:checked)").parent().parent().parent().show();
  $('.detailscheck').show();
  $('.hide-terms').show();
  $(this).hide();
})

$(document).ready(function(){
  $('.hide-terms').hide();
  $('.add-terms2').hide();
})

function pricetooltip(){
  $('.netunitprice').tooltip({
    content: function(wowee){
      min = $(this).parent().find('.ref_min').val();
      std = $(this).parent().find('.ref_std').val();
      max = $(this).parent().find('.ref_max').val();
      data = "Min: " +min+ "<br>Std: " +std+ "<br>Max: "+max;
        wowee(data);
      }
    })
}

function appendpricetooltip(){
   $('.details_netunitprice').tooltip({
  content: function(wowee){
    std = $(this).parent().find('.details_stdprice2').val();
    min = $(this).parent().find('.details_minprice2').val();
    max = $(this).parent().find('.details_maxprice2').val();
    data = "Min: " +min+ "<br>Std: " +std+ "<br>Max: "+max;
    wowee(data);
  }
})
}

function checkPrice(){
  var min = $(this).closest('tr').find(".details_minprice2").val();
  var max = $(this).closest('tr').find(".details_maxprice2").val();
  var price = $(this).closest('tr').find(".details_netunitprice").val();
  if(price < min || price > max){
    $(this).closest('tr').find(".details_netunitprice").css('color', 'red');
  }
  else{
    $(this).closest('tr').find(".details_netunitprice").css('color', 'black');
  }
}






