<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Item;
use App\ItemPrice;
use App\ItemCategory;
use App\ItemSubCategory;
use App\Purchase;
use DB;
use Input;
use Redirect;
use Request;
use View;
use App\Uom;

class ItemPurchasesController extends Controller {


	public function DisplayItemPurchases($item_id){

		 $iteminfo = Item::where('id', $item_id)->first();


	 	$itempurchases= DB::table('purchase_details')
	    ->where('purchase_details.item_id', $item_id)
	    ->leftjoin('purchase_headers', 'purchase_details.po_no_id', '=', 'purchase_headers.id')
	    ->leftjoin('partners', 'purchase_headers.partner_id', '=', 'partners.id')
	    ->select('purchase_headers.id as po_no', 'purchase_headers.po_date as podate', 'partners.name as suppliername',
	    			'purchase_headers.remarks as remarks','purchase_details.qty as qty', 'purchase_details.price as price',
	    			'purchase_details.total_amt as totalamt','purchase_details.*')
		->paginate(10);

	   return view('operations/purchases',compact('iteminfo','itempurchases'));
	}

}