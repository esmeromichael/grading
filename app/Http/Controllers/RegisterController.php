<?php

namespace App\Http\Controllers;

use App\Account;
use Input;
use Redirect;


class RegisterController extends Controller {


    public function insert() {

        $input = Input::all();
        Account::create($input);
 
        return view('account/register')->with('message', 'Account created');
    }



}
