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

    <nav class="h-16 flex items-center gap-8 justify-end px-3 bg-project-blue-dark">
        <div class="flex flex-row gap-4 text-white">
            <a href="#">Home</a>
            <a href="#about-us">About</a>
            <a href="#contact-us">Contact Us</a>
        </div>
        <a href="{{ route('login') }}" class="btn-filled h-fit">Login</a>
    </nav>

    <div class="relative flex h-[90vh] overflow-hidden" id="#">
        <img class="absolute top-0 left-0 w-full h-full object-fill xl:object-cover"
            src="{{ asset('assets/images/bg.png') }}" alt="">
        <img class="absolute left-0 bottom-0 translate-x-[-25%] translate-y-[35%] z-10 h-auto w-full"
            src="{{ asset('assets/images/hall.png') }}" alt="">
        <img class="absolute top-[10%] left-[10%] z-10 h-1/4 w-auto" src="{{ asset('assets/images/pila-logo.png') }}"
            alt="">

        <div class="absolute right-[10%] top-[10%] flex flex-col items-end text-project-blue-darker">
            <h2 class="text-7xl font-bold">BARANGAY</h2>
            <p class="text-2xl mr-2">E-BLOTTER SYSTEM</p>
        </div>
    </div>

    <div class="flex flex-col text-center xl:text-left gap-8 xl:flex-row xl:gap-0 min-h-[100vh] items-center justify-center w-full bg-[#FAFAFA] px-20" id="about-us">
        <div class="flex w-full xl:w-1/2 items-center justify-center">
            <img class="w-3/4" src="{{ asset('assets/images/e-blotter-banner.png') }}" alt="">
        </div>

        <div class="w-full xl:w-1/2">
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
    </div>

    <div class="flex flex-col-reverse xl:flex-row gap-8 min-h-[100vh] items-center justify-center w-full bg-[#d8e7f8] px-20" id="contact-us">
        <div class="flex flex-col gap-6 w-full xl:w-1/2">
            <h2 class="font-bold text-center xl:text-left text-6xl">Contact Us</h2>

            {{-- Should send at the email below --}}
            {{-- eblottercs02@gmail.com --}}

            <form action="{{ route('contact-us') }}" method="post">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="form-input-container w-full">
                        <label for="name">Name</label>
                        <input class="form-input" type="text" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-input-container w-full">
                        <label for="email">Email</label>
                        <input class="form-input" type="text" name="email" id="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-input-container w-full">
                        <label for="message">Message</label>
                        <textarea class="form-input resize-none" name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn-filled w-1/4" type="submit">Send</button>
                </div>
            </form>
        </div>

        <div class="flex w-full xl:w-1/2 items-center justify-center">
            <img class="w-3/4" src="{{ asset('assets/images/contact-us-icon.png') }}" alt="">
        </div>
    </div>


</body>

</html>
