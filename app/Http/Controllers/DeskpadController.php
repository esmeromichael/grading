<?php

namespace App\Http\Controllers;

use App\Partner;
use App\PartnerContact;
use App\PartnerBranch;

class DeskpadController extends Controller {

    public function partners() {
        $partners = Partner::all();
        return view('deskpad/partners', compact('partners'));
    }

    public function showprofile($partner_id)
    {
    	$partnerinfo = Partner::find($partner_id);
    	return view('deskpad/profile',compact('partnerinfo'));
    }

    public function showcontact($partner_id)
    {
    	$partnerscontact = PartnerContact::where('partner_id', $partner_id)->get();
    	$partnerid = Partner::find($partner_id);    	
    	return view('deskpad/contacts',compact('partnerscontact','partnerid'));
    }
    public function showbranch($partner_id)
    {
    	$partnersbranch = PartnerBranch::where('partner_id', $partner_id)->get();
    	$partnerid = Partner::find($partner_id);    	
    	return view('deskpad/branches',compact('partnersbranch','partnerid'));
    }



}
