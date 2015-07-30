<?php

namespace App\Http\Controllers;

use App\Item;

class OperationController extends Controller {

  

public function displayItems(){

	    $itemlist = Item::all();
        return view('operations/show', compact('itemlist'));
}

  
}
