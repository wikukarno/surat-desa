<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @include('includes.home.style')
</head>
<body class="hold-transition login-page">
    @yield('content')
    @include('includes.home.script')
</body>
</html>
