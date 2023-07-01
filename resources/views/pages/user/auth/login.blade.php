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
        <form method="POST" action="{{ route('guest.authenticate') }}"
            class="flex flex-col justify-center items-center lg:col-start-2 gap-5 py-10 px-6 bg-white">
            @csrf

            <div class="flex flex-col gap-4 w-3/4">
                <p class="text-lg font-bold">Barangay Officer Login</p>
                
                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <label for="username">Username</label>
                        <input class="form-input" type="text" name="username" id="username">
                        @error('username')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="form-input-container">
                        <label for="password">Password</label>
                        <input class="form-input" type="password" name="password" id="password">
                        @error('password')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="form-input-container">
                        <label for="login_role_id">Role</label>
                        <select class="form-input" name="login_role_id" id="login_role_id">
                            @foreach ($loginRoles as $loginRole)
                                <option value="{{ $loginRole->id }}">{{ ucfirst($loginRole->name) }}</option>
                            @endforeach
                        </select>
                        @error('login_role_id')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
    
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
