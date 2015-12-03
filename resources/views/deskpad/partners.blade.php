@extends('layouts.main3')

@section('content')
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/deskpad">Home</a></li>
            <li class="active"><a href="/deskpad/partners">Student</a></li>
            <li><a href="/deskpad/grade">Grade</a></li>
        </ul>
    </div>
</nav>
<section class="container main_section">
@if(Session::has('message'))
<div class="alert alert-success">
{{Session::get('message')}}
</div>
@endif
<h5>This is the Partners Tab. Click on the Partner ID to view details</h5>
    <div id="myTable">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>First Grading</th>
                    <th>Second Grading</th>
                    <th>Third Grading</th>
                    <th>Fourth Grading</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <div id="page-selection" class="pagination" style="position:fixed; bottom: 30px;right: 350px; width: 700px;"></div>
            </tfoot>
            <div class="loading"></div>
        </table>
    </div>
<script type="text/javascript">

    $(document).ready(function(){
        $('.datainfo').show();
        $.getJSON('/dev/api/allstudents', function(results){
            result(results);
            $('.loading').hide();
            var items = $("table.table tbody tr");
            var numItems = items.length;
            var perPage = 10;
            items.slice(perPage).hide();
            dothings(items, numItems, perPage);
        })
    });
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

    function result(results){
        $.each(results, function(key, value){
            $('table.table tbody').append('<tr> \
             <td><a href="/deskpad/studentprofile='+value.id+'"> '+value.id+'</a></td> \
             <td>'+value.name+'</td> \
             <td>'+value.age+'</td> \
             <td>'+value.sex+'</td> \
             <td>'+value.status+'</td> \
             </tr>');
        })
    }
</script>
@endsection
