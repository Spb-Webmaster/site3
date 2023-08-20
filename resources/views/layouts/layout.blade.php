<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-body-tertiary">

@include('include.nav')

@yield('content')

<script src="/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>

