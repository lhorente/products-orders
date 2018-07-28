<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrdersController extends Controller{
    function index(Request $request){
		$orders = Order::get();
		
		return view('orders/index',compact('orders'));
	}
	
    function create(Request $request){
		$products = Product::get();
		return view('orders/create',compact('products'));
	}
	
    function save(Request $request){
		$product_id = filter_input(INPUT_POST,'product_id');
		
		$product = Product::find($product_id);
		
		$order = new Order;
		$order->product_id = $product_id;
		$order->total = $product->price;
		$order->save();
		
		return redirect('orders')->with('success', 'Pedido salvo com sucesso');
	}
	
	function remove(Request $request, $id){
		$order = Order::find($id);
		
		if (!$order){
			return redirect('orders')->with('error', 'Pedido não encontrado');	
		}
		
		if ($order->delete()){
			return redirect('orders')->with('success', 'Pedido deletado com sucesso');
		}
		
		return redirect('orders')->with('error', 'Não foi possível excluir o pedido');
	}
}
