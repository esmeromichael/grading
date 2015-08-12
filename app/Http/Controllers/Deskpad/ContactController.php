<?php
namespace App\Http\Controllers\Deskpad;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Country;
use App\Citizenship;
use App\Partnertitle;
use Input;
use App\PartnerContact;


class ContactController extends Controller {

public function showcontact($id) {

        $partnerscontact = PartnerContact::where('partner_id', $id)->get();
        $countries = Country::all();
        $citizenships = Citizenship::all();
        $partnertitles= Partnertitle::all();
        $partnerid = Partner::find($id); 

        return view('deskpad/contacts',compact('partnerscontact','partnerid','countries','citizenships','partnertitles'));
    }

public function createContact($id) {

		$contact = new PartnerContact;
		$input = Input::except('_token','manager','supervisor','contact_person','address');
		$contact->fill($input);
		$contact->address = Input::get('home').",".Input::get('street').",".Input::get('barangay').",".Input::get('city').",".Input::get('province').",".Input::get('country');
		$contact->manager = (Input::get('manager')=='Yes' ? 'Yes' : 'No');
		$contact->supervisor = (Input::get('supervisor')=='Yes' ? 'Yes' : 'No');
		$contact->contact_person = (Input::get('contact_person')=='Yes' ? 'Yes' : 'No');
		$contact->save();
		
		return redirect()->action('Deskpad\ContactController@showcontact', $id);
	}

public function ShowUpdateContacts($id, $branchid) {

        $updatecontact = PartnerContact::where('id', $branchid)->first(); 
        $countries = Country::all();
        $citizenships = Citizenship::all();
        $partnertitles= Partnertitle::all();
        $partnerid = Partner::find($id);        
        return view('deskpad/updatecontact', compact('updatecontact','partnerid','countries','citizenships','partnertitles'));
    }

 public function UpdateContact($partnerid, $contactid) {

 		$contact = PartnerContact::whereId($contactid)->first();
 		$input = Input::except('_token','manager','supervisor','contact_person','address');
		$contact->fill($input);
        $contact->address = Input::get('home').",".Input::get('street').",".Input::get('barangay').",".Input::get('city').",".Input::get('province').",".Input::get('country');
		$contact->manager = (Input::get('manager')=='Yes' ? 'Yes' : 'No');
		$contact->supervisor = (Input::get('supervisor')=='Yes' ? 'Yes' : 'No');
		$contact->contact_person = (Input::get('contact_person')=='Yes' ? 'Yes' : 'No');
		$contact->save();

        return redirect()->action('Deskpad\ContactController@showcontact', $partnerid);
    }   

}