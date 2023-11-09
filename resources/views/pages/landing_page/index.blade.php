<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E Blotter</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-[#FAFAFA]">

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

    <div class="flex min-h-[100vh] items-center justify-center w-full bg-[#FAFAFA] px-20">
        <div class="flex w-1/2 items-center justify-center">
            ICON HERE
        </div>

        <div class="flex flex-col gap-6 w-1/2">
            <h2 class="font-bold text-4xl">About Us</h2>

            <div class="flex flex-col gap-3">
                <p class="text-justify">E-Blotter System with the capability to Speech-to-Text Transcription for selected Barangay in Municipality of Pila empowers and enhances the barangay justice and improve the accuracy and completeness of blotter reports.</p>
                <p class="text-justify">Blotters were provided in every barangay in a Municipality and their administration is under their control. This serves as a crucial reference for local officials, law enforcement to track and address issues, maintain community safety, and ensure accountability.</p>
            </div>
        </div>
    </div>

    <div class="flex min-h-[100vh] items-center justify-center w-full bg-[#FAFAFA] px-20">
        <div class="flex flex-col gap-6 w-1/2">
            <h2 class="font-bold text-4xl">Contact Us</h2>

            <div class="flex flex-col gap-3">
                Contact Us Form
            </div>
        </div>

        <div class="flex w-1/2 items-center justify-center">
            ICON HERE
        </div>
    </div>


</body>
</html>