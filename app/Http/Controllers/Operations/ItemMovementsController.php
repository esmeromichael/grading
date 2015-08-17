<?php
namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Item;
use App\Uom;
use App\ItemCategory;
use App\ItemSubCategory;
use DB;
use Input;


class ItemMovementsController extends Controller {

		public function showMovements($item_id) {

			$iteminfo = Item::where('id', $item_id)->first();
			$movements = DB::table('movements')
			->where('movements.item_id', $item_id)
			->leftJoin('items', 'movements.item_id', '=', 'items.id')
			->leftJoin('uoms', 'items.uom', '=', 'uoms.id')
			->rightjoin('module_references', 'movements.doc_type', '=', 'module_references.ref_id')
			->rightjoin('partners', 'movements.partner_id', '=', 'partners.id')
			->select('movements.doc_no as doc_no', 'movements.date as doc_date', 'movements.qty as quantity','uoms.name as unit', 'module_references.prefix as type', 'partners.name as partnername')
			->orderBy('movements.doc_no', 'desc')
			->get();
			return view('operations/movements', compact('movements','iteminfo'));
          	}

}