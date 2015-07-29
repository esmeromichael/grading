<?php

namespace App\Http\Controllers;

use App\Partner;

class PartnersController extends Controller {

    public function index() {
        $partners = Partner::all();
        return view('partners/index', compact('partners'));
    }


    public function showinfo($id)
    {
    	$partnerinfo = Partner::find($id);
    	return view('partners/profile',compact('partnerinfo'));
    }
}
