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

Route::get('deskpad/partners/{id}/contacts','DeskpadController@showcontact');

/*for show partner branch*/
Route::post('deskpad/partners/{id}/branches','DeskpadController@showbranch');
Route::get('deskpad/partners/{id}/branches','DeskpadController@showbranch');
/*end comment*/


/*for update partners*/
Route::get('deskpad/partners', 'DeskpadController@partners');
Route::post('deskpad/partners/{id}/profile', 'DeskpadController@UpdatePartner');
/*end comment*/

/*for update partner branch*/
Route::get('deskpad/partners/{id}/branches/{branchid}','DeskpadController@ShowUpdateBranch');
Route::post('deskpad/partners/{id}/branches', 'DeskpadController@UpdateBranchPartner');
/*end comment*/

/*for update contacts*/
Route::get('deskpad/partners/{partnerid}/contacts/{contactid}','DeskpadController@ShowUpdateContacts');

Route::post('deskpad/partners/{id}/contacts', 'DeskpadController@UpdateContact');
/*------------------------------------*/





Route::get('register', function () {
    return view('account.register');
});

Route::post('register','RegisterController@insert');



/*-------------------------CREATING-----------------------------------------*/
Route::post('deskpad/partners', 'DeskpadController@createPartner');
Route::post('deskpad/partners/{id}/branches', 'DeskpadController@createBranch');
Route::post('deskpad/partners/{id}/contacts', 'DeskpadController@createContact');
/*-------------------------/CREATING-----------------------------------------*/


/*----------------------------SEARCH PARTNER------------------------------------------------*/ 
Route::post('deskpad/partners/search','DeskpadController@search');
/*---------------------------/SEARCH PARTNER------------------------------------------------*/

/*----------------------------SEARCH BRANCH------------------------------------------------*/ 
Route::post('deskpad/partners/{id}/searchbranch','DeskpadController@searchbranch');
/*---------------------------/SEARCH BRANCH------------------------------------------------*/




/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*this section is for items controller*/
Route::get('operations/items', 'OperationController@displayItems');
Route::get('operations/items/{item_id}/profile','OperationController@itemProfile');
Route::post('operations/items/{item_id}/profile', 'OperationController@UpdateItems');
Route::get('operations/items/{item_id}/priceadvice','OperationController@itemPriceadvice');
Route::get('operations/items/{item_id}/priceadvicedisplay/{id}','OperationController@displayPriceAdvice');
Route::get('operations/items/{item_id}/purchases','OperationController@showPurchases');
Route::get('operations/items/{item_id}/suppliers','OperationController@showSuppliers');
Route::get('operations/items/{item_id}/movements','OperationController@showMovements');

/*end comment---------------------------------------------------------*/


Route::get('operations/', function () {
    return view('operations/index');
});


 /*------------------------CREATE PARTNER-------------------------------*/ 
 Route::post('operations/items', 'OperationController@createitem');
 /*------------------------/CREATE PARTNER-------------------------------*/ 