<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body class="alt-menu sidebar-noneoverflow">
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
