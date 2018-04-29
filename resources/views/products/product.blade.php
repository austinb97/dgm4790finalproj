<div class="product">
	<!-- insert image -->
	<img src="{{ $product->imgPath }}">

	<h2>{{ $product->make }} {{ $product->model }}</h2>

	<div class="proNameLink">
	<p>Year: {{ $product->year }} | Miles:  {{ $product->miles}} | ${{ $product->price }}</p>
	<div class="proBtn">
		<button><a href="/checkout/{{ $product->id }}">Purchase</a></button>	
	</div>
	</div>

</div>