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
use View;
use App\Uom;

class OperationController extends Controller {

  
/* shorten display items using eloquent
by: kerwin
*/
public function displayItems(){
      $itemlist = DB::table('items')           
      ->join('item_categories', 'items.category', '=', 'item_categories.id')
      ->join('item_subcategories', 'items.subcategory', '=', 'item_subcategories.id')
      ->select('items.*', 'item_subcategories.name as subname','item_categories.name as catname')
      ->orderBy('items.item_id', 'asc')
      ->paginate(10);
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
/* end by kerwin */

/* shorten using eloquent
by: kerwin
*/
public function itemProfile($item_id) {
      $parent = Request::input('category');
      $iteminfo = Item::where('item_id', $item_id)->first();
      $uoms = Uom::where('active','Y')->get();
      $itemcatsub = DB::table('items')   
      ->where('item_id', $item_id)        
      ->join('item_categories', 'items.category', '=', 'item_categories.id')
      ->join('item_subcategories', 'items.subcategory', '=', 'item_subcategories.id')
      ->select('item_subcategories.id as sid', 'item_subcategories.name as sname','item_categories.name as cname','item_categories.id as cid')
      ->first();
      $catt = ItemCategory::all();
      $categories = ItemCategory::all();
      $categories_pack = [];
      foreach($categories as $category):
       $subcategories = ItemSubcategory::where('parent',$category->id)->lists('name');
       $categories_pack[$category->id] = $subcategories;
      endforeach;
      $jsonified = json_encode($categories_pack);
      $data = ['categories' => $jsonified];
      return View::make('operations/profile',$data, compact('catt','iteminfo','uoms','subcategories','itemcatsub'));
}
/* end by kerwin */

public function itemPriceadvice($item_id) {

    $iteminfo = Item::where('item_id', $item_id)->first();
          $priceadvice = DB::table('item_prices')
          ->where('item_id', $item_id)
                ->join('partners', 'item_prices.partner_id', '=', 'partners.id')
                ->select('partners.*', 'item_prices.*')
                ->get();            
            return view('operations/priceadvice',compact('iteminfo','priceadvice'));
}


public function displayPriceAdvice($item_id, $id) {

           $iteminfo = Item::where('item_id', $item_id)->first();

           $itempriceinfo = ItemPrice::find($id);

          $priceadvice = DB::table('item_prices')
          ->where('item_id', $item_id)
                ->join('partners', 'item_prices.partner_id', '=', 'partners.id')
                ->select('partners.*', 'item_prices.*')
                ->first();


             return view('operations/priceadvicedisplay',compact('itempriceinfo','iteminfo','priceadvice'));



}

public function showPurchases($item_id) {

    $iteminfo = Item::where('item_id', $item_id)->first();

          $purchases = DB::table('purchases')
          ->where('item_id', $item_id)
                ->join('partners', 'purchases.partner_id', '=', 'partners.id')
                ->select('partners.*', 'purchases.*')
                ->get();            
            return view('operations/purchases',compact('purchases','iteminfo'));
}

public function showSuppliers($item_id) {

          $iteminfo = Item::where('item_id', $item_id)->first();

          $suppliers = DB::table('purchase_details')
          ->where('item_id', $item_id)
                ->join('partners', 'purchase_details.partner_id', '=', 'partners.id')
                ->select('partners.*', 'purchase_details.*')
                ->get();            
            return view('operations/suppliers',compact('suppliers','iteminfo'));
}

public function showMovements($item_id) {

  $iteminfo = Item::where('item_id', $item_id)->first();

  $movements = DB::table('movements')
          ->where('movements.item_id', $item_id)
          ->leftJoin('items', 'movements.item_id', '=', 'items.item_id')
          ->leftJoin('uoms', 'items.uom', '=', 'uoms.id')
          
          ->rightjoin('references', 'movements.doc_type', '=', 'references.ref_id')

          ->select('movements.doc_no as doc_no', 'movements.date as doc_date', 'movements.qty as quantity','uoms.name as unit', 'references.ref_type as type')
          ->orderBy('movements.doc_no', 'desc')
          ->get();



          return view('operations/movements', compact('movements','iteminfo'));
          


}

/* shorten  using eloquent
by: kerwin
*/
public function UpdateItems($item_id){
        $input = Input::except('_token','subcategory','reoderlevel');
        $sname = Input::get('subcategory');
        $subname = ItemSubcategory::where('name',$sname)->first();
        Item::whereItem_id($item_id)->update($input);
        Item::whereItem_id($item_id)->update(['subcategory' => $subname->id]);
        return redirect()->action('OperationController@itemProfile', $item_id);
}
/* end by kerwin */

/* shorten using eloquent
by: kerwin
*/
public function createitem() {

        $subcat = ItemSubcategory::where('name',Input::get('subcategory'))->get();    
        foreach($subcat as $subcategoryid):
        (Input::get('serialized')=='Y') ? $serialized="Y" : $serialized="N";
        (Input::get('inventoriable')=='Y') ? $inventoriable="Y" : $inventoriable="N";
        Item::create([
                'code' => Input::get('code'),
                'sku' => Input::get('sku'),
                'generic' => Input::get('generic'),
                'brand' => Input::get('brand'),
                'make' => Input::get('make'),
                'model' => Input::get('model'),
                'color' => Input::get('color'),
                'size_dim' => Input::get('size_dimension'),
                'gauge_thick' => Input::get('gauge_thickness'),
                'description' => Input::get('description'),
                'category' => Input::get('category'),
                'subcategory' => $subcategoryid->id,
                'uom' => Input::get('baseunit'),
                'inventoriable' => $inventoriable,
                'serialized' => $serialized,
                'reorder_lvl' => Input::get('reoderlevel'),
                '_token' => Request::get('_token')
                ]);
                return redirect()->action('OperationController@displayItems');
        endforeach; 
}
/* end by kerwin */


}
