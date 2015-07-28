<?php

namespace App\Http\Controllers;

use App\Item;

class ItemsController extends Controller {

    public function index() {
        $items = Item::all();

        return view('items/index', ['items' => $items]);
    }

    public function show($id) {
    	$item = Item::find($id);

    	return view('items/show', compact('item'));
    }
}
