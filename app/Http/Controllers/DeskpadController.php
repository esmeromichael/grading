<?php

namespace App\Http\Controllers;
use Input;
use App\Partner;
use App\PartnerContact;
use App\PartnerBranch;
use App\Country;
use App\Citizenship;
use App\Partnertitle;
use App\Entity;
use Redirect;
use Request;
use DB;


class DeskpadController extends Controller {

     public function partners() {
        $partners = Partner::all();
        $countries = Country::all();
        $entities = Entity::all();
        return view('deskpad/partners', compact('partners','countries','entities'));
    }

    public function showprofile($id)
    {
        $partnerinfo = Partner::where('id', $id)->first();
        $countries = Country::all();
        $entities = Entity::all();
        return view('deskpad/profile',compact('partnerinfo','countries','entities'));
    }

    public function showcontact($id)
    {
        $partnerscontact = PartnerContact::where('partner_id', $id)->get();
        $countries = Country::all();
        $citizenships = Citizenship::all();
        $partnertitles= Partnertitle::all();
        $partnerid = Partner::find($id); 

        return view('deskpad/contacts',compact('partnerscontact','partnerid','countries','citizenships','partnertitles'));
    }

    public function showbranch($id)
    {
        $partnersbranch = PartnerBranch::where('partner_id', $id)->get();
        $countries = Country::all();
        $partnerid = Partner::find($id);        
        return view('deskpad/branches',compact('partnersbranch','partnerid','countries'));
    }


    public function ShowUpdateBranch($id, $branchid)
    {
         $update = PartnerBranch::where('id', $branchid)->first();
         $countries = Country::all(); 
         $partnerid = Partner::find($id);        
         return view('deskpad/updatebranch', compact('update','partnerid','countries'));
    }

    public function ShowUpdateContacts($id, $branchid)
    {
         $updatecontact = PartnerContact::where('id', $branchid)->first(); 
         $countries = Country::all();
         $citizenships = Citizenship::all();
         $partnertitles= Partnertitle::all();
         $partnerid = Partner::find($id);        
         return view('deskpad/updatecontact', compact('updatecontact','partnerid','countries','citizenships','partnertitles'));
    }

/* shorten using eloquent
by: kerwin
*/
    public function UpdatePartner($partner_id)
    {   
        $input = Input::all();
        $UpdatePartner = Partner::whereId($partner_id)->update($input); 
        return redirect()->action('DeskpadController@showprofile', $partner_id);
    }
 /* end by kerwin */   

    public function UpdateBranchPartner($id,  $branchid)
    {

      return $input = Input::all();
       // $UpdateBranch = PartnerBranch::whereBranchid($branchid)->update($input);
        // ->where('branchid','=',$bid) 
        // ->update(['name' => Request::input('name'), 'description' => Request::input('description'), 'country' => Request::input('country'), 'province' => Request::input('province'), 'city' => Request::input('city'), 'barangay' => Request::input('barangay'),
        //             'street' => Request::input('street'), 'home' => Request::input('home'), 
        //             'mobile_countrycode' => Request::input('mobile_countrycode'), 'mobile_areacode' => request::input('mobile_areacode'), 'mobile_lineno' => Request::input('mobile_lineno'),
        //             'tel_countrycode' => Request::input('tel_countrycode'), 'tel_areacode' => Request::input('tel_areacode'), 'tel_lineno' => Request::input('tel_lineno'),
        //             'fax_countrycode' => Request::input('fax_countrycode'), 'fax_areacode' => Request::input('fax_areacode'), 'fax_lineno' => Request::input('fax_lineno'), 'email' => Request::input('email'), '_token' => Request::input('_token'), 'updated_at' => date('Y-m-d H:i:s')]);

        // $partnersbranch = PartnerBranch::where('partner_id', $id)->get();
        // $partnerid = Partner::find($id);     
        // return view('deskpad/branches',compact('partnerid','partnersbranch'));
                
    } 



