<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MarvelMash</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  @yield('css')

</head>
<body>
  @yield('content')
</body>

<script src="{{ asset('js/app.js') }}"></script>

@yield('js')

</html>
