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
use Redirect;
use Request;



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

	    return view('operations/show',$data, compact('itemlist','displaycategory','displaysubcategory','catt','uoms'));
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

	    $bulkunits = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'base')->get();

		$bulkunits2 = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'bulk')->get();

		$dropdownbulkunit = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'base')->get();
		$bulkid = BulkUnit::where('item_id', $item_id)
			 	->where('type', 'base')->first();

		 $id = Request::input('id');
 		$updatebulkunits = BulkUnit::where('id', $id)->first();
	
		
	    return View('operations/profile',$data, compact('catt','iteminfo','uoms','subcategories','itemcatsub','bulkunits','bulkunits2','dropdownbulkunit','updatebulkunits','bulkid'));
	}



public function UpdateItems($item_id) {

		$sname = Input::get('subcategory_id');
		$subname = ItemSubcategory::where('name',$sname)->first();

		$item = Item::where('id', $item_id)->first();
        $input = Input::except('_token','subcategory_id','reoderlevel','id');

        $item->fill($input);
        $item->subcategory_id = $subname->id;
		$item->save();

		return redirect()->action('Operations\ItemController@displayItems');
	}

public function createItem() { 

		$sname = Input::get('subcategory_id');
		$subname = ItemSubcategory::where('name',$sname)->first();

		$item = new Item;
		$item_params = array_merge(Input::only([
		  'code', 'sku', 'generic',
		  'brand', 'make', 'model',
		  'color', 'description',
		  'category_id', 'uom_id'
		]), [
		  'size_dim' => Input::get('size_dimension'),
		  'gauge_thick' => Input::get('gauge_thickness'),
		  'reorder_lvl' => Input::get('reoderlevel'),
		  'subcategory_id' => $subname->id
		]);

		$item->fill($item_params);

		$item->serialized = (Input::get('serialized') === 'Y' ? 'Y' : 'N');
		$item->inventoriable = (Input::get('inventoriable') === 'Y' ? 'Y' : 'N');

		$item->save();
		
	 	return redirect()->action('Operations\ItemController@displayItems');
	}

	public function createBulkUOM($item_id) {
		$iteminfo = Item::whereId($item_id)->first();
		$item = new BulkUnit;
		$itemid = Input::get('item_id');
		$input = Input::except('_token');
        $item->fill($input);
		$item->save();

		
		 return redirect()->action('Operations\ItemController@itemProfile',$itemid)->with('message','success');

		}

	public function createBulkPackaging() {

		$item = new BulkUnit;

		$itemid = Input::get('item_id');
		$input = Input::except('_token');
        $item->fill($input);
		$item->save();

		 redirect()->action('Operations\ItemController@itemProfile',$itemid);
		}

public function updatebulkUnit($id){

			$updatebulkunits = BulkUnit::where('id', $id)
			 			->where('type', 'base')->first();
		
	
		


}

	

}
