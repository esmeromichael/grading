<?php

namespace App\Http\Controllers;

use App\Item;

class ItemsController extends Controller {

    public function index() {
        $items = Item::all();

        return view('items/index', ['items' => $items]);
    }

}
