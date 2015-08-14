<?php
namespace App\Http\Controllers\Deskpad;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Country;
use App\PartnerBranch;
use Input;


class BranchController extends Controller {

public function showbranch($id) {

        $branch = PartnerBranch::where('partner_id', $id)->get();
        $countries = Country::all();
        $partnerid = Partner::whereId($id)->first();        
        return view('deskpad/branches',compact('branch','partnerid','countries'));
    }

public function createBranch($id) {

        $branch = new PartnerBranch;
		$branch_params = Input::except('_token','submit1');
        $branch->address = Input::get('home').Input::get('barangay').Input::get('street').Input::get('city').Input::get('province').Input::get('country');
		$branch->fill($branch_params)->save();

		return redirect()->action('Deskpad\BranchController@showbranch',$id)->with('message', 'Branch Successfully Added.');;
    }

public function ShowBranchProfile($id, $branchid) {

        $update = PartnerBranch::where('id', $branchid)->first();
        $countries = Country::all();
        $partnerid = Partner::find($id);

        return view('deskpad/updatebranch', compact('update','partnerid','countries'));
    }

public function UpdateBranchPartner($id, $branchid) {

        $branch =  PartnerBranch::where('id', $id)->first();
        $input = Input::except('id','_token');
        $branch->address = Input::get('home').Input::get('barangay').Input::get('street').Input::get('city').Input::get('province').Input::get('country');
        $branch->fill($input)->save();

        return redirect()->action('Deskpad\BranchController@showbranch', $id)->with('message', 'Branch Successfully Updated.');;
    }
}