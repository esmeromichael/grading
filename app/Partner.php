<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model {

 	protected $primaryKey = 'id';
	protected $fillable = ['name','status','customer','supplier','employee','address','home','street','barangay','city','province','country','mobile_countrycode','mobile_areacode','mobile_lineno','tel_countrycode','tel_areacode','tel_lineno','fax_countrycode','fax_areacode','fax_lineno','email','business_entity','tin','reg_no','reg_date','birthday','_token','created_at','modified_at'];

}


