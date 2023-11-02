<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E Blotter</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen w-screen !bg-cover !bg-no-repeat flex items-end justify-end p-20" style="background:url({{asset('assets/images/full-bg.png')}})">
    <a href="{{route('login')}}" class="btn-filled h-fit self-end text-3xl py-5 px-10 shadow-sm">Login</a>
</body>
</html>