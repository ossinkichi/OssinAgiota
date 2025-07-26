<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
                @vite(['resources/css/app.css', 'resources/js/app.js']);
            @else
                <link rel="stylesheet" href="{{ asset('css/tailwind.css') }} "\>
                <script src="{{ asset('js/app.js') }}" defer></script>
            @endif
    <title>@yield('title')</title>
</head>

<body class="bg-red-100">
    <header>
        @include('partials.logo')

        @if (isset($slot) && $slot != '')
            <nav class="{{ $class ?? '' }}">
                {{ $slot }}
            </nav>
        @endif

    </header>


    <main>
        @yield('content')
    </main>
</body>

</html>
