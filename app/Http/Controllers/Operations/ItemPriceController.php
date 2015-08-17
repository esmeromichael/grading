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
use DateTime;
use Session;


class ItemPriceController extends Controller {

public function itemPriceadvice($item_id) {

    $iteminfo = Item::where('id', $item_id)->first();
    $priceadvice = DB::table('item_prices')
    ->where('item_prices.item_id', $item_id)
    ->join('partners', 'item_prices.partner_id', '=', 'partners.id')
    ->select('partners.*', 'item_prices.*')
    ->orderBy('start_date','Asc')
    ->paginate(10);


    $catt = DB::table('partners')->where('supplier','=','Yes')->get();
    $categories = DB::table('partners')->where('supplier','=','Yes')->get();
    $categories_pack = [];
    foreach($categories as $category):
       $subcategories = DB::table('partner_branches')->where('partner_id',$category->id)->lists('name');
       $categories_pack[$category->id] = $subcategories;
    endforeach;
    $jsonified = json_encode($categories_pack);
    $data = ['categories' => $jsonified];

    $uoms = DB::table('uoms')
            ->where('id', $iteminfo->uom_id)
            ->first();

        $itempriceadvicestatus = ItemPrice::where('item_id', $item_id)->get();
        $dt = new DateTime();
        $current = $dt->format('Y-m-d');

         foreach($itempriceadvicestatus as $Pstatus):
            if($Pstatus->status == "Inactive" and $Pstatus->start_date == $current)
            {
                $statusactive="Active";
                ItemPrice::where('id', $Pstatus->id)->update(['status' => $statusactive]);
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
            }
            else if($Pstatus->status == "Active" and $Pstatus->end_date == $current)
            {
                $statusinactive="Inactive";
                ItemPrice::where('id', $Pstatus->id)->update(['status' => $statusinactive]);
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
            }
        endforeach; 

    return view('operations/priceadvice',$data,compact('uoms','catt','iteminfo','subcategories','itemcatsub','priceadvice'));
}


public function UpdateItemPriceAdvice($item_id, $id) {
    $status="Void";
    ItemPrice::where('id', $id)->update(['status' => $status]);
    return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
}

public function displayPriceAdvice($item_id, $id) {

    $iteminfo = Item::where('id', $item_id)->first();
    $itempriceinfo = ItemPrice::find($id);
    $priceadvice = DB::table('item_prices')
    ->where('item_prices.item_id', $item_id)
    ->join('partners', 'item_prices.partner_id', '=', 'partners.id')
    ->select('partners.*', 'item_prices.*')
    ->first();

	$branchpartner = DB::table('item_prices')
    ->where('item_id', $item_id)
    ->leftjoin('partner_branches', 'item_prices.branch_id', '=', 'partner_branches.id')
    ->select('partner_branches.name as branchpartner', 'item_prices.branch_id as branchid')
    ->first();
    $partnersinfo =DB::table('partners')->where('supplier','Yes')->get();
    $branchinfo =DB::table('partner_branches')->where('status','Active')->get();

    $catt = DB::table('partners')->where('supplier','=','Yes')->get();
    $categories = DB::table('partners')->where('supplier','=','Yes')->get();
    $categories_pack = [];
    foreach($categories as $category):
       $subcategories = DB::table('partner_branches')->where('partner_id',$category->id)->lists('name');
       $categories_pack[$category->id] = $subcategories;
    endforeach;
    $jsonified = json_encode($categories_pack);
    $data = ['categories' => $jsonified];

    $uoms = DB::table('uoms')
            ->where('id', $iteminfo->uom)
            ->first();

    return view('operations/priceadvicedisplay',$data,compact('uoms','catt','subcategories','itemcatsub','itempriceinfo','iteminfo','priceadvice','partnersinfo','branchinfo','branchpartner'));
}

public function createitemPriceadvice($item_id) {
    if(Request::input('branch_id')=='')
    {
        $branchid='Null';

      if(Request::input('q_price')==''){$q_price="0.00";}
      else{$q_price=Request::input('q_price').".00";}
      if(Request::input('disc')==''){$disc="0.00";}
      else{$disc=Request::input('disc').".00";}

        $iteminfostatus = ItemPrice::where('item_id', $item_id)->first();
        $status="Inactive";
        
        if($iteminfostatus->status == "Active" and $iteminfostatus->partner_id == Request::input('partner_id') and Request::input('start_date') > $iteminfostatus->end_date)
        {
           // create with same partner_id pero inactive
                DB::table('item_prices')->insertGetId(
                [
                'partner_id' => Request::input('partner_id'),'branch_id' => $branchid,'item_id' => $item_id,'q_price' =>$q_price,'disc_type' => Request::input('disc_type')
                ,'disc' => $disc,'cost' => Request::input('cost'),'remarks' => Request::input('remarks'),'start_date' => Request::input('start_date')
                ,'end_date' => Request::input('end_date'),'status' => $status
                ]
                ); 
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
            
        }
        else if($iteminfostatus->partner_id != Request::input('partner_id'))
        {
            // create with other partner_id daun active
                DB::table('item_prices')->insertGetId(
                [
                'partner_id' => Request::input('partner_id'),'branch_id' => $branchid,'item_id' => $item_id,'q_price' =>$q_price,'disc_type' => Request::input('disc_type')
                ,'disc' => $disc,'cost' => Request::input('cost'),'remarks' => Request::input('remarks'),'start_date' => Request::input('start_date')
                ,'end_date' => Request::input('end_date')
                ]
                ); 
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
        }
        else
        {
            return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
        }
    }
    else
    {
      $branchid1=Request::input('branch_id');

      $branch_id= DB::table('partner_branches')
      ->where('name','=',$branchid1)
      ->get();
       

        $iteminfostatus = ItemPrice::where('item_id', $item_id)->where('status','Active')->first();
        $status="Inactive";
        
        if($iteminfostatus->status == "Active" and $iteminfostatus->partner_id == Request::input('partner_id') and Request::input('start_date') > $iteminfostatus->end_date)
        {

            //create with same partner_id pero inactive
            foreach($branch_id as $branchid):
            if(Request::input('q_price')==''){$q_price="0.00";}
            else{$q_price=Request::input('q_price').".00";}
            if(Request::input('disc')==''){$disc="0.00";}
            else{$disc=Request::input('disc').".00";}

            DB::table('item_prices')->insertGetId(
                [
                'partner_id' => Request::input('partner_id'),'branch_id' => $branchid->id,'item_id' => $item_id,'q_price' =>$q_price,'disc_type' => Request::input('disc_type')
                ,'disc' => $disc,'cost' => Request::input('cost'),'remarks' => Request::input('remarks'),'start_date' => Request::input('start_date')
                ,'end_date' => Request::input('end_date'),'status' => $status
                ]
                );
                endforeach; 
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
            
        }
        else if($iteminfostatus->partner_id != Request::input('partner_id'))
        {
            // create with other partner_id daun active
            foreach($branch_id as $branchid):
            if(Request::input('q_price')==''){$q_price="0.00";}
            else{$q_price=Request::input('q_price').".00";}
            if(Request::input('disc')==''){$disc="0.00";}
            else{$disc=Request::input('disc').".00";}

            DB::table('item_prices')->insertGetId(
                [
                'partner_id' => Request::input('partner_id'),'branch_id' => $branchid->id,'item_id' => $item_id,'q_price' =>$q_price,'disc_type' => Request::input('disc_type')
                ,'disc' => $disc,'cost' => Request::input('cost'),'remarks' => Request::input('remarks'),'start_date' => Request::input('start_date')
                ,'end_date' => Request::input('end_date')
                ]
                );
                endforeach; 
                return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
        }
        else
        {
            Session::flash('message2','Sorry Your Price Advice was not created due to INVALID DATE or There are still ACTIVE Price Advice of yours. Thank you.');
            return redirect()->action('Operations\ItemPriceController@itemPriceadvice',$item_id);
        }
}
}
}