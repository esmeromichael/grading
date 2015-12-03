<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkUnit extends Model
{
	protected $fillable = ['item_id','name','unit_code','qty','uom_id','active','type'];

		public function uoms() {
		return $this->belongsTo('App\Uom');
	}
	public function bulkpackaging() {
		return $this->belongsTo('App\BulkPackaging');
	}

}
