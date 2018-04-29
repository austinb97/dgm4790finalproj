<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
// use App\Role;
use App\Order;
use DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['customerPage','admin','checkout']);
        $this->middleware('role:customer')->only('customerPage');
        $this->middleware('role:admin')->only('admin');

    }
    
	public function welcome()
    {

    	$products = Product::all();

    	return view('products.welcome', compact('products'));
    }

    public function store()
    {
    	// $form = new Form;

    	// $form->name = request('name');
    	// $form->email = request('email');
    	// $form->message = request('message');

    	// $form->save();

    	Form::create(request(['name', 'email', 'message']));

    	return redirect('/');
    }

    public function customerPage()
    {
        return view('products.customerPage');
        
    }

    public function admin()
    {
        // $users = User::all();

        $users = DB::table('users')->join('uroles', 'users.id', '=', 'uroles.user_id')->join('roles', 'uroles.role_id', '=', 'roles.id')->select('users.*', 'roles.name as role')->get();     

        $orders = Order::all();   

        return view('products.admin', compact('users', 'orders'));
    }

    public function show(Product $product)
    {


        return view('products.checkout', compact('product'));
    }



}
 