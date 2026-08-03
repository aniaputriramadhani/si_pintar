<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kemendikdasmen</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

<div class="d-flex">

    @include('layouts.sidebar')

    <main class="content w-100 fade-up">

        @include('layouts.topbar')

        @yield('content')

    </main>

</div>

</body>

</html>