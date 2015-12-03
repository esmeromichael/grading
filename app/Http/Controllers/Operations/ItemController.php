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
use App\BulkUnit;
use Redirect;
use Request;
use App\PurchaseDetails;
use App\SalesOrder;
use App\BulkPackaging;


class ItemController extends Controller {

public function displayItems(){

		$itemlist = Item::paginate(10);

	    $catt = ItemCategory::all();
	    $categories = ItemCategory::all();
	    $categories_pack = [];
	    foreach($categories as $category):
		    $subcategories = ItemSubcategory::where('parent',$category->id)->lists('name');
		    $categories_pack[$category->id] = $subcategories;
	    endforeach;

	    $jsonified = json_encode($categories_pack);

	    $data = ['categories' => $jsonified];
	    $uoms = Uom::all();
	    $inventory_types = InventoryType::all();

	    return view('operations/show',$data, compact('inventory_types','itemlist','displaycategory','displaysubcategory','catt','uoms'));
	    
	}

public function itemProfile($item_id) {

	  	$iteminfo = Item::whereId($item_id)->first();
	    $uoms = Uom::where('active','Y')->get();
	    $catt = ItemCategory::all();
	    $categories = ItemCategory::all();
	    $categories_pack = [];
	    foreach($categories as $category):
		    $subcategories = ItemSubcategory::where('parent',$category->id)->orderBy('parent','asc')->lists('name');
		    $categories_pack[$category->id] = $subcategories;
	    endforeach;

	    $jsonified = json_encode($categories_pack);
	    $data = ['categories' => $jsonified];
	    $inventory_types = InventoryType::all();

	    $bulkunits = BulkUnit::where('item_id', $item_id)
			 	->where('active', 'Active')->get();

		$bulkunits2 = BulkPackaging::where('item_id', $item_id)
			 	->where('active', 'Active')->get();

		$dropdownbulkunit = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'base')
			 	->where('active', 'Active')->get();

		$bulkid = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'base')->first();
		$id2 = Request::input('id');
		$id = $iteminfo->id; 

		$trapPurchaseOrder = count(PurchaseDetails::where('item_id', $id)->get());
		$trapSalesOrder = count(SalesOrder::where('item_id', $id)->get());
	   return View('operations/profile',$data, compact('inventory_types','catt','iteminfo','uoms','subcategories','itemcatsub','bulkunits','bulkunits2','dropdownbulkunit','updatebulkunits','bulkid','trapPurchaseOrder','trapSalesOrder','getbasename'));
	}



public function UpdateItems($item_id) {

		$sname = Input::get('subcategory_id');
		$subname = ItemSubcategory::where('name',$sname)->first();

		$item = Item::where('id', $item_id)->first();
        $input = Input::except('_token','subcategory_id','reoderlevel','id');

        $item->fill($input);
        $item->subcategory_id = $subname->id;
		$item->save();

		$id = Request::input('id');
 		$updatebulkunits = BulkUnit::where('id', $item_id)->get();
 		
		return redirect()->action('Operations\ItemController@displayItems')->with('message', 'Item Successfully Updated.');

	}

public function createItem() {

		$sname = Input::get('subcategory_id');
		$subname = ItemSubcategory::where('name',$sname)->first();

		$item = new Item;
		$item_params = array_merge(Input::only([
		  'code', 'sku', 'generic',
		  'brand', 'make', 'model',
		  'color', 'description',
		  'category_id', 'uom_id','inventory_types_id'
		]), [
		  'size_dim' => Input::get('size_dimension'),
		  'gauge_thick' => Input::get('gauge_thickness'),
		  'reorder_lvl' => Input::get('reoderlevel'),
		  'subcategory_id' => $subname->id,
		  'inventory_types_id' => Input::get('inventory_types')
		]);
		$item->fill($item_params);
		$item->save();

		return redirect()->action('Operations\ItemController@displayItems')->with('message', 'Item Successfully Added.');
	}

	public function createBulkUOM($item_id) {

		$iteminfo = Item::whereId($item_id)->first();
		$itemid = Input::get('item_id');
			$bulkUom = new BulkUnit;			
			$input = Input::except('_token');
			$bulkUom->fill($input);
			$bulkUom->active  = (Input::get('active')=='Active' ? 'Active' : 'Inactive');
			$bulkUom->save();

			return redirect()->action('Operations\ItemController@itemProfile',$itemid)->with('message','Bulk Unit added');
		
	}

	public function createBulkPackaging() {
		$itemid = Input::get('item_id');
		$bulkpackaging = new BulkPackaging;
		$input = Input::except('_token');
        $bulkpackaging->fill($input);
        $bulkpackaging->active  = (Input::get('active')=='Active' ? 'Active' : 'Inactive');
		$bulkpackaging->save();

		return redirect()->action('Operations\ItemController@itemProfile',$itemid)->with('message','Bulk Packaging added');
	}

public function updatebulkUnit($item_id){

		$id = Request::input('id');
		$bulkunitid = BulkUnit::where('id', $id)->first();
		$iteminfo = Item::where('id',$bulkunitid->item_id)->first();
		$trapPurchaseOrder = count(PurchaseDetails::where('item_id', $iteminfo->id)->get());
		$trapSalesOrder = count(SalesOrder::where('item_id',$iteminfo->id)->get());

			if($trapPurchaseOrder > 0 || $trapSalesOrder > 0)
			{

				return redirect()->action('Operations\ItemController@itemProfile',$item_id)->with('message','cannot be update');
			}
			else
			{
				$updateBase = BulkUnit::where('id', $id)->first();		
				$input = Input::except('_token');
				$updateBase->fill($input);
				$updateBase->save();

	  		return redirect()->action('Operations\ItemController@itemProfile',$item_id)->with('message','Bulk unit updated');
			}
}

 	public function updatebulkPackaging($item_id){
 		$iteminfo = Item::whereId($item_id)->first();
		$id = Request::input('id');
		$bulkid = BulkPackaging::where('id', $id)->first();
		$getBaseUnitid = count(BulkUnit::where('id', $bulkid->uom_id)->get());
			if($getBaseUnitid > 0)
			{
				return redirect()->action('Operations\ItemController@itemProfile',$item_id)->with('message','cannot be update');
			}
			else
			{
			$updateBulk = BulkPackaging::where('id', $id)->first();		
			$input = Input::except('_token');
			$updateBulk->fill($input);
			$updateBulk->save();

	  		return redirect()->action('Operations\ItemController@itemProfile',$item_id)->with('message','Bulk Packaging  updated');
			}
			
 	}
		
}

