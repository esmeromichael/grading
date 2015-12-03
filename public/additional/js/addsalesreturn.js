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

   $('.customer').on('change',function(e){
    var id = e.target.value;
    $.get('/dev/api/branch?id=' + id, function(data){
       console.log(e);
        $('#branch_id').empty();
        $.each(data, function(index, branch){
          $('#branch_id').append('<option value="'+branch.partner_id+'">'+branch.name+'</option>');
        })
    });

     $.get('/dev/api/sd?id=' + id, function(data){
        $('#rr_no').empty();
        $('#rr_no').append('<option value="">--Select One---</option>');
        $.each(data, function(index, sdhead){
          $('#rr_no').append('<option value="'+sdhead.id+'">DR-'+sdhead.id+'</option>');
        })
        $('.rr_no').removeAttr('disabled');
    });

  });

  // $('tbody.sort').on('click','.btnDelete1',function(){
  //   $(this).parent().parent().remove();
  //   grandtotal();
  //   return false;
  // });

  function grandtotal(){
    var total = 0;
    var grandtotal = 0;
      $('.l_totalamt').each(function() {
         var q = $(this).text();
         total += parseInt(q)
         grandtotal = total.toFixed(2);
          });
      $('.grandtotal').text(grandtotal);
      $('.grandtotal2').val(grandtotal);
  }

$('table tbody').on('change','.qty',function(){
  var $this = $(this);
  $this.val(parseFloat($this.val()).toFixed(2));
  var qty = $(this).val();
  var price = $(this).closest('tr').find(".netunitprice").val();
  var total = qty * price;
  var total2 = total.toFixed(2);
  $(this).closest('tr').find(".totalamt").text(total2);
  $(this).closest('tr').find(".totalamt2").val(total2);
  grandtotal();
  return false;
})


$('.rrbtn').on('click',function(e){
    var id = $('.rr_no').val();
    if(id === ""){
        return false;
    }
    else{
        $.get('/dev/api/serials?inv=true&rr_id='+id,function(data){
            var s = 'inv';
            var ser = '0';
            getdetails(data, s, ser);
        })
        $('.rr_no option:selected').remove();
        return false;
    }
})

$('.serial').on('keypress', function (event) {
         if(event.which === 13){
            var ser = $(this).val()
            var hex = ser.split(" ");
            var item_id = parseInt(hex[0],16);
            var serial = parseInt(hex[1],16);
            var partner_id = $('.customer').val();
            $('.serial').val('');
            var elems = $('table.table tbody td.itemserial').filter(function(){
              return this.innerHTML.indexOf(ser) !== -1
            });
            if (elems.length) {
                alert('Item already added!');
            }else{
                $.get('/dev/api/serials?serial='+serial+'&item_id='+item_id+'&partner_id='+partner_id, function(data){
                var s = 'serial';
                if ( data.length == 0 )
                    alert('Item Not Found');
                else
                    getdetails(data, s, ser);
                })
            }
            return false;
         }
});

