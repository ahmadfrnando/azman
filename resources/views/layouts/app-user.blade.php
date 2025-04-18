<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title', 'Pesona Tapteng')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'false',
            theme: {
                extend: {
                    colors: {
                        primary: '#0077B6',
                        secondary: '#4caf50',
                    }
                },
            },
        }
    </script>
    <style>
        .active {
            background-color: #4caf50 !important;
        }
    </style>
</head>

<body class="font-galvji-regular antialiased">
    <div class="flex h-screen">

        @include('partials.user.sidebar')

        @yield('content')
    </div>

</body>

</html>