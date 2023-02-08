<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
         <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
<div id="app">
{{-- <Home /> --}}
<Employe />
</div>

<script src="{{ asset('js/app.js') }}">

</script>
  {{-- <link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
         <link rel="stylesheet" href="{{ asset('js/bootstrap.js') }}"> --}}
    </body>
</html>
