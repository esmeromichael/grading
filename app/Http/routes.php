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
    return view('deskpad/baselogin');
});


Route::group(['prefix' => 'deskpad', 'namespace' => 'Deskpad'], function(){

/*for partner*/
Route::get('baselogin', 'PartnerController@login');
Route::post('baselogin', 'PartnerController@login');
Route::get('partners', 'PartnerController@partners');
Route::post('partners', 'PartnerController@AddSubject');
Route::post('partners', 'PartnerController@AddSubSuject');
Route::post('partners', 'PartnerController@AddSetSuject');
Route::post('partners', 'PartnerController@CreateStudent');
Route::get('studentprofile={id}', 'PartnerController@StudentProfile');


Route::get('grade', 'PartnerController@AddGrade');
Route::get('dev/api/subject','PartnerController@getSubject');
Route::get('subject','PartnerController@addSubject');
Route::get('dev/api/getsubject','PartnerController@getSubSubject');
Route::post('grade', 'PartnerController@SaveScore');
});
Route::get('dev/api/allsubjects','Search\SearchDataController@getSubject');

Route::get('dev/api/subsubject','Search\SearchDataController@getExamType');
Route::get('dev/api/allstudents','Search\SearchDataController@getAllStudents');


// Route::post('grade', 'PartnerController@AddSubject');
// Route::post('grade', 'PartnerController@AddSubSuject');
// // Route::post('grade', 'PartnerController@AddSetSuject');
// Route::post('partners', 'PartnerController@CreateStudent');