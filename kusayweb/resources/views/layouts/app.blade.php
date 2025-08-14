<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','KUSAY TECH')</title>
  <meta name="description" content="@yield('meta_description','Soluciones tecnológicas que optimizan tus operaciones y reducen costos')">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-dvh bg-white text-slate-800">
  @include('layouts._navbar')

  <main class="min-h-[70dvh]">
    @yield('content')
  </main>

  @include('layouts._footer')
</body>
</html>
