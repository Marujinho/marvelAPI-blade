<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Teste</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  @yield('css')

</head>
<body>
  @yield('content')
</body>

<script src="{{ asset('js/app.js') }}"></script>

@yield('js')

</html>
