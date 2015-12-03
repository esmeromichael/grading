@extends('layouts.main2')

@section('content')
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/deskpad">Home</a></li>
            <li><a href="/deskpad/partners">Student</a></li>
            <li class="active"><a href="/deskpad/grade">Grade</a></li>
        </ul>
    </div>
</nav>
<section class="container main_section">
@if(Session::has('message'))
<div class="alert alert-success">
{{Session::get('message')}}
</div>
@endif

  <form class="form-horizontal" role="form" method="POST">
    <div class="form-group distance">
      <label class="control-label col-sm-2">Exam No</label>
        <div class="col-sm-2">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" readonly="" name="id" placeholder="New">
        </div>
        <label class="control-label col-sm-3">Exam Date</label>
        <div class="col-sm-2">
          <input type="date" class="form-control" name="exam_date" readonly value="<?php echo date("Y-m-d");?>">
        </div>
    </div>
    <div class="form-group distance">
      <label class="control-label col-sm-2" > Subject</label>
      <div class="col-sm-3">
        <select class="subject" name="subject_id">
         <option value=" " selected>Search</option>
        </select>
      </div>
      <label class="control-label col-sm-2" >No. of Items:</label>
      <div class="col-sm-2">
         <input type="text" name="no_of_items" class="serial form-control">
      </div>
    </div>
    <div class="form-group distance">
      <label class="control-label col-sm-2" >Sub Subject</label>
      <div class="col-sm-3">
        <select class="subsubject form-control" name="sub_subject_id">
         <option value="" selected>Search</option>
        </select>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Remarks</label>
      <div class="col-sm-8">
        <textarea id="remarks" name="remarks" class="form-control" placeholder="Remarks"></textarea>
      </div>
    </div>
    <div class="container">
      <p>Enter here the result of the exam:</p>
      <table class="table">
        <thead>
          <tr>
            <th><input type="checkbox" name="check"  class="gradeheader form-control" value="1"></th>
            <th>Name</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
        @foreach($student as $students)
          <tr>
          <td><input type="checkbox" name="check" id="check" class="gradedetail form-control" value="1"></td>
            <td>
              <label class="dis">{{ $students->name}}</label>
              <input type="hidden" class="student_info_id"  value="{{ $students->id}}">
            </td>
            <td><input type="text" class="score sq-inputtxt" value=""></td>
            <td></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="modal-footer">
      <button class="btn btn-lg btn-primary btn-sm" type="submit">Save</button>
    </div>
    </form>

<script type="text/javascript">
  $.getJSON('/dev/api/allsubjects', function(data){
    data = $.map(data, function(partner) {
    return {id: partner.id, text: partner.name };
    });
      $(".subject").select2({
          minimumInputLength: 1,
          multiple: false,
          width: 275,
          data: data
      });
    });

    $('.subject').on('change',function(e){
      var id = e.target.value;
        $.get('/dev/api/subsubject?id=' + id, function(data){
            $('.subsubject').empty();
            $.each(data, function(index, branch){
              $('.subsubject').append('<option value="'+branch.id+'">'+branch.sub_subject['name']+'</option>');
            })
            $(".subsubject").select2({
            minimumInputLength: 0,
            multiple: false,
            width: 294,
            data: data
        });
      });
    })

    $('table tbody').on('click','.gradedetail', function () {

      if($(this).is(':checked')){
        $(this).closest('tr').find('.student_info_id').attr('name','student_info_id[]');
        $(this).closest('tr').find('.score').attr('name','score[]');
      }
      else{
        $(this).closest('tr').find('.student_info_id').removeAttr('name');
        $(this).closest('tr').find('.score').removeAttr('name');
      }
    })

     $('table thead').on('click','.gradeheader', function () {
        if($(this).is(':checked')){
          $(this).closest('tr').parent().parent().find('td .gradedetail').each(function(){
            $(this).prop('checked', true);
            $(this).closest('tr').find('.student_info_id').attr('name','student_info_id[]');
            $(this).closest('tr').find('.score').attr('name','score[]');
          })
        }
        else{
            $(this).closest('tr').parent().parent().find('td .gradedetail').each(function(){
              $(this).prop('checked', false)
              $(this).closest('tr').find('.student_info_id').removeAttr('name');
              $(this).closest('tr').find('.score').removeAttr('name');
            })
        }
    })
</script>
@endsection
