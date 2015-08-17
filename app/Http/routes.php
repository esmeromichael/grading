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

/*for partner*/
Route::post('deskpad/partners', 'Deskpad\PartnerController@createPartner');
Route::get('deskpad/partners/{id}/profile','Deskpad\PartnerController@showprofile');
Route::get('deskpad/partners', 'Deskpad\PartnerController@partners');
Route::post('deskpad/partners/{id}/profile', 'Deskpad\PartnerController@UpdatePartner');
/*end */

/*for branch*/
Route::get('deskpad/partners/{id}/branches','Deskpad\BranchController@showbranch');
Route::post('deskpad/partners/{id}/branches', 'Deskpad\BranchController@createBranch');
Route::get('deskpad/partners/{id}/branches/{branchid}','Deskpad\BranchController@ShowBranchProfile');
Route::post('deskpad/partners/{id}/branches/{branchid}','Deskpad\BranchController@UpdateBranchPartner');
/*end */

/*for contacts*/
Route::get('deskpad/partners/{partnerid}/contacts/{contactid}','Deskpad\ContactController@ShowUpdateContacts');
Route::get('deskpad/partners/{id}/contacts','Deskpad\ContactController@showcontact');
Route::post('deskpad/partners/{partnerid}/contacts/{contactid}', 'Deskpad\ContactController@UpdateContact');
Route::post('deskpad/partners/{id}/contacts', 'Deskpad\ContactController@createContact');
/*end */


Route::get('register', function () {
    return view('account.register');
});
Route::post('register','RegisterController@insert');


/*----------------------------SEARCH PARTNER------------------------------------------------*/ 
Route::post('deskpad/partners/search','DeskpadController@search');
/*---------------------------/SEARCH PARTNER------------------------------------------------*/

/*----------------------------SEARCH BRANCH------------------------------------------------*/ 
Route::post('deskpad/partners/{id}/searchbranch','DeskpadController@searchbranch');
/*---------------------------/SEARCH BRANCH------------------------------------------------*/




/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*for items*/
Route::get('operations/items', 'Operations\ItemController@displayItems');
Route::get('operations/items/{item_id}/profile','Operations\ItemController@itemProfile');
Route::post('operations/items/{item_id}/profile', 'Operations\ItemController@UpdateItems');
Route::post('operations/items', 'Operations\ItemController@createItem');
/*end */


Route::get('operations/items/{item_id}/priceadvice','Operations\ItemPriceController@itemPriceadvice');
Route::get('operations/items/{item_id}/priceadvicedisplay/{id}','Operations\ItemPriceController@displayPriceAdvice');
Route::get('operations/items/{item_id}/purchases','Operations\ItemPurchasesController@DisplayItemPurchases');
Route::get('operations/items/{item_id}/suppliers','Operations\ItemSupplierController@showSuppliers');
Route::get('operations/items/{item_id}/movements','Operations\ItemMovementsController@showMovements');
Route::post('operations/items/{item_id}/priceadvice', 'Operations\ItemPriceController@createitemPriceadvice');


Route::post('operations/items/{item_id}/displaybulkunits', 'Operations\ItemController@createBulkUOM');
Route::post('operations/items/{item_id}/displaybulkpackaging', 'Operations\ItemController@createBulkPackaging');

 //Route::get('operations/items/{item_id}/profile/{id}/modalfunctions/updatebulkunit', 'Operations\ItemController@itemProfile');



/*end comment---------------------------------------------------------*/


Route::get('operations/', function () {
    return view('operations/index');
});

