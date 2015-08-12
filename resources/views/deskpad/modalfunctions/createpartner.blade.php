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
            
        </div>
        <div class="modal-footer">
        <button class="btn btn-lg btn-primary" type="submit" name="submit">Save</button>
        </div>
        </form>
      </div>
      
    </div>
    </div>

    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><b>New Partner</b></h4>
        </div>

                            <div class="modal-body">
                            <h6>Create New Partner Info</h6>
                            <form class="form-signin" id="createpartner" name="createpartner" method="POST" action="{{ action('Deskpad\PartnerController@partners')}}" onsubmit="return create()">
                            <table>
                            <tr>
                                <td> 
                                    <b>Partner ID</b>
                                </td>
                                <td>
                                    <div class="col-xs-6">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" id="inputPartnerID" name="id" class="form-control" placeholder="New" readonly="" autofocus="">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:12%;">
                                    <b>**Partner Name</b>
                                </td>
                                <td>
                                    <div class="col-xs-6">
                                    <input type="text" id="inputPartnerName" name="name" class="form-control" required placeholder="***Partner Name"  autofocus="">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Partner Type &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <div class="col-xs-12">
                                    <label class="checkbox-inline"><input type="checkbox" name="customer" value="Yes">Customer</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="supplier" value="Yes">Supplier</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="employee" value="Yes">Employee</label> 
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <td><b><br>Address &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-xs-4">
                            <input type="text" id="country" list="countries" name="country" class="form-control" placeholder="Country" onkeyup="lookup(this.value);" onblur="fill();" />
                                <datalist id="countries">
                                @foreach ($countries as $country)
                            <option value="{{$country->value}}">
                                @endforeach
                                </datalist>
                            </div>
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputProvince" name="province" class="form-control" placeholder="Province"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputCity" name="city" class="form-control" placeholder="City/Municipality"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputBarangay" name="barangay" class="form-control" placeholder="Barangay"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputSteet" name="street" class="form-control" placeholder="Street"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputHouse" name="home" class="form-control" placeholder="House No./Building"  autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr><td><b><br><br>Mobile No. &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <hr>
                            <div class="col-xs-4">
                            Country Code<input type="text" id="inputCountrycode" name="mobile_countrycode" class="form-control" placeholder="Country Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            Area Code<input type="text" id="inputAreacode" name="mobile_areacode" class="form-control" placeholder="Area Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            Line Number<input type="text" id="inputLinenumber" name="mobile_lineno" class="form-control" placeholder="Line Number"  autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr><td><b>Tel No. &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-xs-4">
                            <input type="text" id="inputCountrycode1" name="tel_countrycode" class="form-control" placeholder="Country Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputAreacode1" name="tel_areacode" class="form-control" placeholder="Area Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLinenumber1" name="tel_lineno" class="form-control" placeholder="Line Number"  autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr><td><b>Fax No. &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-xs-4">
                            <input type="text" id="inputCountrycode2" name="fax_countrycode" class="form-control" placeholder="Country Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputAreacode2" name="fax_areacode" class="form-control" placeholder="Area Code"  autofocus="">
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLinenumber2" name="fax_lineno" class="form-control" placeholder="Line Number"  autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr><td><b><br>Email &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <div class="col-xs-6">
                            Example: john_doe@email.com<input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email Address"  autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr><td><b><br>Entity &nbsp;&nbsp;&nbsp;</b></td>
                            <td>
                            <hr>
                            <div class="col-xs-3">
                            Entity List
                            <select class="form-control" id="entity" name="business_entity" onchange="myFunction();">
                            <option value="">---Select One---</option>
                            @foreach ($entities as $entity)
                            <option value="{{$entity->name}}">{{$entity->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            <div class="col-xs-3" id="inputTINdiv">
                            TIN<input type="text" id="inputTIN" name="tin" class="form-control" placeholder="TIN"  autofocus="">
                            </div> 
                            <div class="col-xs-3" id="inputRegdiv" style="display:none">
                            Reg #<input type="text" id="inputReg" name="reg_no" class="form-control" placeholder="Reg #"  autofocus="">
                            </div>             
                            <div class="col-xs-3" id="inputBdaydiv" style="display:none">
                            Date of Birth<input type="date" id="inputBday" name="birthday" class="form-control" placeholder="TIN"  autofocus="">
                            </div>
                            <div class="col-xs-3" id="inputRegdatediv" style="display:none">
                            Date of Registration<input type="date" id="inputRegdate" name="reg_date" class="form-control" placeholder="Reg #"  autofocus="">
                            </div> 
                            </td>
                            </tr>
                            
                            
                            </table>
        </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-lg btn-primary" onclick="return val()">Save</button>
                            </div>
                            </form>
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

    function myFunction() {
    var x = document.getElementById("entity").value;
    if (x == "Individual") 
        {
            document.getElementById("inputRegdiv").style.display = "none";
            document.getElementById("inputBdaydiv").style.display = "block";
            document.getElementById("inputRegdatediv").style.display = "none";
        }
    else if(x == "")
        {
            document.getElementById("inputRegdiv").style.display = "none";
            document.getElementById("inputBdaydiv").style.display = "none";
            document.getElementById("inputRegdatediv").style.display = "none";
        }
    else if(x == "Sole Proprietorship")
        {
            document.getElementById("inputRegdiv").style.display = "block";
            document.getElementById("inputBdaydiv").style.display = "none";
            document.getElementById("inputRegdatediv").style.display = "block";
        }
    else if(x == "Partnership")
        {
            document.getElementById("inputRegdiv").style.display = "block";
            document.getElementById("inputBdaydiv").style.display = "none";
            document.getElementById("inputRegdatediv").style.display = "block";
        }
    else if(x == "Corporation")
        {
            document.getElementById("inputRegdiv").style.display = "block";
            document.getElementById("inputBdaydiv").style.display = "none";
            document.getElementById("inputRegdatediv").style.display = "block";
        }
    else
        {
             document.getElementById("inputReg").style.display = "block";
        }

    }
    
    function val()
    {
    var y = document.getElementById("entity").value;
    if(y == ""){

    alert('Choose some Entity Value');
    return false;
    }
    }

    function create()
    {
        alert('One Partner Created.');
        return true;
    }

    </script>

    <!--Date-->
    <script language="javascript">
    var today = new Date();
    document.getElementById('date').innerHTML=today.toDateString();
    </script>
    

    <!--AJAX SEARCH-->
    <script language="javascript" type="text/javascript">

    function ajaxFunction(){
    var ajaxRequest;  // The variable that makes Ajax possible!
    
    try{
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e){
        // Internet Explorer Browsers
        try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data sent from the server
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            var ajaxDisplay = document.getElementById('pst');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    var partnerid = document.getElementById('partnerid').value;
    var partnername = document.getElementById('partnername').value;
    var type = document.getElementById('type').value;
    var status = document.getElementById('status').value;
    var queryString = "?partnerid=" + partnerid + "&partnername=" + partnername + "&type=" + type + "&status=" + status;
    ajaxRequest.open("GET", "searchpartner.php" + queryString, true);
    ajaxRequest.send(null); 
    }
    </script>
    <!--/AJAX SEARCH-->

        </section>
    </div>