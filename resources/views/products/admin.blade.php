@extends('partials.master')

@section('content')
<h1 class="adminH1">Admin</h1>

<div class="currentOrders">
	<h2>Current Orders</h2>
	<div class="ordersList">
	@foreach($orders as $order)

	<div class="orderRow">
		<div class="col id">
			<p>{{ $order->id }}</p>
		</div>
		<div class="col prodId">
			<p>{{ $order->product_id }}</p>
		</div>
		<div class="col name">
			<p>{{ $order->name }}</p>
		</div>
		<div class="col email">
			<p>{{ $order->email }}</p>
		</div>
		<div class="col address">
			<p>{{ $order->address }}</p>
		</div>
		<div class="col city">
			<p>{{ $order->city }}</p>
		</div>
		<div class="col state">
			<p>{{ $order->state }}</p>
		</div>
		<div class="col zip">
			<p>{{ $order->zip }}</p>
		</div>
		<div class="col cardNumber">
			<p>{{ $order->cardNumber }}</p>
		</div>

	</div>

	@endforeach
	</div>
</div>

<div class="changeRole">
	<h2>Change Role</h2>
	<div class="usersList">
	<form method="POST" action="/updateRoles">
		{{ csrf_field() }}
	@foreach($users as $user)
    <div class="userRow">
    	<div class="col id">
    		<p>{{ $user->id }}</p>
    	</div>
    	<div class="col name">
    		<p>{{ $user->name }}</p>
    	</div>
    	<div class="col email">
    		<p>{{ $user->email }}</p>
    	</div>
    	<div class="col role">
    		<p>{{ $user->role }}</p>
    	</div>
    	<div class="col updateRole">
    	<label for="update{{$user->id}}">Update Role:</label>
    	<div class="radios">
    		<div class="radio">
            <input class="updateInput" type="radio" name="update{{$user->id}}" id="update{{$user->id}}" value="admin" {{$user->role=='admin'?'checked':''}} /><span class="radioLabel">Admin</span>
        	</div>
            <div class="radio">
            <input class="updateInput" type="radio" name="update{{$user->id}}" id="update{{$user->id}}" value="customer" {{$user->role=='customer'?'checked':''}} /><span class="radioLabel">Customer</span></div>
        </div>
    	</div>
    </div>

    @endforeach

    <input class="usersSubmitBtn" type="submit" value="Submit">

    </form>
	</div>
</div>

@endsection