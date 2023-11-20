<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Blotter System</title>
    @vite('resources/css/app.css')
    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="flex items-center justify-center lg:grid-cols-2 w-screen overflow-hidden min-h-screen !bg-cover !bg-no-repeat !bg-center bg-project-blue-default" style="background: url({{asset('assets/images/login-bg.png')}})">

        {{-- <div class="hidden lg:flex flex-col gap-4 w-full h-full justify-center items-center">
            <img class="h-1/2" src="{{ asset('assets/login_illust.svg') }}" alt="Documents Illustration">
            <p class="text-6xl text-white font-black text-center">E-Blotter</p>
        </div> --}}

        <form method="POST" action="{{ route('guest.authenticate') }}"
            class="h-fit w-1/2 self-center flex flex-col justify-center items-center lg:col-start-2 gap-5 py-10 px-6 bg-white rounded-lg shadow-md translate-y-[20%]">
            @csrf
            <div class="flex flex-col gap-10 w-3/4">
                <div>
                    <p class="lg:hidden text-4xl font-bold">E-Blotter</p>
                    <p class="italic lg:text-2xl lg:font-bold lg:not-italic">Login</p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <div class="form-input-container">
                            <label for="username">Username</label>
                            <input class="form-input" type="text" name="username" id="username">
                            @error('username')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <select class="form-input" name="username" id="username">
                            <option value="">-- SELECT YOUR BARANGAY --</option>
                            <optgroup label="Admin">
                                @foreach ($adminUsers as $adminUser)
                                    <option value="{{ $adminUser->username }}">{{ formatUsername($adminUser->username) }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="User">
                                @foreach ($users as $user)
                                    <option value="{{ $user->username }}">{{ $user->barangay_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('username')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="form-input-container">
                        <label for="password">Password</label>
                        <div class="relative">
                            <input class="form-input w-full" type="password" name="password" id="password" />
                            <button type="button" id="show-password-btn" class="absolute top-0 right-0 h-full flex justify-center items-center">
                                <box-icon size="0.5" class="p-1 flex justify-center items-center h-full" name='show'></box-icon>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- <div class="form-input-container">
                        <label for="login_role_id">Role</label>
                        <select class="form-input" name="login_role_id" id="login_role_id">
                            @foreach ($loginRoles as $loginRole)
                                <option value="{{ $loginRole->id }}">{{ ucfirst($loginRole->name) }}</option>
                            @endforeach
                        </select>
                        @error('login_role_id')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    @if (session()->has('error'))
                        <p class="text-xs text-red-500 italic">{{ session()->get('error') }}</p>
                    @endif
                </div>

                <div class="flex flex-col w-full justify-between">
                    @error('invalid')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                    <a class="btn-plain" href="{{ url('/forgot-password') }}">Forgot Password?</a>
                    <a class="btn-plain" href="{{ url('/register') }}">Register your Barangay</a>
                </div>

                <button class="btn-filled">Login</button>
            </div>

        </form>
    </div>
</body>

</html>

<script>
    const toggleShowPasswordButton = document.querySelector('#show-password-btn');

    const parent = toggleShowPasswordButton.parentNode;
    const input = parent.querySelector('input[type="password"]');

    toggleShowPasswordButton.addEventListener('click', (e) => {
        if (input.getAttribute("type") === "password") {
            input.setAttribute("type", "text");
        } else {
            input.setAttribute("type", "password");
        }
    });
</script>