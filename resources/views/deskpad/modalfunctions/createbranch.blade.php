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
            <hr>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Save Changes</button>
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
                            <h6>Create New Branch Info</h6>
                            <form class="form-signin" name="createbrachform" method="POST" action="{{ action('Deskpad\BranchController@showbranch', $partnerid->id) }}" onsubmit="return create()">
                            <table>
                            <tr>
                            <td>
                            <b>Branch ID</b>
                            </td>
                            <td>
                            <div class="col-xs-4">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="inputPartnerid" value="{{$partnerid->id}}" name="partner_id" class="form-control" placeholder="New" readonly="" autofocus="">
                            <input type="text" id="inputBranchid" name="id" class="form-control" placeholder="New" readonly="" autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td>
                            <b>Branch Name</b>
                            </td>
                            <td>
                            <div class="col-xs-12">
                            <input type="text" id="inputBranchname" name="name" class="form-control" placeholder="Branch Name" required autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td>
                            <b>Desc.</b>
                            </td>
                            <td>
                            <div class="col-xs-12">
                            <input type="text" id="inputDescription" name="description" class="form-control" placeholder="Description" required autofocus="">
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td><b><br>Address</b></td>
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
                            <tr><td><b>Email</b></td>
                            <td>
                            <div class="col-xs-12">
                            Example: john_doe@email.com<input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email Address" autofocus="">
                            </div>
                            </td>
                            </tr>
                            
                            </table>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
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
          <h4 class="modal-title">Search Info</h4>
        </div>

        <div class="modal-body">
        <form class="form-signin" id="searchform" name="searchform" method="POST" action="##/deskpad/partners/{{ $partnerid->id }}/searchbranch">
            <table>
                <tr>
                    <td>Branch ID</td>
                    <td>
                    <input type="text" name="branchid" class="form-control" placeholder="Branch ID"  autofocus="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                    <textarea class="form-control" rows="3" id="Description" name="description" placeholder="Description"></textarea>
                    </td>
                </tr>
                <tr>
                            <td>Status</td><td>
                            <select class="form-control" id="status" name="status">
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

        </div>
      </div>
      
    </div>
    </div> -->
    <!--/Modal -->


        <script>

    function create()
    {
        alert('One Branch Created.');
        return true;
    }

    </script>