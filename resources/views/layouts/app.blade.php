<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/listuser.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Page Heading -->
        @include('layouts.navigation')
        <!-- Page Content -->
        <main>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="https://kit.fontawesome.com/f8393116de.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/listuser.js') }}"></script>
    @livewireScripts

    <script>
        function loadHTML(id, filename) {
            let xhttp;
            let element = document.getElementById(id);
            let file = filename;

            if (file) {

                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            element.innerHTML = this.responseText;
                        }
                        if (this.status == 404) {
                            element.innerHTML = "<h1>Page not found.</h1>";
                        }
                    }
                }
                xhttp.open("GET", `template/${file}`, true);
                xhttp.send();
                return;
            }
        }
    </script>

</body>



</html>
