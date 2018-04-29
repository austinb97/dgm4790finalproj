<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrderController extends Controller
{

    public function store(Request $request)
    {
    	

    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required',
    		'address' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'zip' => 'required',
    		'cardNumber' => 'required|regex:/^5105 1051 0510 5100$/',
    	]);


    	$order = $request->all();

    	$product = Product::where('id', '=', $request->product_id)->first();


    	Order::create(request(['product_id', 'name', 'email', 'address', 'city', 'state', 'zip', 'cardNumber']));

    	// return redirect('/thanks');
    	return view('products.thanks', compact('order', 'product'));
    }

    public function thank()
    {


    	return view('products.thanks');
    }



}
