<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Item;
use Input;
use Illuminate\Support\Str;
use Response;
use App\Uom;
use App\BulkUnit;

class PurchaseRequestController extends Controller {

	public function getItems(){
			$itemlist = Item::all();

			$items = Item::all();
		    $itemspack = [];
		    foreach($items as $item):
			 	$uom = BulkUnit::where('uom_id',$item->uom_id)->lists('name');
			 	$itemspack[$item->uom_id] = $uom;
		    endforeach;

		 	$jsonified = json_encode($itemspack);
		 	$data = ['items' => $jsonified];

			return view('operations/purchase/index',$data ,compact('itemlist'));
	}
}