<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkPackaging extends Model
{
    protected $fillable = ['item_id','name','unit_code','qty','bulk_unit_id','active','type'];

	public function baseunit() {
		return $this->belongsTo('App\BulkUnit');
	}

	public function itemname() {
		return $this->belongsTo('App\Item');
	}
}