    public function UpdateContact()
    {
        $id=Request::input('id');
       
         $UpdatePartner = DB::table('partner_contacts')
        ->where('id','=',$id) 
        ->update(['title' => Request::input('title'), 'first_name' => Request::input('first_name'), 'middle_name' => Request::input('middle_name'), 'last_name' => Request::input('last_name'), 'country' => Request::input('country'),
                    'province' => Request::input('province'), 'city' => Request::input('city'), 'barangay' => Request::input('barangay'), 'street' => Request::input('street'), 'home' => Request::input('home'), 'citizenship' => Request::input('citizenship'),
                    'gender' => Request::input('gender'), 'birthday' => Request::input('birthday'), 'marital_status' => Request::input('maritalstatus'),
                    'mobile_countrycode' => Request::input('mobile_countrycode'), 'mobile_areacode' => Request::input('mobile_areacode'), 'mobile_lineno' => Request::input('mobile_lineno'),
                    'tel_countrycode' => Request::input('tel_countrycode'), 'tel_areacode' => Request::input('tel_areacode'), 'tel_lineno' => Request::input('tel_lineno'),
                    'fax_countrycode' => Request::input('fax_countrycode'), 'fax_areacode' => Request::input('fax_areacode'), 'fax_lineno' => Request::input('fax_lineno'), 'email' => Request::input('email'), '_token' => Request::input('_token'), 'updated_at' => date('Y-m-d H:i:s')]);


    }



    public function createPartner()
            {

        if(Request::input('customer')=='Yes'){$customer="Yes";}
        else{$customer="No";}
        if(Request::input('supplier')=='Yes'){$supplier="Yes";}
        else{ $supplier="No";}
        if(Request::input('employee')=='Yes'){$employee="Yes";}
        else{$employee="No";}

                DB::table('partners')->insertGetId(

                [
                'name' => Request::input('partnername'),'customer' => $customer
                ,'supplier' => $supplier,'employee' => $employee

                ,'country' => Request::input('country'),'province' => Request::input('province')
                ,'city' => Request::input('city'),'barangay' => Request::input('barangay')
                ,'street' => Request::input('street'),'home' => Request::input('house')
                ,'address' => Request::input('house').",".Request::input('street').",".Request::input('barangay').",".Request::input('city').",".Request::input('province').",".Request::input('country')

                ,'mobile_countrycode' => Request::input('countrycode'),'mobile_areacode' => Request::input('areacode')
                ,'mobile_lineno' => Request::input('linenumber')

                ,'tel_countrycode' => Request::input('countrycode1'),'tel_areacode' => Request::input('areacode1')
                ,'tel_lineno' => Request::input('linenumber1')

                ,'fax_countrycode' => Request::input('countrycode2'),'fax_areacode' => Request::input('areacode2')
                ,'fax_lineno' => Request::input('linenumber2')

                ,'email' => Request::input('email')

                ,'business_entity' => Request::input('entity')

                ,'tin' => Request::input('tin'),'reg_no' => Request::input('reg')
                ,'reg_date' => Request::input('regdate'),'birthday' => Request::input('bday')
                ,'_token' => Request::input('_token')
                ]
                );

                return redirect()->action('DeskpadController@partners');
            }


            public function createBranch($id)
            {
                DB::table('partner_branches')->insertGetId(

                [
                'partner_id' => Request::input('partnerid'),'name' => Request::input('branchname')
                ,'description' => Request::input('description')

                ,'country' => Request::input('country'),'province' => Request::input('province')
                ,'city' => Request::input('city'),'barangay' => Request::input('barangay')
                ,'street' => Request::input('street'),'home' => Request::input('home')
                ,'address' => Request::input('home').",".Request::input('street').",".Request::input('barangay').",".Request::input('city').",".Request::input('province').",".Request::input('country')

                ,'mobile_countrycode' => Request::input('countrycode'),'mobile_areacode' => Request::input('areacode')
                ,'mobile_lineno' => Request::input('linenumber')

                ,'tel_countrycode' => Request::input('countrycode1'),'tel_areacode' => Request::input('areacode1')
                ,'tel_lineno' => Request::input('linenumber1')

                ,'fax_countrycode' => Request::input('countrycode2'),'fax_areacode' => Request::input('areacode2')
                ,'fax_lineno' => Request::input('linenumber2')

                ,'email' => Request::input('email')

                ,'_token' => Request::input('_token')
                ]
                );

                    $partnersbranch = PartnerBranch::where('partner_id', $id)->get();
                    $partnerid = Partner::find($id); 
                    $countries = Country::all();       
                    return view('deskpad/branches',compact('partnersbranch','partnerid','countries'));
            }

