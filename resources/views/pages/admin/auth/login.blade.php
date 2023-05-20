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
    <div class="flex flex-col min-h-screen w-full">
        <form method="POST" action="{{url('/authenticate')}}" class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            @csrf
            <div class="flex flex-col gap-2">
                <div class="form-input-container">
                    <label for="username">Username</label>
                    <input class="form-input" type="text" name="username" id="username">
                    @error('username')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-input-container">
                    <label for="password">Password</label>
                    <input class="form-input" type="password" name="password" id="password">
                    @error('password')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="flex w-full justify-between">
                @error('invalid')
                <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
                <a class="self-end" href="{{url('/forgot-password')}}">Forgot Password?</a>
            </div>

            <button class="py-2 w-full self-center bg-project-yellow font-bold rounded-md">LOG IN</button>

        </form>  
    </div>
</body>
</html>