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


class OrderController extends Controller {

public function displayOrder(){

		return view('/operations/purchase/order');
	    
	}

}
