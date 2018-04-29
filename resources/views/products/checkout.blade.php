@extends('partials.master')

@section('content')
<div class="checkoutPage">

<h1>Checkout</h1>

<div class="productDisplay">
<img src="/{{ $product->imgPath }}">
<div class="productInfo">
<h2>{{ $product->make }} {{ $product->model }}</h2>
<p>Year: {{ $product->year }} | Miles:  {{ $product->miles}} | ${{ $product->price }}</p>
</div>
</div>

<div class="checkoutForm">
<form method="POST" action="/placeOrder">
{{ csrf_field() }}

<input type="hidden" name="product_id" value="{{ $product->id }}">

<div class="formGroup">
<div class="checkoutLabel">
<label for="name">Name</label>
</div>
<div class="checkoutInput">
<input required type="text" name="name" id="name" value="{{ Auth::user()->name }}">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="email">Email</label>
</div>
<div class="checkoutInput">
<input required type="text" name="email" id="email" value="{{ Auth::user()->email }}">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="address">Address</label>
</div>
<div class="checkoutInput">
<input required type="text" name="address" id="address">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="city">City</label>
</div>
<div class="checkoutInput">
<input required type="text" name="city" id="city">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="state">State</label>
</div>
<div class="checkoutInput">
<input required type="text" name="state" id="state">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="zip">Zip</label>
</div>
<div class="checkoutInput">
<input required type="text" name="zip" id="zip">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="cardNumber">Card Number</label>
</div>
<div class="checkoutInput">
<input required type="text" name="cardNumber" id="cardNumber">
</div>
</div>

<div class="formGroup">
<div class="checkoutLabel">
<label for="sbmt"> </label>
</div>
<div class="checkoutInput">
<input name="sbmt" class="orderSubmitBtn" type="submit" value="Submit">
</div>
</div>

</form>

@if(count($errors))
<div class="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

</div><!-- end form section -->


</div>
@endsection