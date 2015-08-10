 @extends('layouts.main2')

@section('content')

 <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/deskpad">Home</a></li>
                    <li class="active"><a href="/deskpad/partners">Partners</a></li>

                </ul>
            </div>
        </nav>

        
         <section class="container main_section">

        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/profile">Profile</a></li>
                    <li class="active"><a href="/deskpad/partners/{{ $partnerid->id }}/branches">Branches</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/contacts">Contacts</a></li>
                </ul>
            </div>
        </nav>

       
        
 <div class="container"> 
                    <h5>[{{$partnerid->id}}] - {{$partnerid->name}}</h5> 
            </div>
    <h6> Update Branch Info </h6>


 <form class="form-signin" name="loginform" method="POST" action="{{ action('DeskpadController@UpdateBranchPartner', [$partnerid->id])}}">
<table>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <tr>
                            <td>
                            <b>Branch ID</b>
                            </td>
                            <td>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputBrandid" value="{{$update->id}}" name="branchid" class="form-control" autofocus="" readonly="" ></b>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td>
                            <b>Branch Name</b>
                            </td>
                            <td>
                            <div class="col-xs-12">
                            <b><input type="text" id="inputBranchname" name="name" class="form-control" placeholder="Branch Name" required autofocus="" value="{{$update->name}}"></b>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td>
                            <b>Desc.</b>
                            </td>
                            <td>
                            <div class="col-xs-12">
                            <b><input type="text" id="inputDescription" name="description" class="form-control" placeholder="Description" required autofocus="" value="{{$update->description}}"></b>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td><b><br>Address</b></td>
                            <td><br>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputCountry" name="country" list="countries" class="form-control" value="{{$update->country}}" placeholder="Country"  autofocus=""></b>
                                <datalist id="countries">
                                @foreach ($countries as $country)
                            <option value="{{$country->value}}">
                                @endforeach
                                </datalist>
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputProvince" name="province" class="form-control" value="{{$update->province}}" placeholder="Province"  autofocus=""></b>
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputCity" name="city" class="form-control" value="{{$update->city}}" placeholder="City/Municipality"  autofocus=""></b>
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputBarangay" name="barangay" class="form-control" value="{{$update->barangay}}" placeholder="Barangay"  autofocus=""></b>
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputSteet" name="street" class="form-control" value="{{$update->street}}" placeholder="Street"  autofocus=""></b>
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputHouse" name="home" class="form-control" value="{{$update->home}}" placeholder="House No./Building"  autofocus=""></b>
                            </div>
                            </td>
                            </tr>
                            <tr><td><b><br><br>Mobile No.</b></td>
                            <td>
                            <hr>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode" name="mobile_countrycode" class="form-control" value="{{$update->mobile_countrycode}}" placeholder="Country Code"  autofocus=""></b> Country Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode" name="mobile_areacode" class="form-control" value="{{$update->mobile_areacode}}"  placeholder="Area Code"  autofocus=""></b>Area Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber" name="mobile_lineno" class="form-control" value="{{$update->mobile_lineno}}"placeholder="Line Number"  autofocus=""></b>Line Number
                            </div>
                            </td>
                            </tr>
                            <tr><td><b>Tel No.</b></td>
                            <td>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode1" name="tel_countrycode" class="form-control" value="{{$update->tel_countrycode}}" placeholder="Country Code"  autofocus=""></b>Country Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode1" name="tel_areacode" class="form-control" value="{{$update->tel_areacode}}" placeholder="Area Code"  autofocus=""></b>Area Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber1" name="tel_lineno" class="form-control" value="{{$update->tel_lineno}}" placeholder="Line Number"  autofocus=""></b>Line Number
                            </div>
                            </td>
                            </tr>
                            <tr><td><b>Fax No.</b></td>
                            <td>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode2" name="fax_countrycode" class="form-control" value="{{$update->fax_countrycode}}" placeholder="Country Code"  autofocus=""></b>Country Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode2" name="fax_areacode" class="form-control" value="{{$update->fax_areacode}}" placeholder="Area Code"  autofocus=""></b>Area Code
                            </div>
                            <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber2" name="fax_lineno" class="form-control" value="{{$update->fax_lineno}}" placeholder="Line Number"  autofocus=""></b>Line number
                            </div>
                            </td>
                            </tr>
                            <tr><td><b>Email</b></td>
                            <td>
                            <div class="col-xs-12">
                            <b><input type="text" id="inputEmail" name="email" class="form-control" value="{{$update->email}}" placeholder="Email Address"  autofocus=""></b>Example: john_doe@email.com
                            </div>
                            </td>
                            </tr>

</table>
 <br>
<button class="btn btn-lg btn-primary btn-sm" type="submit" name="submit">Update Info</button>
 </form>
 
 @include('deskpad.modalfunctions.createbranch')
 @endsection