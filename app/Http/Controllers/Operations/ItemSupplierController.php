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


class ItemSupplierController extends Controller {

	public function showSuppliers($item_id) {

 $iteminfo = Item::where('id', $item_id)->first();

  $suppliers = DB::table('purchase_details')
  ->where('item_id', $item_id)
  ->join('purchase_headers', 'purchase_details.po_no_id', '=', 'purchase_headers.id')
  ->leftJoin('partners', 'partners.id', '=', 'purchase_headers.partner_id')
  ->select('partners.name as suppliername', 'purchase_details.po_no_id as po_no', 'purchase_headers.po_date as podate',
  			'purchase_headers.remarks as remarks', 'purchase_details.qty as qty', 'purchase_details.price as price',
  			'purchase_details.total_amt as total', 'purchase_headers.partner_id as partnerid','purchase_details.*')
  ->groupBy('partnerid')
  ->get();            
   return view('operations/suppliers',compact('suppliers','iteminfo'));
}

}