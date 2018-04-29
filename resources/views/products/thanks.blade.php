@extends('partials.master')

@section('content')
<div class="checkoutPage">

<h1>Thank You!</h1>

<div class="productDisplay">
<img src="/{{ $product->imgPath }}">
<div class="productInfo">
<h2>{{ $product->make }} {{ $product->model }}</h2>
<p>Year: {{ $product->year }} | Miles:  {{ $product->miles}} | ${{ $product->price }}</p>
</div>
</div>

<div class="thankMsg">
<h2>Thank you for your purchase {{ Auth::user()->name }}</h2>
<p>Your {{ $product->model }} should arrive in 2-3 weeks.</p>
</div>

</div>
@endsection