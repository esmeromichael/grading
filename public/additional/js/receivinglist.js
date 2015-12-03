$(document).ready(function(){
 
        
        $('.datainfo').show();
        $.getJSON('/dev/api/rrlist', function(results){
            result(results);
             $('.datainfo').hide();
            var items = $("table.table tbody tr");
            var numItems = items.length;
            var perPage = 10;
            items.slice(perPage).hide();
            dothings(items, numItems, perPage);
        })
});


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function result(results){
        $.each(results, function(key, value){
                $('table.table tbody').append('<tr> \
                    <td><a href="/operations/purchase/'+value.id+'/showPurchaseReceiving">RR '+value.id+'</a></td> \
                    <td>'+value.rr_date+'</td> \
                    <td>'+value.partner['name']+'</td> \
                    '+(! value.branch ? '<td></td>' : '<td>'+value.branch['name']+'</td>')+' \
                    <td>'+value.remarks+'</td> \
                    <td>'+value.total_amt+'</td> \
                    <td>'+value.status+'</td> \
                    </tr>');
            })
    }

function result2(results2){
        $.each(results2, function(key, value){
                $('table.table tbody').append('<tr> \
                    <td><a href="/operations/purchase/'+value.rrid+'/showPurchaseReceiving">RR '+value.rrid+'</a></td> \
                    <td>'+value.rrdate+'</td> \
                    <td>'+value.suppname+'</td> \
                    <td>'+value.rrbranch+'</td> \
                    <td>'+value.rrremarks+'</td> \
                    <td>'+value.rrtotal_amt+'</td> \
                    <td>'+value.rrstatus+'</td> \
                    </tr>');
            })
    }
       //for pagination
    function dothings(items, numItems, perPage){
        $(".pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            hrefTextPrefix: '#',
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide()
                .slice(showFrom, showTo).show();
            }
        });
    }


       $('.search-btn').click(function(e){

        var rrno = $('.rrno').val();
        var pono = $('.pono').val();
        var invno = $('.invno').val();
        var suppname = $('.suppname').val();
        var branchname = $('.branchname').val();
        var dtfrom = $('.dtfrom').val();
        var dtto = $('.dtto').val();

        $.getJSON('/dev/api/searchlist?id='+rrno+'&pono='+pono+'&suppname='+suppname+'&invno='+invno+'&branchname='+branchname+'&dtfrom='+dtfrom+'&dtto='+dtto, function(results2
                ){
                $('table.table tbody').empty();
                    
                    result2(results2);
                    //pagination 
                var items = $("table.table tbody tr");
                var numItems = items.length;
                var perPage = 10;
                items.slice(perPage).hide();
                dothings(items, numItems, perPage);

            });
                    
    });