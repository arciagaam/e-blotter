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
        
        <form method="POST" action="{{url('/forgot-password/step-two')}}" class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            <p class="text-lg font-bold">OTP sent!</p>
            <p class="text-sm">If you have a valid email, you should receive a 4 digit code.</p>

            @csrf
            <div class="flex flex-col gap-2">
                <div class="form-input-container">
                    <label for="token">Enter token</label>
                    <input max="4" class="form-input" type="text" name="token" id="token">
                    @error('token')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror

                    @if (session()->get('error'))
                        <p class="text-xs text-red-500 italic">{{session()->get('error')}}</p>
                    @endif

                </div>
            </div>

            <button class="btn-filled">Continue</button>

        </form>  
    </div>
</body>
</html>