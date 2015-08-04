 @extends('layouts.main')

@section('content')
<nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/deskpad">Home</a></li>
                    <li><a href="/deskpad/partners">Partners</a></li>

                </ul>
            </div>
        </nav>
        <section class="container main_section">

        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/profile">Profile</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/branches">Branches</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/contacts">Contacts</a></li>
                </ul>
            </div>
        </nav>

 <div class="container"> 
                    <h5>[{{$partnerid->id}}] - {{$partnerid->name}}</h5> 
            </div>
    <h6> Update Partner Info </h6>
<form class="form-signin" name="loginform" method="POST" action="/deskpad/partners/{{$partnerid->id}}/contacts">
<table>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <tr>
                            <td><b>Contact Type</b></td>
                            <td>
                            <div class="col-xs-12">
                            <label class="checkbox-inline"><input  type="checkbox" name="manager" value="Y">Manager</label>
                            <label class="checkbox-inline"><input  type="checkbox" name="supervisor" value="Y">Supervisor</label>
                            <label class="checkbox-inline"><input  type="checkbox" name="contactperson" value="Y">Contact Person</label>  
                            </div>
                            </td>
             </tr>
             <tr>
                            <td>
                            <b>Branch</b>
                            </td>
                            <td>
                            <div class="col-xs-updatecontact">
                            <input type="hidden" id="inputPartnerID" value="" name="partnerid" class="form-control" placeholder="Branch" autofocus="">
                            <input type="text" id="inputPartnerID" value="{{$updatecontact->branch}}" name="branch" class="form-control" placeholder="Branch" autofocus="">
                            </div>
                            </td>
              </tr>
              				<tr>
                            <td><b><br>Contact ID</b></td>
                            <td>
                           
                            <div class="col-xs-4">
                            <input type="text" id="inputcontactid" name="id" value="{{$updatecontact->id}}" class="form-control" placeholder="" required autofocus="" readonly>
                            </div>
                            </td>
               </tr>
               	<tr>
                            <td><b>Title</b></td>
                            <td>
                            <div class="col-xs-4">
                            <select class="form-control" id="title" name="title">
                            <option value="">---Select One---</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs." >Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Atty.">Atty.</option>
                            </select>
                            </div>
                            <div class="col-xs-4" align="right">
                            <b>Position</b>
                            </div>

                            <div class="col-xs-4">
                            <input type="text" id="inputPosistion" value="{{$updatecontact->position}}" name="position" class="form-control" placeholder="Position"  autofocus="">
                            </div>
                            </td>
                </tr>

                <tr>
                            <td><b>Name</b></td>
                            <td><br>
                            <div class="col-xs-4">
                            <input type="text" id="inputFirstname" value="{{$updatecontact->first_name}}" name="first_name" class="form-control" placeholder="First Name"  autofocus="">First Name
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputMiddle" value="{{$updatecontact->middle_name}}" name="middle_name" class="form-control" placeholder="Middle Name"  autofocus="">Middle Name
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLast" value="{{$updatecontact->last_name}}" name="last_name" class="form-control" placeholder="Last Name"  autofocus="">Last Names
                            </div>
                            </td>
                 </tr>

                 <tr>
                            <td><b>Address</b></td>
                            <td><br>
                            <div class="col-xs-4">
                            <input type="text" id="inputCountry" value="{{$updatecontact->country}}" name="country" class="form-control" placeholder="Country"  autofocus="">Country
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputProvince" value="{{$updatecontact->province}}" name="province" class="form-control" placeholder="Province"  autofocus="">Province
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputCity" value="{{$updatecontact->city}}" name="city" class="form-control" placeholder="City/Municipality"  autofocus="">City
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputBarangay" value="{{$updatecontact->barangay}}" name="barangay" class="form-control" placeholder="Barangay"  autofocus="">Barangay
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputSteet" value="{{$updatecontact->street}}" name="street" class="form-control" placeholder="Street"  autofocus="">Street
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputHouse" value="{{$updatecontact->home}}" name="house" class="form-control" placeholder="House No./Building"  autofocus="">House No./Buiding
                            </div>
                            </td>
                 </tr>

                <tr>
                 			 <td><b>Citizenship</b></td>
                 			 <td>
                 			 <div class="col-xs-4">
                            <input type="text" id="inputCitizenship" value="{{$updatecontact->citizenship}}" name="citizenship" class="form-control" placeholder="Citizenship"  autofocus="">
                            </select>
                            </div>
                            
                            <div class="col-xs-4" align="right">
                            <b>Birth Date</b>
                            </div>
                            <div class="col-xs-4">
                            <input type="date" id="inputBirtdate" value="{{$updatecontact->birthday}}" name="birthday" class="form-control"  autofocus="">
                            </div>
                 			 </td>
                </tr>
                            
                <tr>
                            <td><b>Gender</b></td>
                            <td>
                            <div class="col-xs-4">
                            <select class="form-control" id="gender"  name="gender">
                            <option value="">---Select One---</option>
                            <option value="Male">Male</option>
                            <option value="Female" >Female</option>
                            </select>

                            </div>
                            <div class="col-xs-4" align="right">
                            <b>Marital Status</b>
                            </div>
                            <div class="col-xs-4">
                            <select class="form-control" id="maritalstatus" name="maritalstatus">
                            <option value="">---Select One---</option>
                            <option value="Single">Single</option>
                            <option value="Married" >Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow" >Widow</option>
                            </select>
                            </div>
                            </td>
                </tr>

                <tr>
                            <td><b><br><br>Mobile No.</b></td>
                            <td>
                            
                            <div class="col-xs-4">
                            <input type="text" id="inputCountrycode" value="{{$updatecontact->mobile_countrycode}}" name="mobile_countrycode" class="form-control" placeholder="Country Code"  autofocus="">Country Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputAreacode" value="mobile_areacode" name="mobile_areacode" class="form-control" placeholder="Area Code"  autofocus="">Area Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLinenumber" value="{{$updatecontact->mobile_lineno}}" name="mobile_lineno" class="form-control" placeholder="Line Number"  autofocus="">Line Number
                            </div>
                            </td>
                </tr>

               <tr>
                            <td><b>Tel No.</b></td>
                            <td>
                            <div class="col-xs-4">
                            <input type="text" id="inputCountrycode1" value="{{$updatecontact->tel_countrycode}}" name="tel_countrycode" class="form-control" placeholder="Country Code"  autofocus="">ountry Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputAreacode1" value="{{$updatecontact->tel_areacode}}" name="tel_areacode" class="form-control" placeholder="Area Code"  autofocus="">Area Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLinenumber1" value="{{$updatecontact->tel_lineno}}" name="tel_lineno" class="form-control" placeholder="Line Number"  autofocus="">Line Number
                            </div>
                            </td>
                </tr>

               	<tr>
                            <td><b>Fax No.</b></td>
                            <td>
                            <div class="col-xs-4">
                            <input type="text" id="inputCountrycode2" value="{{$updatecontact->fax_countrycode}}" name="fax_countrycode" class="form-control" placeholder="Country Code"  autofocus="">Country Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputAreacode2" value="{{$updatecontact->fax_areacode}}" name="fax_areacode" class="form-control" placeholder="Area Code"  autofocus="">Area Code
                            </div>
                            <div class="col-xs-4">
                            <input type="text" id="inputLinenumber2" value="{{$updatecontact->fax_lineno}}" name="fax_lineno" class="form-control" placeholder="Line Number"  autofocus="">Line Number
                            </div>
                            </td>
                </tr>

                			 <tr>
                            <td>
                            <b><br>Email</b>
                            </td>
                            <td>
                            <div class="col-xs-1-updatecontact">
                            <input type="text" id="inputEmail" value="{{$updatecontact->email}}" name="email" class="form-control" placeholder="Email Address"  autofocus="">Example: john_doe@email.com
                            </div>
                            </td>
                            </tr>
                            

</table>
                            <button type="submit" class="btn btn-lg btn-primary" name="submit1">Update</button>
                            
</form>
        @endsection
