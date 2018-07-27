<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	
	public function create(){
		$count = \DB::where('sku',$this->sku)::count();
		die($count);
		$this->save();
	}
}
