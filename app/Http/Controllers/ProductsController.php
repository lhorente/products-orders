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

		$product = null;;
		
		$id = filter_input(INPUT_POST,'id');
		if ($id){
			$product = Product::find($id);
		}
		
		$sku = filter_input(INPUT_POST,'sku');
		$name = filter_input(INPUT_POST,'name');
		$description = filter_input(INPUT_POST,'description');
		$price = filter_input(INPUT_POST,'price');
		
		if (!$product){
			$product = new Product;
		}
		
		$product->sku = $sku;
		$product->name = $name;
		$product->description = $description;
		$product->price = str_replace(",",".",str_replace(".","",$price));
		$product->save();
		
		return redirect('products')->with('success', 'Produto salvo com sucesso');
	}
	
	function edit(Request $request, $id){
		$product = Product::find($id);
		
		return view('products/edit',compact('product'));
	}
	
	function remove(Request $request, $id){
		$product = Product::find($id);
		
		if (!$product){
			return redirect('products')->with('error', 'Produto não encontrado');	
		}
		
		if ($product->delete()){
			return redirect('products')->with('success', 'Produto deletado com sucesso');
		}
		
		return redirect('products')->with('error', 'Não foi possível excluir o produto');
	}
}
