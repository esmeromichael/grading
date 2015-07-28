<?php

namespace App\Http\Controllers;

use App\Partner;

class PartnersController extends Controller {

    public function index() {
        $partners = Partner::all();
        return view('partners/index', compact('partners'));
    }

}
