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
            <li class="active"><a href="/deskpad/partners/{{ $partnerinfo->id }}/profile">Profile</a></li>
            <li><a href="/deskpad/partners/{{ $partnerinfo->id }}/branches">Branches</a></li>
            <li><a href="/deskpad/partners/{{ $partnerinfo->id }}/contacts">Contacts</a></li>
        </ul>
    </div>
</nav>
<div class="container"> 
    <h5>[{{$partnerinfo->id}}] - {{$partnerinfo->name}}</h5> 
</div>
<h6> Update Partner Info </h6>
    <form class="form-signin" name="loginform" method="POST" action="{{ action('Deskpad\PartnerController@UpdatePartner', $partnerinfo->id)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
             <tr>
                    <td>
                        <b>Partner ID &nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td>
                        <div class="col-xs-2">
                            <b><input type="text" id="id" name="id" class="form-control" placeholder="Partner ID"  autofocus="" readonly value="{{$partnerinfo->id}}"></b>
                        </div>
                    </td>
            </tr>
            <tr>
                    <td>
                        <b>Partner Name &nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td>
                        <div class="col-xs-5">
                            <b><input type="text" id="name" name="name" class="form-control" placeholder="Partner Name" required autofocus="" value="{{$partnerinfo->name}}"></b>
                        </div>
                    </td>
            </tr>
            <tr>
                    <td>
                        <b>Partner Type &nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td>
                        <div  class="col-xs-12">
                            <label class="checkbox-inline"><input type="checkbox" name="customer" value="Yes" <?php echo ($partnerinfo->customer=='Yes' ? 'checked' : '');?> >Customer</label>
                            <label class="checkbox-inline"> <input type="checkbox" name="supplier" value="Yes" <?php echo ($partnerinfo->supplier=='Yes' ? 'checked' : '');?> >Supplier</label>
                            <label class="checkbox-inline"><input  type="checkbox" name="employee" value="Yes" <?php echo ($partnerinfo->employee=='Yes' ? 'checked' : '');?> >Employee</label> 
                        </div>
                    </td>
            </tr>
            <tr>
                    <td><b>Address &nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputCountry" list="countries" name="country" class="form-control" value="{{$partnerinfo->country}}" placeholder="Country"  autofocus=""></b>Country
                            <datalist id="countries">
                                @foreach ($countries as $country)
                                <option value="{{$country->value}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputProvince" name="province" class="form-control" value="{{$partnerinfo->province}}" placeholder="Province"  autofocus=""></b>Province
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputCity" name="city" class="form-control" value="{{$partnerinfo->city}}" placeholder="City/Municipality"  autofocus=""></b>City/Municipality
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputBarangay" name="barangay" class="form-control" value="{{$partnerinfo->barangay}}" placeholder="Barangay"  autofocus=""></b>Barangay
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputSteet" name="street" class="form-control" value="{{$partnerinfo->street}}" placeholder="Street"  autofocus=""></b>Street
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputHouse" name="home" class="form-control" value="{{$partnerinfo->home}}" placeholder="House No./Building"  autofocus=""></b>House No./Building
                        </div>
                    </td>
            </tr>    
            <tr>
                    <td><b><br><br>Mobile No. &nbsp;&nbsp;&nbsp;</b></td>
                    <td><hr>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode" name="mobile_countrycode" class="form-control" value="{{$partnerinfo->mobile_countrycode}}" placeholder="Country Code"  autofocus=""></b>Country Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode" name="mobile_areacode" class="form-control" value="{{$partnerinfo->mobile_areacode}}"  placeholder="Area Code"  autofocus=""></b>Area Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber" name="mobile_lineno" class="form-control" value="{{$partnerinfo->mobile_lineno}}" placeholder="Line Number"  autofocus=""></b>Line Number
                        </div>
                    </td>
            </tr>
            <tr>
                    <td><b>Tel No. &nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode1" name="tel_countrycode" class="form-control" value="{{$partnerinfo->tel_countrycode}}" placeholder="Country Code"  autofocus=""></b>Country Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode1" name="tel_areacode" class="form-control" value="{{$partnerinfo->tel_areacode}}" placeholder="Area Code"  autofocus=""></b>Area Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber1" name="tel_lineno" class="form-control" value="{{$partnerinfo->tel_lineno}}" placeholder="Line Number"  autofocus=""></b>Line No.
                        </div>
                    </td>
            </tr>
            <tr>
                    <td><b>Fax No. &nbsp;&nbsp;&nbsp;</b></td>
                    <td>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputCountrycode2" name="fax_countrycode" class="form-control" value="{{$partnerinfo->fax_countrycode}}" placeholder="Country Code"  autofocus=""></b>Coutry Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputAreacode2" name="fax_areacode" class="form-control" value="{{$partnerinfo->fax_areacode}}" placeholder="Area Code"  autofocus=""></b>Area Code
                        </div>
                        <div class="col-xs-4">
                            <b><input type="text" id="inputLinenumber2" name="fax_lineno" class="form-control" value="{{$partnerinfo->fax_lineno}}" placeholder="Line Number"  autofocus=""></b>Line No.
                        </div>
                    </td>
            </tr>
            <tr>
                    <td>
                        <b><br>Email &nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td>
                        <div class="col-xs-5">
                            <b><input type="text" id="inputEmail" name="email" class="form-control" value="{{$partnerinfo->email}}" placeholder="Email Address"  autofocus=""></b> Example: john_doe@email.com
                        </div>
                    </td>
            </tr>
            <tr>
                    <td>
                        <b><br>Entity &nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td>
                        <hr>
                        <div class="col-xs-3">
                            Entity List
                            <b><select class="form-control" id="entity1" name="business_entity" onchange="myFunction1()">
                                <option <?php if ($partnerinfo->business_entity == ""): ?> selected="selected"<?php endif; ?> value="">---Select One---</option>
                                <option <?php if ($partnerinfo->business_entity == "Individual"): ?> selected="selected"<?php endif; ?> value="Individual">Individual</option>
                                <option <?php if ($partnerinfo->business_entity == "Sole Proprietorship"): ?> selected="selected"<?php endif; ?> value="Sole Proprietorship" >Sole Proprietorship</option>
                                <option <?php if ($partnerinfo->business_entity == "Partnership"): ?> selected="selected"<?php endif; ?> value="Partnership">Partnership</option>
                                <option <?php if ($partnerinfo->business_entity == "Corporation"): ?> selected="selected"<?php endif; ?> value="Corporation">Corporation</option>
                            </select></b>
                        </div>
                        <div class="col-xs-3" id="inputTINdiv1">
                            TIN<b><input type="text" id="inputTIN" name="tin" class="form-control"  value="{{$partnerinfo->tin}}" placeholder="TIN"  autofocus=""></b>
                        </div>
                        <div class="col-xs-3" id="inputRegdiv1" style="display:none">
                            Reg #<b><input type="text" id="inputReg" name="reg_no" class="form-control" value="{{$partnerinfo->reg_no}}" placeholder="Reg #"  autofocus="" ></b>
                        </div>             
                        <div class="col-xs-3" id="inputBdaydiv1">
                            Date of Birth<b><input type="date" id="inputBday" name="birthday" class="form-control" value="{{$partnerinfo->birthday}}"  autofocus=""></b>
                        </div>
                        <div class="col-xs-3" id="inputdateincdiv1" style="display:none">
                            Date of Registration<b><input type="date" id="inputdateinc" name="reg_date" class="form-control" value="{{$partnerinfo->reg_date}"  autofocus="" ></b>
                        </div>
                        <div class="col-xs-3" id="inputdateincdiv1" style="display:none">
                            Date of Incorporation<b><input type="date" id="inputdateinc" name="reg_date" class="form-control" value=""  autofocus="" ></b>
                        </div>
                    </td>
            </tr>
        </table>
        <br>
        <button class="btn btn-lg btn-primary btn-sm" type="submit" >Update Info</button>
    </form>
@include('deskpad.modalfunctions.createpartner') 
@endsection
