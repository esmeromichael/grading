<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Item;
use App\Uom;
use App\ItemCategory;
use App\ItemSubCategory;
use DB;
use Input;
use App\BulkUnit;


class BulkItemsController extends Controller {

		public function displayBulkUnit($item_id){
			
			 $bulkunits = BulkUnit::where('item_id', $item_id)
			 						->where('type', 'base')->get();
			 $uoms = Uom::all();


		return View('operations/profile', compact('bulkunits','uoms'));

		}


}