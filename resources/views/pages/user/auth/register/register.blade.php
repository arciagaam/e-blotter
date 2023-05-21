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
    <div class="flex items-center justify-center min-h-screen">
        <form method="POST" action="{{ url('/authenticate') }}"
            class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            @csrf

            <p class="text-lg font-bold">Barangay Officer Register</p>
            <div class="flex flex-col gap-2">
                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-1">
                        <label for="first_name">First Name <span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="first_name" id="first_name">
                        @error('first_name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container flex-1">
                        <label for="last_name">Last Name <span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="last_name" id="last_name">
                        @error('last_name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-input-container">
                    <label for="username">Username <span class="form-input-required">*</span></label>
                    <input class="form-input" type="text" name="username" id="username">
                    @error('username')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-1">
                        <label for="password">Password <span class="form-input-required">*</span></label>
                        <input class="form-input" type="password" name="password" id="password">
                        @error('password')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="form-input-container flex-1">
                        <label for="confirm_password">Confirm Password <span class="form-input-required">*</span></label>
                        <input class="form-input" type="confirm_password" name="confirm_password" id="confirm_password">
                        @error('confirm_password')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-1">
                        <label for="email">Email <span class="form-input-required">*</span></label>
                        <input class="form-input" type="email" name="email" id="email">
                        @error('email')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="form-input-container flex-1">
                        <label for="contact_number">Contact Number <span class="form-input-required">*</span></label>
                        <input class="form-input" type="contact_number" name="contact_number" id="contact_number">
                        @error('contact_number')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-input-container">
                    <label for="barangay">Barangay <span class="form-input-required">*</span></label>
                    <input class="form-input" type="text" name="barangay" id="barangay">
                    @error('barangay')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-input-container">
                    <label for="barangay">City / Municipality <span class="form-input-required">*</span></label>
                    <input class="form-input" type="text" name="barangay" id="barangay">
                    @error('barangay')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-input-container">
                    <label for="barangay">Province <span class="form-input-required">*</span></label>
                    <input class="form-input" type="text" name="barangay" id="barangay">
                    @error('barangay')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex w-full justify-between">
                @error('invalid')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                @enderror
                <a class="self-end underline" href="{{ url('/') }}">Already have a Barangay?</a>
            </div>

            <button class="btn-filled">REGISTER</button>

        </form>
    </div>
</body>

</html>
