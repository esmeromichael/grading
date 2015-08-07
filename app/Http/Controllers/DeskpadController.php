<?php

namespace App\Http\Controllers;
use Input;
use App\Partner;
use App\PartnerContact;
use App\PartnerBranch;
use Redirect;
use Request;
use DB;
class DeskpadController extends Controller {

    public function partners() {
        $partners = Partner::all();
        return view('deskpad/partners', compact('partners'));
    }

    public function showprofile($id)
    {
    	$partnerinfo = Partner::find($id);
    	return view('deskpad/profile',compact('partnerinfo'));
    }

    public function showcontact($id)
    {
    	$partnerscontact = PartnerContact::where('id', $id)->get();
    	$partnerid = Partner::find($id);    	
    	return view('deskpad/contacts',compact('partnerscontact','partnerid'));
    }

    public function showbranch($id)
    {
    	$partnersbranch = PartnerBranch::where('partner_id', $id)->get();
    	$partnerid = Partner::find($id);    	
    	return view('deskpad/branches',compact('partnersbranch','partnerid'));
    }


    public function ShowUpdateBranch($id, $branchid)
    {
         $update = PartnerBranch::where('id', $branchid)->first(); 
         $partnerid = Partner::find($id);        
         return view('deskpad/updatebranch', compact('update','partnerid'));
    }

    public function ShowUpdateContacts($id, $branchid)
    {
         $updatecontact = PartnerContact::where('id', $branchid)->first(); 
         $partnerid = Partner::find($id);        
         return view('deskpad/updatecontact', compact('updatecontact','partnerid'));
    }


    public function UpdatePartner()
    {
        // $input = Partner::find($id);
        // $input->update();
        $id=Request::input('id');
       

        $UpdatePartner = DB::table('partners')
        ->where('id','=',$id) 
        ->update(['name' => Request::input('name'), 'email' => Request::input('email'), 'customer' => Request::input('customer'), 'supplier' => Request::input('supplier'), 'employee' => Request::input('employee'), 'address' => Request::input('address'), 'home' => Request::input('home'),
                    'street' => Request::input('street'), 'barangay' => Request::input('barangay'), 'city' => Request::input('city'), 'province' => Request::input('province'), 'country' => Request::input('country'),
                    'mobile_countrycode' => Request::input('mobile_countrycode'), 'mobile_areacode' => Request::input('mobile_areacode'), 'mobile_lineno' => Request::input('mobile_lineno'),
                    'tel_countrycode' => Request::input('tel_countrycode'), 'tel_areacode' => Request::input('tel_areacode'), 'tel_lineno' => Request::input('tel_lineno'),
                    'fax_countrycode' => Request::input('fax_countrycode'), 'fax_areacode' => Request::input('fax_areacode'), 'fax_lineno' => Request::input('fax_lineno'),
                    'business_entity' => Request::input('business_entity'), 'tin' => Request::input('tin'), 'reg_no' => Request::input('reg_no'), 'reg_date' => Request::input('reg_date'),
                    'birthday' => Request::input('birthday'), '_token' => Request::input('_token'), 'updated_at' => date('Y-m-d H:i:s')]);

        return Redirect::action('DeskpadController@partners')->with('message', 'Task updated.');

    // return view('deskpad/partners', compact('input'));
    // $partners = Partner::all();
    //     return view('deskpad/partners', compact('partners'));
    }
    

    public function UpdateBranchPartner($id)
    {
        $bid=Request::input('id');

        $UpdatePartner = DB::table('partner_branches')
        ->where('id','=',$bid) 
        ->update(['name' => Request::input('name'), 'description' => Request::input('description'), 'country' => Request::input('country'), 'province' => Request::input('province'), 'city' => Request::input('city'), 'barangay' => Request::input('barangay'),
                    'street' => Request::input('street'), 'home' => Request::input('home'), 
                    'mobile_countrycode' => Request::input('mobile_countrycode'), 'mobile_areacode' => request::input('mobile_areacode'), 'mobile_lineno' => Request::input('mobile_lineno'),
                    'tel_countrycode' => Request::input('tel_countrycode'), 'tel_areacode' => Request::input('tel_areacode'), 'tel_lineno' => Request::input('tel_lineno'),
                    'fax_countrycode' => Request::input('fax_countrycode'), 'fax_areacode' => Request::input('fax_areacode'), 'fax_lineno' => Request::input('fax_lineno'), 'email' => Request::input('email'), '_token' => Request::input('_token'), 'updated_at' => date('Y-m-d H:i:s')]);

        $partnersbranch = PartnerBranch::where('partner_id', $id)->get();
        $partnerid = Partner::find($id);     
        return view('deskpad/branches',compact('partnerid','partnersbranch'));
                
    } 



    public function UpdateContact()
    {
        $id=Request::input('id');
       
         $UpdatePartner = DB::table('partner_contacts')
        ->where('id','=',$id) 
        ->update(['title' => Request::input('title'), 'first_name' => Request::input('first_name'), 'middle_name' => Request::input('middle_name'), 'last_name' => Request::input('last_name'), 'country' => Request::input('country'),
                    'province' => Request::input('province'), 'city' => Request::input('city'), 'barangay' => Request::input('barangay'), 'street' => Request::input('street'), 'home' => Request::input('home'), 'citizenship' => Request::input('citizenship'),
                    'gender' => Request::input('gender'), 'birthday' => Request::input('birthday'), 'marital_status' => Request::input('maritalstatus'),
                    'mobile_countrycode' => Request::input('mobile_countrycode'), 'mobile_areacode' => Request::input('mobile_areacode'), 'mobile_lineno' => Request::input('mobile_lineno'),
                    'tel_countrycode' => Request::input('tel_countrycode'), 'tel_areacode' => Request::input('tel_areacode'), 'tel_lineno' => Request::input('tel_lineno'),
                    'fax_countrycode' => Request::input('fax_countrycode'), 'fax_areacode' => Request::input('fax_areacode'), 'fax_lineno' => Request::input('fax_lineno'), 'email' => Request::input('email'), '_token' => Request::input('_token'), 'updated_at' => date('Y-m-d H:i:s')]);

        // $partnerscontact = PartnerContact::where('id', $id)->get();
        // $partnerid = Partner::find($id);     
        // return view('deskpad/contacts',compact('partnerid','partnerscontact'));

    }


}

