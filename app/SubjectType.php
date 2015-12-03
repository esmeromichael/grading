<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    public function sub_subject(){
    	return $this->belongsTo('App\SubSubject');
    }
}
