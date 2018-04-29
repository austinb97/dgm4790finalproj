@extends('partials.master')

@section('content')
<div class="content">
    <h1>Welcome</h1>
    
    <div class="products">
    @foreach($products as $product)
        @include('products.product')
    @endforeach
    <div class="clearFix"></div>
    </div>

</div>
@endsection

