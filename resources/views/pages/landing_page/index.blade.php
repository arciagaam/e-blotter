<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E Blotter</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex flex-col font-red">
    <div class="w-screen h-screen flex fixed top-0 left-0 z-[9999] px-8 py-4 pointer-events-none">
        @if (session('alert'))
            <x-alert
                title="{{ session('alert')['title'] }}"
                description="{{ session('alert')['description'] }}"
                type="{{ session('alert')['type'] ?? 'information' }}"
            />
        @endif
    </div>

    <nav class="h-16 flex items-center gap-8 justify-end px-3 bg-project-blue-dark">
        <div class="flex flex-row gap-4 text-white">
            <a href="#">Home</a>
            <a href="#about-us">About</a>
            <a href="#contact-us">Contact Us</a>
        </div>
        {{-- <a href="{{ route('login') }}" class="btn-filled h-fit">Login</a> --}}
    </nav>

    <div class="flex flex-col gap-28 bg-[#FAFAFA]">

        {{-- <div class="flex p-20 gap-20">
            <div class="flex flex-col rounded-lg overflow-clip shadow-sm min-w-[40vw]">
                <img class="z-10 object-cover h-full w-auto" src="{{ asset('assets/images/hall_2.png') }}" alt="">
            </div>
            <div class="flex flex-col gap-10">
                <div class="flex gap-5">
                    <div class="flex aspect-square">
                        <img class="object-contain" src="{{ asset('assets/images/pila-logo.png') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-1 text-[#1e1e1e]">
                        <h2 class="text-9xl font-bold">BARANGAY</h2>
                        <h3 class="text-4xl font-medium self-end">E-BLOTTER SYSTEM</h3>
                    </div>
                </div>
                <hr>
                <p>A <b>web application</b>  that enables <b>efficient digital recording</b> and tracking of various incidents, enhancing transparency and collaboration among barangay officials. With <b>real-time data entry and visual summary of data</b>, it streamlines the process for a <b>safer and more organized barangay.</b> <a href="#about-us" class="underline underline-offset-3">Read more here.</a></p>
        
                <hr>
                <div class="flex flex-col items-end gap-2">
                    <a href="{{route('register')}}" class="btn-filled">Register your Barangay</a>
                    <a href="{{route('login')}}" class="underline underline-offset-3 text-black/50 text-sm">Already have an account? Login here</a>
                </div>
            </div>
        </div> --}}

        <div class="relative flex h-[calc(100vh-4rem)] !bg-cover" style="background: url({{asset('assets/images/hall_2.png')}})">

            <div class="flex flex-col items-center justify-center absolute inset-0 bg-gradient-to-t from-black/70 to-transparent gap-10">
                <div class="flex flex-col gap-1 items-center text-center text-white shadow-lg">
                    <h2 class="text-9xl font-bold shadow-md">BARANGAY</h2>
                    <h3 class="text-4xl font-medium shadow-md">E-BLOTTER SYSTEM</h3>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{route('login')}}" class="btn-filled text-2xl py-4 px-8">Login</a>
                </div>
            </div>

        </div>

        <div class="relative flex flex-col text-center xl:text-left gap-8 xl:flex-row xl:gap-0 items-center justify-center w-fit self-center mx-20 px-20 rounded-lg ring-2 ring-gray-200 py-20 shadow-sm" id="about-us">
            <div class="w-full z-[1] xl:w-1/2">
                <div class="xl:px-12 flex flex-col gap-6">
                    <h2 class="font-bold text-6xl">About Us</h2>
        
                    <div class="flex flex-col text-lg gap-3">
                        <p class="text-justify"><b>E-Blotter System</b> with the capability to <b>Speech-to-Text Transcription</b> for selected Barangay in Municipality of Pila empowers and enhances the barangay justice and <b>improve the accuracy and completeness of blotter reports.</b></p>
                            <p class="text-justify">Blotters were provided in every barangay in a Municipality and their administration is under their control. This serves as a crucial reference for local officials, law enforcement to track and address issues, maintain community safety, and ensure accountability.</p>
                            </div>
                </div>
            </div>
        
            <div class="flex z-[1] w-full xl:w-1/2 items-center justify-center">
                <img class="w-1/2" src="{{ asset('assets/images/e-blotter-banner.png') }}" alt="">
            </div>
            {{-- <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover" src="{{ asset('assets/images/about-us.png') }}" alt=""> --}}
        </div>

        <div class="relative flex flex-col-reverse xl:flex-row gap-8 items-center justify-center w-full px-20 pb-20" id="contact-us">
            
            <div class="z-[1] flex w-full xl:w-1/2 items-center justify-center">
                <img class="w-3/4 scale-x-[-1]" src="{{ asset('assets/images/contact-us-animation.gif') }}" alt="">
            </div>

            <div class="z-[1] flex flex-col gap-6 w-full xl:w-1/2">
                <div class="flex flex-col gap-2">
                    <h2 class="font-bold text-center xl:text-left text-6xl">Contact Us</h2>
                    <p>Got any questions? leave us a message.</p>
                </div>
    
                <form action="{{ route('contact-us') }}" method="post">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div class="form-input-container w-full">
                            <label for="name">Name</label>
                            <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-input-container w-full">
                            <label for="email">Email</label>
                            <input class="form-input" type="text" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-input-container w-full">
                            <label for="messageBody">Message</label>
                            <textarea class="form-input resize-none" name="messageBody" id="messageBody" cols="30" rows="10">{{ old('messageBody') }}</textarea>
                            @error('messageBody')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <button class="btn-filled w-1/4" type="submit">Send</button>
                    </div>
                </form>
            </div>
    
    
            {{-- <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover" src="{{ asset('assets/images/contact-us.png') }}" alt=""> --}}
        </div>
    </div>


    
    {{-- <div class="relative flex h-[90vh] overflow-hidden" id="#">
        <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover" src="{{ asset('assets/images/bg.png') }}" alt="">
        <img class="absolute left-0 bottom-0 translate-x-[-25%] translate-y-[35%] z-10 h-auto w-full" src="{{ asset('assets/images/hall.png') }}" alt="">
        <img class="absolute top-[10%] left-[10%] z-10 h-1/4 w-auto" src="{{ asset('assets/images/pila-logo.png') }}" alt="">

        <div class="absolute right-[10%] top-[10%] flex flex-col items-end text-project-blue-darker">
            <h2 class="text-7xl font-bold">BARANGAY</h2>
            <p class="text-2xl mr-2">E-BLOTTER SYSTEM</p>
        </div>
    </div>

    <div class="relative flex flex-col text-center xl:text-left gap-8 xl:flex-row xl:gap-0 min-h-[100vh] items-center justify-center w-full bg-[#FAFAFA] px-20" id="about-us">
        <div class="flex z-[1] w-full xl:w-1/2 items-center justify-center">
            <img class="w-3/4" src="{{ asset('assets/images/e-blotter-banner.png') }}" alt="">
        </div>

        <div class="w-full z-[1] xl:w-1/2">
            <div class="xl:px-12 flex flex-col gap-6">
                <h2 class="font-bold text-6xl">About Us</h2>

                <div class="flex flex-col text-lg gap-3">
                    <p class="text-justify">E-Blotter System with the capability to Speech-to-Text Transcription for
                        selected Barangay in Municipality of Pila empowers and enhances the barangay justice and improve
                        the accuracy and completeness of blotter reports.</p>
                    <p class="text-justify">Blotters were provided in every barangay in a Municipality and their
                        administration is under their control. This serves as a crucial reference for local officials,
                        law enforcement to track and address issues, maintain community safety, and ensure
                        accountability.</p>
                </div>
            </div>
        </div>

        <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover" src="{{ asset('assets/images/about-us.png') }}" alt="">
    </div>

    <div class="relative flex flex-col-reverse xl:flex-row gap-8 min-h-[100vh] items-center justify-center w-full bg-[#d8e7f8] px-20" id="contact-us">
        <div class="z-[1] flex flex-col gap-6 w-full xl:w-1/2">
            <h2 class="font-bold text-center xl:text-left text-6xl">Contact Us</h2>

            Should send at the email below
            eblottercs02@gmail.com

            <form action="{{ route('contact-us') }}" method="post">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="form-input-container w-full">
                        <label for="name">Name</label>
                        <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-input-container w-full">
                        <label for="email">Email</label>
                        <input class="form-input" type="text" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-input-container w-full">
                        <label for="messageBody">Message</label>
                        <textarea class="form-input resize-none" name="messageBody" id="messageBody" cols="30" rows="10">{{ old('messageBody') }}</textarea>
                        @error('messageBody')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn-filled w-1/4" type="submit">Send</button>
                </div>
            </form>
        </div>

        <div class="z-[1] flex w-full xl:w-1/2 items-center justify-center">
            <img class="w-3/4" src="{{ asset('assets/images/contact-us-icon.png') }}" alt="">
        </div>

        <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover" src="{{ asset('assets/images/contact-us.png') }}" alt="">
    </div> --}}

    @vite('resources/js/alert.js')
</body>

</html>
