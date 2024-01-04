<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trello</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d76290626c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>--}}
    <script src="{{ mix('/js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"--}}
{{--            crossorigin="anonymous"></script>--}}

</head>
<body style="" class="my-container">
<main id="app">
    <div>
        @yield('content')
    </div>
</main>
</body>
</html>

<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        overflow-y: overlay !important;
        overflow-x: hidden !important;
    }

    .my-container::-webkit-scrollbar {
        width: 10px;
    }
    .my-container::-webkit-scrollbar-thumb {
        background: #888;
    }
</style>
