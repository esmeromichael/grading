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



Route::get('deskpad/partners/{id}/profile','DeskpadController@showprofile');

Route::get('deskpad/partners/{partner_id}/contacts','DeskpadController@showcontact');

/*for show partner branch*/
Route::post('deskpad/partners/{id}/branches','DeskpadController@showbranch');
Route::get('deskpad/partners/{id}/branches','DeskpadController@showbranch');
/*end comment*/


/*for update partners*/
Route::get('deskpad/partners', 'DeskpadController@partners');
Route::post('deskpad/partners', 'DeskpadController@UpdatePartner');
/*end comment*/

/*for update partner branch*/
Route::get('deskpad/partners/{id}/branches/{branchid}','DeskpadController@ShowUpdateBranch');
Route::post('deskpad/partners/{id}/branches', 'DeskpadController@UpdateBranchPartner');
/*end comment*/

/*for update contacts*/
Route::get('deskpad/partners/{partnerid}/contacts/{contactid}','DeskpadController@ShowUpdateContacts');

Route::post('deskpad/partners/{id}/contacts', 'DeskpadController@UpdateContact');
/*------------------------------------*/


/*this section is for items controller*/
Route::get('operations/items', 'OperationController@displayItems');
Route::get('operations/items/{item_id}/profile','OperationController@itemProfile');

Route::post('operations/items/{item_id}/profile', 'OperationController@UpdateItems');

/*end comment---------------------------------------------------------*/
Route::get('register', function () {
    return view('account.register');
});

Route::post('register','RegisterController@insert');

Route::get('operations/', function () {
    return view('operations/index');
});



