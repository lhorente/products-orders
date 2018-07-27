<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $table = 'products';
	
	public function create(){
		$count = \DB::where('sku',$this->sku)::count();
		die($count);
		$this->save();
	}
}