function getdetails(data, s, ser){
            $.each(data, function(index, rr){
                var elems = $('table.table tbody td.itemserial').filter(function(){
                  return this.innerHTML.indexOf(rr.item_id) !== -1
                });
                // alert(elems.html())
                if (elems.length) {
                   // $('table.table tfoot').append('<tr><td>'+ser+'</td></tr>');
                    $('table.table tbody').each(function(){
                        $('table.table tbody').find('tr').each(function() {
                            if($(this).find('.itemid').val() == rr.item_id){
                                var qty = $(this).find('a.trqty').html();
                                var amount = $(this).find('.nup').val();
                                var total = (parseInt(qty)+1).toFixed(2);
                                var totalunit = (total * amount).toFixed(2);
                                $(this).find('.rqty').val(total);
                                $(this).find('a.trqty').html(total);
                                $(this).find('.l_totalamt').html(totalunit);
                                $(this).find('.totalamt').val(totalunit);
                                $(this).find('.itemserial').append('<p>'+ser+'</p>');
                                var app = $(this).find('.collection');
                                $(app).empty();
                                $(this).find('p').each(function(){
                                    $(app).append($(this).html()+',');
                                })
                            }
                        })
                    })
                }
                else{
                    //$('table.table tfoot').append('<tr><td>'+ser+'</td></tr>');
                    $('table.table tbody').append('<tr> \
                        <td class="itemserial"><p>'+ser+'</p></td> \
                        <td><input type="hidden" name="rr_id[]" value="'+rr.dr_id+'">RR-'+rr.dr_id+'</td> \
                        <td><input type="hidden" class="itemid" name="item_id[]" value="'+rr.item_id+'">'+rr.item_name+'</td> \
                        <td><input class="receive" type="hidden" name="receive[]" value="'+rr.qty+'">'+rr.qty+'</td> \
                        <td><input type="hidden" name="return[]" value="0.00">00.00</td> \
                        <td> \
                        '+ (s=="inv" ? '<input type="hidden" name="item_type[]" value="inv"><input class="rqty sq-inputtxt" type="text" name="tquantity[]" value="0.00" style="margin-left:30px; border-radius:3px; text-align:right; width:100px;" placeholder="0.00">' : '<input type="hidden" name="item_type[]" value="serial"><input type="hidden" name="tquantity[]" class="rqty" value="1"><a href="#" data-toggle="modal" data-target="#myserial" class="trqty">1.00</a>') +' \
                        </td> \
                        <td><input type="hidden" name="uom[]" value="'+rr.uom+'">'+rr.uom_name+'</td> \
                        <td><input class="unitprice" type="hidden" name="unit_price[]" value="'+rr.q_price+'">'+rr.q_price+'</td> \
                        <td><input type="hidden" name="disc[]" value="'+rr.disc+'">'+rr.disc+'</td> \
                        <td><input type="hidden" name="disc_type[]" value="'+rr.disc_type+'">'+rr.disc_type +'</td> \
                        <td><input class="nup" type="hidden" name="net_unit_price[]" value="'+rr.price+'">'+rr.price+'</td> \
                        <td> \
                        '+ (s=="inv"? '<input class="totalamt" type="hidden" name="atotal[]" value="0.00"><label class="l_totalamt">0.00</label>': '<input class="totalamt" type="hidden" name="atotal[]" value="'+rr.price+'"><label class="l_totalamt">' +rr.price) +'</label></td> \
                        <td><a href="" class="btnDelete1 fa fa-trash fa-lg"></a></td> \
                        <td><textarea class="collection" name="serials[]">'+ser+'</textarea></td> \
                        </tr>');
                }
            })
            $('table.table tbody td.itemserial').hide();
            $('table.table tbody td textarea.collection').hide();
            grandtotal();
            $('.btnDelete1').on('click',function(){
                $(this).parent().parent().remove();
                grandtotal();
                return false;
            })
            $('.rqty').on('change',function(e){

                var $this = $(this);
                $this.val(parseFloat($this.val()).toFixed(2));
                var rcv = $(this).closest('tr').find(".receive").val();
                var qty = e.target.value;
                var total = qty * $(this).closest('tr').find(".nup").val();

               if (qty > rcv){
                    $(this).closest('tr').find(".rqty").val(rcv);
                    $(this).closest('tr').find(".totalamt").val($(this).closest('tr').find(".receive").val() * $(this).closest('tr').find(".nup").val());
                    $(this).closest('tr').find(".l_totalamt").text($(this).closest('tr').find(".receive").val() * $(this).closest('tr').find(".nup").val());
                }
               else{
                   $(this).closest('tr').find(".totalamt").val(parseFloat(total).toFixed(2));
                   $(this).closest('tr').find(".l_totalamt").text(parseFloat(total).toFixed(2));
               }
                grandtotal();
            })

            $('a.trqty').on('click',function(){
                $('div.modal-body').empty();
               // $('div.modal-body').append($(this).parent().parent().find('.itemserial').html());
               $(this).parent().parent().find('.itemserial p').each(function(){
                    $('div.modal-body').append('<p><input type="checkbox" class="rmserial" value="'+$(this).html()+'">'+$(this).html()+'</p>');
               })
            })
}
//-----------------------------------
$('.rm').on('click',function(){
    $('.rmserial:checked').each(function(){
        var thisCheck = $(this).val();
        $('table.table tbody').find('td p').each(function(){
            if($(this).html() == thisCheck){
                var thisrow = $(this);
                var qty = $(this).parent().parent().find('a.trqty').html();
                var total = (parseInt(qty)-1).toFixed(2);
                var amount = $(this).parent().parent().find('.nup').val();
                var totalunit = (total * amount).toFixed(2);
                $(this).parent().parent().find('.l_totalamt').html(totalunit);
                $(this).parent().parent().find('.totalamt').val(totalunit);
                $(this).parent().parent().find('.rqty').val(total);
                $(this).parent().parent().find('a.trqty').html(total);
                $('div.modal-body').find('p').each(function(){
                    if($(this).find('.rmserial').val() == thisCheck){
                        $(this).remove();
                    }
                })
                var thisline = $(this).parent().parent();
                $($(this).parent().parent().find('.collection')).empty();
                $(this).remove();
                $(thisline).find('p').each(function(){
                    var loc = $(this).parent().parent().find('.collection');
                    $(loc).append($(this).html()+',');
                })
                grandtotal();
            }
        })
    })
})


//--