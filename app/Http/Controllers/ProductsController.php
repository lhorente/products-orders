<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProduct;
use App\Product;

class ProductsController extends Controller{
    function index(Request $request){
		$products = Product::get();
		
		return view('products/index',compact('products'));
	}
	
    function create(Request $request){
		
		return view('products/create',compact('products'));
	}
	
    function save(StoreProduct $request){
		$request->validated();

		$sku = filter_input(INPUT_POST,'sku');
		$name = filter_input(INPUT_POST,'name');
		$description = filter_input(INPUT_POST,'description');
		$price = filter_input(INPUT_POST,'price');
		
		$product = new Product;
		$product->sku = $sku;
		$product->name = $name;
		$product->description = $description;
		$product->price = str_replace(",",".",str_replace(".","",$price));
		$product->save();
		
		return redirect('products')->with('success', 'Produto cadastrado com sucesso');
	}
	
	function edit(Request $request, $id){
		
	}
	
	function remove(Request $request, $id){
		
	}
}
