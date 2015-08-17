<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Item;
use App\Uom;
use App\ItemCategory;
use App\ItemSubCategory;
use App\InventoryType;
use DB;
use Input;


class PurchaseController extends Controller {

public function displayRequest(){

		return view('/operations/purchase/index');
	    
	}

}
