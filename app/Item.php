<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model { 

	protected $guarded = ['id'];

	public function category() {
		return $this->belongsTo('App\ItemCategory');
	}

	public function subcategory() {
		return $this->belongsTo('App\ItemSubcategory');
	}

	public function uom() {
		return $this->belongsTo('App\Uom');
	}

	public function bulkunits() {
		return $this->belongsTo('App\BulkUnit');
	}


}