<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - 飞机订票系统</title>

        @include('layouts.head')

    </head>

    <body>
        @include('layouts.header')

        <div class="container mt-5">
            @yield('body')
        </div>

        @include('layouts.footer')
        @include('layouts.foot')
    </body>

</html>