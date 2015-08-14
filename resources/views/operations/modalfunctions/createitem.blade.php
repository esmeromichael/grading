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
<div class="modal" id="myModal1" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><b>Create New Item</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-signin" name="createcontactform" method="POST" action="{{action('Operations\ItemController@displayItems')}}" onsubmit="return create()">
                    <table>
                        <tr>
                            <td><b>Item ID</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" placeholder="New" autofocus="" readonly="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <b>Code</b>
                            </td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" name="code" class="form-control" autofocus="" placeholder="Code">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>SKU</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" class="form-control" name="sku" placeholder="SKU" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Generic</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" id="orig1" onchange="changeTest(this.form)" class="form-control" name="generic" placeholder="Generic" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Brand</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" id="orig21" onchange="changeTest(this.form)" name="brand" class="form-control" placeholder="Brand" autofocus="">
                                </div>
                                <div class="col-xs-2" align="right">
                                    <b>Make</b>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" id="orig31" onchange="changeTest(this.form)" name="make" class="form-control" placeholder="Make" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Model</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" id="orig41" onchange="changeTest(this.form)" name="model" class="form-control" placeholder="Model" autofocus="">
                                </div>
                                <div class="col-xs-2" align="right">
                                    <b>Color</b>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" id="orig51" onchange="changeTest(this.form)" name="color" class="form-control" placeholder="Color" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Size/<br>Dimension</b></td>
                            <td>
                                <div class="col-xs-5">
                                    <input type="text" id="orig61" onchange="changeTest(this.form)" name="size_dimension" class="form-control" placeholder="Size/Dimension" autofocus="">
                                </div>
                                <div class="col-xs-2" align="right">
                                    <b>Gauge/<br>Thickness</b>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" id="orig71" onchange="changeTest(this.form)" name="gauge_thickness" class="form-control" placeholder="Gauge/Thickness" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Description</b>
                            </td>
                            <td>
                                <div class="col-xs-12">
                                    <input type="text" id="echo1" readonly="" name="description" class="form-control" placeholder="Description" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><b>Product Category</b></h4>
                            </td>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Category</b>
                            </td>
                            <td>
                                <div class="col-xs-8">
                                    <select class="cat form-control" name="category_id" required>
                                        <option value="" disabled selected>--Category--</option>
                                        @foreach ($catt as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Sub-Category</b>
                            </td>
                            <td>
                                <div class="col-xs-8">
                                    <select class="subcat form-control" name="subcategory_id" required>
                                        <option>--Select Subcategory--</option>
                                    </select>
                                <div id="load" data-load='{!! $categories !!}'></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><b>Units of Measure</b></h4>
                            </td>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Base Unit</b>
                            </td>
                            <td>
                                <div class="col-xs-8">
                                    <select class="form-control" name="uom_id" required>
                                        <option value="" disabled selected>--Select One--</option>
                                        @foreach ($uoms as $unit)
                                        <option value="{{$unit->id}}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><b>Inventory Details</b></h4>
                            </td>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="col-xs-12">
                                    Inventoriable&nbsp;<label class="checkbox-inline"><input type="checkbox" name="inventoriable" value="Y"></label>
                                    Serialized&nbsp;<label class="checkbox-inline"><input type="checkbox" name="serialized" value="Y"></label>
                                </div>
                            <br>
                                <div class="col-xs-6">
                                    Re-Order Level <input type="text" name="reoderlevel" placeholder="Re-Order Level" class="form-control" autofocus="">
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
    $(document).ready(function() {
    $('#myTable').dataTable();
    } );
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    var today = new Date();
    document.getElementById('date').innerHTML=today.toDateString();
    </script>

    </div>