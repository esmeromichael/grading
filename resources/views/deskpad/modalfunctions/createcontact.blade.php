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
                <h4><b>[{{$partnerid->id}}] - {{$partnerid->name}}</b></h4>
            </div>
            <div class="modal-body">
            <h6>Create New Contact Info</h6>
                <form class="form-signin" name="createcontactform" method="POST" action="" onsubmit="return create()">
                    <table>
                        <tr>
                            <td><b>Contact Type</b></td>
                            <td>
                                <div class="col-xs-6">
                                    <label class="checkbox-inline"><input type="checkbox" name="manager" value="Yes">Manager</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="supervisor" value="Yes">Supervisor</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="contact_person" value="Yes">Contact Person</label>  
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Branch</b>
                            </td>
                            <td>
                                <div class="col-xs-12">
                                    <input type="hidden" id="inputPartnerID" value="{{$partnerid->id}}" name="partner_id" class="form-control" placeholder="Branch" autofocus="">
                                    <input type="text" id="inputBranch" name="branch" class="form-control" placeholder="Branch" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><br><br>Contact ID</b></td>
                            <td>
                            <hr>
                                <div class="col-xs-4">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" class="form-control" placeholder="New" autofocus="" readonly="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Title</b></td>
                            <td>
                                <div class="col-xs-4">
                                    <select class="form-control" id="title" name="title">
                                        <option value="">---Select One---</option>
                                        @foreach($partnertitles as $title)
                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-4" align="right">
                                    <b>Position</b>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputPosistion" name="position" class="form-control" placeholder="Position" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Name</b></td>
                            <td><br>
                                <div class="col-xs-4">
                                    <input type="text" id="inputFirstname" name="first_name" class="form-control" placeholder="First Name" required autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputMiddle" name="middle_name" class="form-control" placeholder="Middle Name" required autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputLast" name="last_name" class="form-control" placeholder="Last Name" required autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><br>
                                <div class="col-xs-4">
                                    <input type="text" id="country" list="countries" name="country" class="form-control" placeholder="Country" onkeyup="lookup(this.value);" onblur="fill();" />
                                        <datalist id="countries">
                                            @foreach ($countries as $country)
                                            <option value="{{$country->value}}">
                                            @endforeach
                                        </datalist>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputProvince" name="province" class="form-control" placeholder="Province" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputCity" name="city" class="form-control" placeholder="City/Municipality" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputBarangay" name="barangay" class="form-control" placeholder="Barangay" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputSteet" name="street" class="form-control" placeholder="Street" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputHouse" name="home" class="form-control" placeholder="House No./Building" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Citizenship</b></td>
                            <td>
                                <div class="col-xs-4">
                                    <input type="text" id="inputCitizenship" list="citizenships" name="citizenship" class="form-control" placeholder="Citizenship" autofocus="">
                                    <datalist id="citizenships">
                                        @foreach ($citizenships as $citizen)
                                        <option value="{{$citizen->name}}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col-xs-4" align="right">
                                    <b>Birth Date</b>
                                </div>
                                <div class="col-xs-4">
                                    <input type="date" id="inputBirtdate" name="birthday" class="form-control" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Gender</b></td>
                            <td>
                                <div class="col-xs-4">
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">---Select One---</option>
                                        <option value="Male">Male</option>
                                        <option value="Female" >Female</option>
                                    </select>
                                </div>
                                <div class="col-xs-4" align="right">
                                    <b>Marital Status</b>
                                </div>
                                <div class="col-xs-4">
                                    <select class="form-control" id="maritalstatus" name="marital_status">
                                        <option value="">---Select One---</option>
                                        <option value="Single">Single</option>
                                        <option value="Married" >Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow" >Widow</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr><td><b><br><br>Mobile No.</b></td>
                            <td>
                            <hr>
                                <div class="col-xs-4">
                                    Country Code<input type="text" id="inputCountrycode" name="mobile_countrycode" class="form-control" placeholder="Country Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    Area Code<input type="text" id="inputAreacode" name="mobile_areacode" class="form-control" placeholder="Area Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    Line Number<input type="text" id="inputLinenumber" name="mobile_lineno" class="form-control" placeholder="Line Number" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Tel No.</b></td>
                            <td>
                                <div class="col-xs-4">
                                    <input type="text" id="inputCountrycode1" name="tel_countrycode" class="form-control" placeholder="Country Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputAreacode1" name="tel_areacode" class="form-control" placeholder="Area Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputLinenumber1" name="tel_lineno" class="form-control" placeholder="Line Number" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr><td><b>Fax No.</b></td>
                            <td>
                                <div class="col-xs-4">
                                    <input type="text" id="inputCountrycode2" name="fax_countrycode" class="form-control" placeholder="Country Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputAreacode2" name="fax_areacode" class="form-control" placeholder="Area Code" autofocus="">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" id="inputLinenumber2" name="fax_lineno" class="form-control" placeholder="Line Number" autofocus="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b><br>Email</b>
                            /td>
                            <td>
                                <div class="col-xs-12">
                                    Example: john_doe@email.com<input type="text" id="email" name="email" class="form-control" placeholder="Email Address" autofocus="">
                                </div>
                            </td>
                        </tr>
                
                    </table>
                            <br>
        
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-primary" >Save</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>


   <!--  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm"> -->
    
      <!-- Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Search Info</h4>
        </div>

        <div class="modal-body">
        <form class="form-signin" name="loginform" method="POST" action="#">
            <table>
                <tr>
            <td>Contact ID</td><td><input type="text" id="inputUsername" name="username" class="form-control" placeholder="Contact ID" autofocus=""></td>
                </tr>
                <tr>
            <td>Name</td><td><input type="password" id="oldpassword" name="oldpassword" class="form-control" placeholder="Name" required></td>
                </tr>
            </table>

        </div>
        <div class="modal-footer">
            <button class="btn btn-lg btn-primary" type="submit">Search</button>
        </div>
        </form>
      </div>
      
    </div>
    </div> -->
    <!--/Modal -->

<script>

    function create()
    {
        alert('One Contact Created.');
        return true;
    }

    </script>