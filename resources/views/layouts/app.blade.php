<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logo-rohul.png') }}" type="image/gif" sizes="16x16">

    @notifyCss

    @vite(['resources/js/app.js'])

    @isset($styles)
    {{ $styles }}
    @endisset
</head>

<body>
    <aside class="sidebar offcanvas-lg offcanvas-start">
        @include('layouts.sidebar')
    </aside>
    <main class="content flex-fill">
        @include('layouts.nav')

        <section class="d-flex flex-column gap-4">
            @if (isset($header))
            {{ $header }}
            @endif

            {{ $slot }}
        </section>
    </main>

    <x:notify-messages />

    @notifyJs

    @isset($scripts)
    {{ $scripts }}
    @endisset

</body>

</html>