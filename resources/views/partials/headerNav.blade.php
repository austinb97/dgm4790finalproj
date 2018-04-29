<div class="header">

	<div class="headerTitle">
		<h1><a class="mainTitle" href="/">BESPOKE AUTO</a></h1>
	</div>

	<div class="headerNav">
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<span class="navDivider">|</span>

				<li><a href="/customerPage">Customers</a></li>
				<span class="navDivider">|</span>

				<li><a href="/admin">Admin</a></li>
				<span class="navDivider">|</span>

				@if(!Auth::check())
				<li><a href="/login">Login</a></li>
				@endif

				@if(Auth::check())
				<li><a href="/login">{{ Auth::user()->name }}</a></li>
				@endif

			</ul>
		</nav>
	</div>

</div>