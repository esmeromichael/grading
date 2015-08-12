<?php
namespace App\Http\Controllers\Deskpad;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Country;
use App\EntityType;
use Input;


class PartnerController extends Controller {

public function partners() {
        $partners = Partner::paginate(10);
        $countries = Country::all();
        $entities = EntityType::all();
        return view('deskpad/partners', compact('partners','countries','entities'));
    }

public function createPartner() {

		$partner = new Partner;
		$partner_params = Input::except('customer','supplier','employee','_token');

		$partner->fill($partner_params);

		$partner->customer = (Input::get('customer')=='Yes' ? 'Yes' : 'No');
        $partner->supplier = (Input::get('supplier')=='Yes' ? 'Yes' : 'No');
        $partner->employee = (Input::get('employee')=='Yes' ? 'Yes' : 'No');
		$partner->address = Input::get('home').Input::get('barangay').Input::get('street').Input::get('city').Input::get('province').Input::get('country');
		$partner->save();

	 	return redirect()->action('Deskpad\PartnerController@partners');
	}

public function showprofile($id) {

        $partnerinfo = Partner::whereId($id)->first();
        $countries = Country::all();
        $entities = EntityType::all();
        return view('deskpad/profile',compact('partnerinfo','countries','entities'));
    }

public function UpdatePartner($id) {

		$partner = Partner::where('id', $id)->first();
        $input = Input::except('customer','supplier','employee','_token');
        $partner->fill($input);

        $partner->address = Input::get('home').Input::get('barangay').Input::get('street').Input::get('city').Input::get('province').Input::get('country');
        $partner->customer = (Input::get('customer')=='Yes' ? 'Yes' : 'No');
        $partner->supplier = (Input::get('supplier')=='Yes' ? 'Yes' : 'No');
        $partner->employee = (Input::get('employee')=='Yes' ? 'Yes' : 'No');

        $partner->save();
        
        return redirect()->action('Deskpad\PartnerController@partners');
    }


}
