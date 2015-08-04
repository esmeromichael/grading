<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemPrice;
use App\ItemCategory;
use App\ItemSubCategory;
use App\Purchase;
use DB;
use Input;
use Redirect;
use Request;


class OperationController extends Controller {

  

public function displayItems(){

	    $itemlist = DB::table('items')
			            ->join('item_categories', 'items.item_id', '=', 'item_categories.item_id')
			            ->join('item_sub_categories', 'item_categories.category', '=', 'item_sub_categories.item_category_id')
			            ->select('items.*', 'item_sub_categories.name')
			            ->get();
						return view('operations/show', compact('itemlist'));

}



/*for show update form*/
public function itemProfile($item_id) {

				   	$iteminfo = Item::where('item_id', $item_id)->first();

				   	$displayuom = DB::table('uoms')
				   	->where('active', '=', 'Y')
				   	->get();

			    	return view('operations/profile',compact('iteminfo', 'displayuom'));

}
/*end comments*/



public function itemPriceadvice($item_id) {

					$iteminfo = Item::where('item_id', $item_id)->first();
					$priceadvice = DB::table('item_prices')
					->where('item_id', $item_id)
		            ->join('partners', 'item_prices.partner_id', '=', 'partners.partner_id')
		            ->select('partners.*', 'item_prices.*')
		            ->get();				   	
			    	return view('operations/priceadvice',compact('iteminfo','priceadvice'));
}


public function updatePriceAdvice($item_id, $id) {

					$iteminfo = Item::where('item_id', $item_id)->first();
					$itempriceinfo = ItemPrice::find($id);							   	
			    	return view('operations/priceadviceupdate',compact('itempriceinfo','iteminfo'));
}


public function showPurchases($item_id) {

					$iteminfo = Item::where('item_id', $item_id)->first();
					$purchases = DB::table('purchases')
					->where('item_id', $item_id)
		            ->join('partners', 'purchases.partner_id', '=', 'partners.partner_id')
		            ->select('partners.*', 'purchases.*')
		            ->get();				   	
			    	return view('operations/purchases',compact('purchases','iteminfo'));
}


public function UpdateItems()
{

 $id = Request::input('id');
       
         $Updateitems = DB::table('items')
        ->where('item_id','=', $id)

        ->update(['code' => Request::input('code'), 'sku' => Request::input('sku'), 'generic' => Request::input('generic'), 'brand' => Request::input('brand'), 'model' => Request::input('model'),
                    'size_dim' => Request::input('size_dim'), 'description' => Request::input('description'), 'make' => Request::input('make'), 'color' => Request::input('color'), 'gauge_thick' => Request::input('gauge_thick'),  'updated_at' => date('Y-m-d H:i:s')]);

          $itemlist = DB::table('items')
			            ->join('item_categories', 'items.item_id', '=', 'item_categories.item_id')
			            ->join('item_sub_categories', 'item_categories.category', '=', 'item_sub_categories.item_category_id')
			            ->select('items.*', 'item_sub_categories.name')
			            ->get();
						return view('operations/show', compact('itemlist'));

}
 
}
