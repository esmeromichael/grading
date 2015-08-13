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
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>[{{ $iteminfo->id }}] - {{ $iteminfo->description }}</b></h4>
            </div>         
                    <div class="modal-body">
                        <h6>Create New Price Advice</h6>
                        <form class="form-signin" name="createcontactform" method="POST" action="" onsubmit="return create()">
                            <table>
                                <tr>
                                    <td><b>Price ID</b></td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="text" class="form-control" readonly="" placeholder="New" autofocus="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Supplier</b>
                                    </td>
                                    <td>
                                        <div class="col-xs-6">
                                            <select class="cat form-control" name="partner_id">
                                                <option>--Supplier--</option>
                                                @foreach ($catt as $category)
                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-2" align="right">
                                            <b>Effective Date</b>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="date" class="form-control" id="start_date" name="start_date" autofocus="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Branch</b>
                                    </td>
                                    <td>
                                        <div class="col-xs-6">
                                            <select class="subcat form-control" name="branch_id">
                                                <option>--Branch--</option>
                                            </select>
                                        <div id="load" data-load='{!! $categories !!}'></div>
                                        </div>
                                        <div class="col-xs-2" align="right">
                                            <b>Valid Until</b>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="date" class="form-control" id="end_date" onchange ="checkDate(); return false;" name="end_date" autofocus="">
                                            <span id="confirmMessage1" class="confirmMessage1"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Remarks</b>
                                    </td>
                                    <td>
                                        <div class="col-xs-12">
                                            <textarea class="form-control" rows="3" name="remarks" placeholder="Remarks"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5><b><br>UOM [{{ $uoms->name }}(Bases)]</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b><br><br>Quoted Price</b>
                                    </td>
                                    <td>
                                    <hr>
                                        <div class="col-xs-3">
                                            <input type="text" id="q_price" onchange="changeTest1(this.form)" name="q_price" class="form-control" placeholder=" 0.0000" autofocus="">
                                        </div>
                                        <div class="col-xs-2" align="right">
                                            <b>Discount Type</b>
                                        </div>
                                        <div class="col-xs-3">
                                            <select class="form-control" name="disc_type" id="disc_type" onchange="changeTest1(this.form)">
                                                <option value="Amount">Fixed Amount</option>
                                                <option value="Percent">Percent (%)</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-1" align="right">
                                            <b>Discount</b>
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="text" id="disc" onchange="changeTest1(this.form)" class="form-control" name="disc" autofocus="" placeholder=" 0.0000">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Net Price</b>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="text" id="cost" readonly="" name="cost" class="form-control" placeholder=" 0.0000" autofocus="">
                                        </div>
                                    </td>
                                </tr>
                        
                            </table>
                            <br>
                    
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-primary" name="submit1">Save</button>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog modal-sm"> -->

  <!-- Modal content-->
  <!-- <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><b>Search Partners</b></h4>
    </div>

    <div class="modal-body">
    <center>
    <form class="form-signin" id="searchform" name="searchform" method="POST" action="##/deskpad/partners/search">
        <table>
            <tr>
                <td>Partner ID</td>
                <td>
                <input type="text" name="searchpartnerid" class="form-control" placeholder="Partner ID"  autofocus="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </td>
            </tr>
            <tr>
                <td>Partner Name</td>
                <td>
                <input type="text" name="searchpartnername" class="form-control" placeholder="Partner Name" >
                </td>
            </tr>
            <tr>
                <td>Type</td><td>
                        <select class="form-control" name="searchtype">
                        <option value="">---Select One---</option>
                        <option value="Yes">Customer</option>
                        <option value="Yes" >Supplier</option>
                        <option value="Yes">Employee</option>
                        </select>
                        </td>
            </tr>
            <tr>
                        <td>Status</td><td>
                        <select class="form-control" name="searchstatus">
                        <option value="">---Select One---</option>
                        <option value="Active">Active</option>
                        <option value="Archived" >Archived</option>
                        </select>
                        </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn btn-lg btn-primary" type="submit">Search</button>
    </div>
    </form>
    </center>
  </div>
  
</div>
</div> -->
<!--/Modal -->

<!--functions-->
<script language="javascript">
function checkPass()
{
//Store the password field objects into variables ...
var newpassword = document.getElementById('newpassword');
var conpassword = document.getElementById('conpassword');
//Store the Confimation Message Object ...
var message = document.getElementById('confirmMessage');
//Set the colors we will be using ...
var goodColor = "#66cc66";
var badColor = "#ff6666";
//Compare the values in the password field 
//and the confirmation field
if(newpassword.value == conpassword.value){
    //The passwords match. 
    //Set the color to the good color and inform
    //the user that they have entered the correct password 
    conpassword.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Passwords Match!"
}else{
    //The passwords do not match.
    //Set the color to the bad color and
    //notify the user.
    conpassword.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "Passwords Do Not Match!"
}
}  


 function checkDate()
{
//Store the password field objects into variables ...
var start_date = document.getElementById('start_date');
var end_date = document.getElementById('end_date');
//Store the Confimation Message Object ...
var message = document.getElementById('confirmMessage1');
//Set the colors we will be using ...
var goodColor = "#66cc66";
var badColor = "#ff6666";
//Compare the values in the password field 
//and the confirmation field
if(start_date.value < end_date.value){
    //The passwords match. 
    //Set the color to the good color and inform
    //the user that they have entered the correct password 
    end_date.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Date Valid!!"
}else{
    //The passwords do not match.
    //Set the color to the bad color and
    //notify the user.
    end_date.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "Date Invalid!!"
}
}  
</script>

<script language="JavaScript">
$(document).ready(function() {
$('#myTable').dataTable();
} );
</script>

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>


<script>
function create()
{
    alert('One Price Advice Created.');
    return true;
}
</script>

<!--Date-->
<script language="javascript">
var today = new Date();
document.getElementById('date').innerHTML=today.toDateString();
</script>
</div>