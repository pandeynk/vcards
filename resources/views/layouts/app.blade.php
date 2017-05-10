@include('layouts.header')
@include('layouts.sidebar')
	<div class="content-wrapper" id="app" style="padding-top:50px;">
		@include('layouts.message')
		@yield('content')
	</div>
@include('layouts.footer')

