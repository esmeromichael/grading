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

class OperationController extends Controller {

  

public function displayItems(){

         $itemlist = DB::table('items')           
               ->join('item_categories', 'items.category', '=', 'item_categories.id')
               ->join('item_subcategories', 'items.subcategory', '=', 'item_subcategories.id')
               ->select('items.*', 'item_subcategories.name as subname','item_categories.name as catname')
               ->orderBy('items.item_id', 'asc')
               ->paginate(10);


    $catt = DB::table('item_categories')->get();
    $categories = DB::table('item_categories')->get();
    $categories_pack = [];
    foreach($categories as $category):
       $subcategories = DB::table('item_subcategories')->where('parent',$category->id)->lists('name');
       $categories_pack[$category->id] = $subcategories;
    endforeach;
    $jsonified = json_encode($categories_pack);
    $data = ['categories' => $jsonified];

    $uoms=DB::table('uoms')->get();

      return view('operations/show',$data, compact('itemlist','displaycategory','displaysubcategory','catt','uoms'));
}


/*for show update form*/
public function itemProfile($item_id) {

          $parent = Request::input('category');

            $iteminfo = Item::where('item_id', $item_id)->first();
            $uoms = DB::table('uoms')
            ->where('active', '=', 'Y')
            ->get();

      $itemcatsub = DB::table('items')   
          ->where('item_id', $item_id)        
                 ->join('item_categories', 'items.category', '=', 'item_categories.id')
                 ->join('item_subcategories', 'items.subcategory', '=', 'item_subcategories.id')
                 ->select('item_subcategories.id as sid', 'item_subcategories.name as sname','item_categories.name as cname','item_categories.id as cid')
                 ->first();
           
         
                /*this section is for the load of combobox category*/
        $catt = DB::table('item_categories')->get();
         $categories = DB::table('item_categories')->get();
         $categories_pack = [];
          foreach($categories as $category):
           $subcategories = DB::table('item_subcategories')->where('parent',$category->id)->lists('name');
           $categories_pack[$category->id] = $subcategories;
          endforeach;
           $jsonified = json_encode($categories_pack);
           $data = ['categories' => $jsonified];

   return View::make('operations/profile',$data, compact('catt','iteminfo','uoms','subcategories','itemcatsub'));


               /*==================================================*/

}

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

public function UpdateItems($item_id)
{

    
        $id = Request::input('id');
        $sname = Request::input('subcategory');
        $subname = DB::table('item_subcategories')->where('name','=', $sname)->first();

       $Updateitems = DB::table('items')->where('item_id','=', $id)
        ->update([
          'code' => Request::input('code'), 
          'sku' => Request::input('sku'), 
          'generic' => Request::input('generic'), 
          'brand' => Request::input('brand'), 
          'model' => Request::input('model'),
                    'size_dim' => Request::input('size_dim'), 
                    'description' => Request::input('description'), 
                    'make' => Request::input('make'), 
                    'color' => Request::input('color'), 
                    'gauge_thick' => Request::input('gauge_thick'),  
                    'category' => Request::input('category'), 
                    'subcategory' => $subname->id,
                    'inventoriable' => Request::input('inventoriable'),
                    'serialized' => Request::input('serialized'),                   
                    'updated_at' => date('Y-m-d H:i:s')
                    ]);

        return Redirect::action('OperationController@itemProfile',$item_id);
}

public function createitem() {

      $subcat= DB::table('item_subcategories')
      ->where('name','=',Request::input('subcategory'))
      ->get();

       foreach($subcat as $subcategoryid):

        if(Request::input('serialized')=='Y')
        {
          $serialized="Y";
        }
        else
        {
          $serialized="N";
        }

        if(Request::input('inventoriable')=='Y')
        {
          $inventoriable="Y";
        }
        else
        {
          $inventoriable="N";
        }

      DB::table('items')->insertGetId(

                [
                'code' => Request::input('code')
                ,'sku' => Request::input('sku')
                ,'generic' => Request::input('generic')
                ,'brand' => Request::input('brand')
                ,'make' => Request::input('make')
                ,'model' => Request::input('model')
                ,'color' => Request::input('color')
                ,'size_dim' => Request::input('size_dimension')
                ,'gauge_thick' => Request::input('gauge_thickness')
                ,'description' => Request::input('description')
                ,'category' => Request::input('category')
                ,'subcategory' => $subcategoryid->id
                ,'uom' => Request::input('baseunit')
                ,'inventoriable' => $inventoriable
                ,'serialized' => $serialized
                ,'reorder_lvl' => Request::input('reoderlevel')

                ,'_token' => Request::input('_token')
                ]
                );
            
                    return redirect()->action('OperationController@displayItems');

       endforeach; 
}



}
