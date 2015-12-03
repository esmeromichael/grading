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
<div class="modal fade" id="myModalSubject" role="dialog">
  <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">

                <h4><b>New Subject</b></h4>
            </div>

            <div class="modal-body">
            <h6>Create New Subject Info</h6>
             <form class="form-horizontal"  name="bulkUnit" role="form"  method="POST" action="" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                        <label class="col-md-3 control-label">Subject Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Active</label>
                    <div class="col-md-5">
                        <input type="checkbox" name="status" value="Active" checked >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-sm" id="myBtn" type="submit" >Save</button>
                <button type="button" class="btn btn-lg btn-primary btn-sm" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



