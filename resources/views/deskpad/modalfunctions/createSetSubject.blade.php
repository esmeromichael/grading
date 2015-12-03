<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Your Account</h4>
            </div>
            <div class="modal-body">
                <form class="form-signin" name="loginform" method="POST" action="#.php">
                    <h6 class="form-signin-heading">Change Your Username or Password</h6>
                    Username: <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus="">
                    <hr>
                    Old Password:
                    <input type="password" id="oldpassword" name="oldpassword" class="form-control" placeholder="Old Password" required>
                    New Password:
                    <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="New Password" required>
                    Confirm Password:
                    <input type="password" id="conpassword" name="conpassword" onkeyup="checkPass(); return false;" class="form-control" placeholder="Confirm Password" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
            <div class="modal-footer">
                <button class="btn btn-lg btn-primary" type="submit" name="submit">Save</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalSetSubject" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4><b>New Set Subject</b></h4>
            </div>
            <div class="modal-body">
                <h6>Create Set Sub Subject Info</h6>
                <form class="form-horizontal"  name="bulkUnit" role="form"  method="POST" action="" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >New ID</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control"  name="id" placeholder="New" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" > Subject</label>
                        <div class="col-sm-3">
                            <select class="subject2" name="subject2">
                                <option value=" " selected="">Search</option>
                            </select>
                        </div>
                    </div>
                    <fieldset class="form-horizontal">
                            <legend align="left">Select Sub-subject</legend>
                            <div class="">
                                <div>
                                    <table class="table table-striped table-hover">
                                        <thead>

                                        </thead>
                                        <tbody class="setsub">
                                            @foreach($subsubjects as $subsubject)
                                                <tr>
                                                    <td width="">
                                                       <label class="display:inline" style="margin-left:5px;"><input type="checkbox" name="check" id="check" class="cdetail form-control" value="{{$subsubject->id}}"></label>
                                                    </td>
                                                    <td>
                                                        <label style="margin-left:-350px;">{{$subsubject->name}}</label>
                                                        <input type="hidden" class="exam_type sq-inputtxt"  style="width:100px;"  value="{{$subsubject->id}}" readonly>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                  </table>
                                </div>
                          </div>
                    </fieldset>
                    <div class="details"></div>
                    <div class="modal-footer">
                    <button class="btn btn-lg btn-primary btn-sm" id="myBtn" type="submit" >Save</button>
                    <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $.getJSON('/dev/api/allsubjects', function(data){
    data = $.map(data, function(partner) {
    return {id: partner.id, text: partner.name };
    });
      $(".subject2").select2({
          minimumInputLength: 1,
          multiple: false,
          width: 275,
          data: data
      });
    });

 $('table tbody.setsub').on('click','.cdetail', function () {
        if($(this).is(':checked')){

            $(this).closest('tr').find('.exam_type').attr('name','exam_type[]');
        }
        else{
            $(this).closest('tr').find('.exam_type').removeAttr('name')
        }
    })

</script>