             public function createContact($id)
            {


                if(Request::input('manager')=='Yes'){$manager="Yes";}
                else{$manager="No";}
                if(Request::input('supervisor')=='Yes'){$supervisor="Yes";}
                else{ $supervisor="No";}
                if(Request::input('contact_person')=='Yes'){$contact_person="Yes";}
                else{$contact_person="No";}

                
                DB::table('partner_contacts')->insertGetId(

                [
                'partner_id' => Request::input('partner_id'),'title' => Request::input('title')

                ,'country' => Request::input('country'),'province' => Request::input('province')
                ,'city' => Request::input('city'),'barangay' => Request::input('barangay')
                ,'street' => Request::input('street'),'home' => Request::input('home')
                ,'address' => Request::input('home').",".Request::input('street').",".Request::input('barangay').",".Request::input('city').",".Request::input('province').",".Request::input('country')

                ,'manager' => $manager,'supervisor' => $supervisor
                ,'contact_person' => $contact_person,'last_name' => Request::input('last_name')
                ,'first_name' => Request::input('first_name'),'middle_name' => Request::input('middle_name')
                ,'position' => Request::input('position'),'branch' => Request::input('branch')

                ,'citizenship' => Request::input('citizenship'),'gender' => Request::input('gender')
                ,'marital_status' => Request::input('marital_status'),'birthday' => Request::input('birthday')

                ,'mobile_countrycode' => Request::input('mobile_countrycode'),'mobile_areacode' => Request::input('mobile_areacode')
                ,'mobile_lineno' => Request::input('mobile_lineno')

                ,'tel_countrycode' => Request::input('tel_countrycode'),'tel_areacode' => Request::input('tel_areacode')
                ,'tel_lineno' => Request::input('tel_lineno')

                ,'fax_countrycode' => Request::input('fax_countrycode'),'fax_areacode' => Request::input('fax_areacode')
                ,'fax_lineno' => Request::input('fax_lineno')

                ,'email' => Request::input('email')

                ,'_token' => Request::input('_token')
                ]
                );

               
                $partnerscontact = PartnerContact::where('partner_id', $id)->get();
                $partnerid = Partner::find($id);
                $countries = Country::all();
                $partnertitles= Partnertitle::all();
                $citizenships = Citizenship::all();
                return view('deskpad/contacts',compact('partnerscontact','partnerid','countries','citizenships','partnertitles'));
            }
          
// /*---------------------------------------------PARTNER SEARCH-------------------------------------------------------------------*/ 
//                 public function search()
//             {
//                 $searchpartnerid=Request::input('searchpartnerid');
//                 $searchpartnername=Request::input('searchpartnername');
//                 $searchstatus=Request::input('searchstatus');
//                 $searchtype=Request::input('searchtype');

//                 $search = DB::table('partners')
//                 ->where('id','like',$searchpartnerid)
//                 ->orWhere('name', 'like','%'.$searchpartnername.'%')
//                 ->Where('status', 'like','%'.$searchstatus.'%')
//                 ->where('supplier', 'like', $searchtype)
//                 ->get();
//                  $countries = Country::all();
//                  $entities = Entity::all();
//                  return view('deskpad/search', compact('search','countries','entities'));

                
//             }
// ---------------------------------------------/PARTNER SEARCH-------------------------------------------------------------------

// /*---------------------------------------------BRANCH SEARCH-------------------------------------------------------------------*/
//                 public function searchbranch($id)
//             {
//                 $searchbranchid=Request::input('branchid');
//                 $searchname=Request::input('name');
//                 $searchdescription=Request::input('description');
//                 $searchstatus=Request::input('status');

//                 $searchbranches = DB::table('partner_branches')
//                 ->where('id','like',$searchbranchid)
//                 ->orWhere('name', 'like','%'.$searchname.'%')
//                 ->get();
//                  $countries = Country::all();
//                  $partnerid = Partner::find($id); 
//                  return view('deskpad/searchbranch', compact('searchbranches','countries','partnerid')); 
//             }
// /*---------------------------------------------/BRANCH SEARCH-------------------------------------------------------------------*/

}

