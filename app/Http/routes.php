<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('deskpad/', function () {
    return view('deskpad/index');
});

Route::get('deskpad/partners', 'DeskpadController@partners');


Route::get('deskpad/partners/{partner_id}/profile','DeskpadController@showprofile');
Route::get('deskpad/partners/{partner_id}/contacts','DeskpadController@showcontact');
Route::get('deskpad/partners/{partner_id}/branches','DeskpadController@showbranch');




Route::get('register', function () {
    return view('account.register');
});

Route::post('register','RegisterController@insert');


Route::get('operations/', function () {
    return view('operations/index');
});

Route::get('operations/items', 'OperationController@items');
