<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const BASE_PATH = '{{ url('/') }}';
    </script>

    <title>E-Blotter</title>

    @vite('resources/css/app.css')
    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')
</head>

<body class="font-inter">

    @if (request()->is('admin*'))
        <x-admin-navbar />
    @else
        <x-user-navbar />
    @endif


    <div class="w-screen h-screen flex fixed top-0 left-0 z-[9999] px-8 py-4 pointer-events-none">
        @if (session('alert'))
            <x-alert
                title="{{ session('alert')['title'] }}"
                description="{{ session('alert')['description'] }}"
                type="{{ session('alert')['type'] ?? 'information' }}"
            />
        @endif
    </div>

    <div
        class="relative ml-[15rem] flex flex-col h-screen overflow-auto py-7 px-10 text-project-gray-default bg-project-gray-light gap-5 z-0">
        {{ $slot }}
    </div>

    @vite('resources/js/modal.js')
    @vite('resources/js/alert.js')
</body>

</html>
