<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body>
	<div class="container">
	@include('partials.headerNav')

	@yield('content')

	@include('partials.footer')
	</div>
</body>
</html>