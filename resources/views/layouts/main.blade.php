<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
