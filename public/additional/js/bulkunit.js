  //============this section is for base unit modal....==========//

     $(document).ready(function(){
 
        $("#myBtn1").click(function(){
            $("#myDisplayBulkUnit").modal({backdrop: false});

        });

        $("#myBtn2").click(function(){
            $("#mySaveBulkModal").modal({backdrop: false});

        });

         $("#myBtn3").click(function(){
             $("#myUpdateBulkModal").modal({backdrop: false});

        });

         $("#myBtn4").click(function(){
             $("#myBulkPackagingModal").modal({backdrop: false});

        });
         $("#myBtn5").click(function(){
             $("#SaveBulkPackagingModal").modal({backdrop: false});

        });
         $("#myBtn6").click(function(){
             $("#updateBulkPackagingModal").modal({backdrop: false});

        });



});


$('#myUpdateBulkModal').on('show.bs.modal', function(e) {

    // get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('name');
    var unit_code = $(e.relatedTarget).data('unitcode');
    var qty =  $(e.relatedTarget).data('qty');
    var active =  $(e.relatedTarget).data('status');
    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="unit_code"]').val(unit_code);
    $(e.currentTarget).find('input[name="qty"]').val(qty);
    $(e.currentTarget).find('input[name="activeBulkUnit"]').val(active);
      if(active == "Active")
    {
        document.getElementById('activeBulkUnit').checked = true;
    } 
    else
    {
        document.getElementById('activeBulkUnit').checked = false;
    }
});


$('#updateBulkPackagingModal').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('name');
    var unit_code = $(e.relatedTarget).data('unitcode');
    var qty =  $(e.relatedTarget).data('qty');
    var active =  $(e.relatedTarget).data('status');
    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="unit_code"]').val(unit_code);
    $(e.currentTarget).find('input[name="qty"]').val(qty);
    $(e.currentTarget).find('input[name="activeBulkPackaging"]').val(active);

    if(active == "Active")
    {
        document.getElementById('activeBulkPackaging').checked = true;
    } 
    else
    {
        document.getElementById('activeBulkPackaging').checked = false;
    }
});

function trapTransactions(){
   
   var PO = document.getElementById('PurchaseOrder').value;
   var SO = document.getElementById('SalesOrder').value;
   if(PO > 0 || SO > 0)
   {
        document.getElementById("uom_id").disabled = true;
        alert('has already transactions');
        return true;
   }
   else
   {
        document.getElementById("uom_id").disabled = false;
        return true;
   }

}

/* ===================end for modal section==============================*/

// This section is for the validation of input numbers in textbox//
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

   
/*! jQuery v1.11.3 | (c) 2005, 2015 jQuery Foundation, Inc. | jquery.org/license */
