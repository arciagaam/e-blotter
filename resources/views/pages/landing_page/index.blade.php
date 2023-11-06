<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E Blotter</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-project-blue-dark">

    <nav class="h-16 flex items-center px-3 bg-project-blue-dark">
        <a href="{{route('login')}}" class="btn-filled h-fit ml-auto">Login</a>
    </nav>
    
    <div class="relative flex h-[85vh] bg-black overflow-hidden">
        
        <img class="absolute top-0 left-0 object-cover" src="{{asset('assets/images/bg.png')}}" alt="">
        <img class="absolute left-0 bottom-0 translate-x-[-25%] translate-y-[35%] z-10 h-auto w-full" src="{{asset('assets/images/hall.png')}}" alt="">
        <img class="absolute top-[10%] left-[10%] z-10 h-1/4 w-auto" src="{{asset('assets/images/pila-logo.png')}}" alt="">

        <div class="absolute right-[10%] top-[10%] flex flex-col items-end text-project-blue-darker">
            <h2 class="text-7xl font-bold">BARANGAY</h2>
            <p class="text-2xl mr-2">E-BLOTTER SYSTEM</p>
        </div>

    </div>

    <div class="min-h-[100vh] bg-green-200">
        ABOUT US
    </div>

    <div class="min-h-[100vh] bg-green-400">
        SERVICES
    </div>

    <div class="min-h-[100vh] bg-green-600">
        CONTACT US
    </div>


</body>
</html>