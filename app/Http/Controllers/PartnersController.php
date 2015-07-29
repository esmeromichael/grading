<?php

namespace App\Http\Controllers;

use App\Partner;
use App\PartnerContact;
use App\PartnerBranch;

class PartnersController extends Controller {

    public function index() {
        $partners = Partner::all();
        return view('partners/index', compact('partners'));
    }


    public function showprofile($partner_id)
    {
    	$partnerinfo = Partner::find($partner_id);
    	return view('partners/profile',compact('partnerinfo'));
    }

    public function showcontact($partner_id)
    {
    	$partnerscontact = PartnerContact::where('partner_id', $partner_id)->get();
    	$partnerid = Partner::find($partner_id);    	
    	return view('partners/contacts',compact('partnerscontact','partnerid'));
    }
    public function showbranch($partner_id)
    {
    	$partnersbranch = PartnerBranch::where('partner_id', $partner_id)->get();
    	$partnerid = Partner::find($partner_id);    	
    	return view('partners/branches',compact('partnersbranch','partnerid'));
    }

}
