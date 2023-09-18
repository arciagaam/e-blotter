<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Blotter System</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid grid-cols-1 lg:grid-cols-2 w-screen min-h-screen bg-project-blue-default">

        <div class="hidden lg:flex flex-col gap-4 w-full h-full justify-center items-center p-20">
            <img src="{{ asset('assets/register_illust.svg') }}" alt="Register illustration">
            <p class="text-6xl text-white font-black text-center">E-Blotter</p>
        </div>

        <form method="POST" action="{{ url('/register') }}"
            class="flex flex-col justify-center items-center lg:col-start-2 gap-5 py-10 px-6 bg-white" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col gap-4 w-3/4">
                <div>
                    <p class="lg:hidden text-4xl font-bold">E-Blotter</p>
                    <p class="italic lg:text-2xl lg:font-bold lg:not-italic">Barangay Officer Register</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div>
                        <p class="opacity-50 italic">Barangay Captain</p>
                        <div class="flex flex-row gap-2">
                            <div class="form-input-container flex-1">
                                <label for="first_name">First Name <span
                                        class="form-input-required">*</span></label>
                                <input class="form-input" type="text" name="first_name" id="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-input-container flex-1">
                                <label for="last_name">Last Name <span
                                        class="form-input-required">*</span></label>
                                <input class="form-input" type="text" name="last_name" id="last_name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-input-container">
                        <label for="username">Username <span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="username" id="username"
                            value="{{ old('username') }}">
                        @error('username')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="flex flex-row gap-2">
                        <div class="form-input-container flex-1">
                            <label for="password">Password <span class="form-input-required">*</span></label>
                            <input class="form-input" type="password" name="password" id="password">
                            @error('password')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <label for="confirm_password">Confirm Password <span
                                    class="form-input-required">*</span></label>
                            <input class="form-input" type="password" name="confirm_password" id="confirm_password">
                            @error('confirm_password')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="form-input-container flex-1">
                            <label for="email">Email <span class="form-input-required">*</span></label>
                            <input class="form-input" type="email" name="email" id="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <label for="contact_number">Contact Number <span
                                    class="form-input-required">*</span></label>
                            <input class="form-input" type="contact_number" name="contact_number" id="contact_number"
                                value="{{ old('contact_number') }}">
                            @error('contact_number')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container">
                        <label for="name">Barangay<span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <label for="logo">Logo<span class="form-input-required">*</span></label>
                        <input type="file" name="logo" id="logo" class="w-fit file:mr-4 file:py-2 file:px-4 file:rounded-full file:text-sm file:font-semibold file:btn-outline file:cursor-pointer">
                        @error('logo')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex w-full flex-col gap-2">
                    @error('invalid')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                    <a class="underline" href="{{ url('/') }}">Already registered your Barangay?</a>
                </div>

                <button class="btn-filled">REGISTER</button>
            </div>

        </form>
    </div>
</body>

</html>
