<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- tailwindcss -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
        @component('components.nav')
            @slot('title', config('app.name'))
            @slot('menus', [
                'Dosen' => '/dosen',
                'Mahasiswa' => '/student',
            ]);
        @endcomponent

        <main class='flex'>
            <!--
            <div class='w-1/5 bg-indigo-800 p-2 text-white'>
                @component('components.sidebar')
                @endcomponent
            </div>
            -->

            <div class='w-full'>
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
