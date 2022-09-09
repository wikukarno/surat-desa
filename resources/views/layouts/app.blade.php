<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  @stack('prepend-style')
  @include('includes.dashboard.style')
  @stack('addon-style')
</head>
	<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
		<div class="wrapper">
			@include('includes.dashboard.header')
			@include('includes.dashboard.sidebar')

			<!-- Content -->
			<div class="content-wrapper">
				<div class="content pt-3">
					@yield('content')
				</div>
			</div>
			@include('includes.dashboard.footer')
		</div>

		@include('components/modal-logout')
		@include('sweetalert::alert')
		@stack('prepend-script')
		@include('includes.dashboard.script')
		@stack('addon-script')
	</body>
</html>
