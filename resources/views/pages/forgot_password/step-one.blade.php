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
    <div class="flex items-center justify-center min-h-screen text-project-gray-default bg-project-blue-default">
        
        <form method="POST" action="{{url('/forgot-password/step-one')}}" class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            <p class="text-lg font-bold">Forgot Password</p>
            <p class="text-sm">Please enter your email address to receive a new OTP</p>

            @csrf
            <div class="flex flex-col gap-2">
                <div class="form-input-container">
                    <label for="email">Email</label>
                    <input class="form-input" type="email" name="email" id="email">
                    @error('email')
                        <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror

                    @if(session('error'))
                        <p class="text-xs text-red-500 italic">{{session('error')}}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-5 self-end">
                <a href="{{route('login')}}" class="btn-outline">Cancel</a>
                <button class="btn-filled">Send Verification Code</button>

            </div>

        </form>  
    </div>
</body>
</html>