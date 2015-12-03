<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use Input;
use App\Partner;
use Response;
use App\PartnerBranch;

class PurchasesReceivingController extends Controller {

	public function displayRequest(){
		return view('/operations/purchase/receiving');
	    
	}

	public function createRR(){

		return view('operations/purchase/createRR');
	}

	public function fillBranch(){
		
	}

}