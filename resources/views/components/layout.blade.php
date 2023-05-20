<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const BASE_PATH = '{{ url("/") }}';
    </script>

    <title>E-Blotter</title>

    @vite('resources/css/app.css')
    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')
</head>

<body class="font-inter">
    <x-admin-navbar />
    {{-- <x-popup_warning /> --}}
    
    <div class="relative ml-16 flex flex-col h-screen overflow-auto py-7 px-10 text-project-gray-default bg-project-gray-light gap-5 z-0">
        {{ $slot }}
    </div>

</body>

</html>