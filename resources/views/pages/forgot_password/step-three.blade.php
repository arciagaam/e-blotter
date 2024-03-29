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
        
        <form method="POST" action="{{url('/forgot-password/step-three')}}" class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            <p class="text-lg font-bold">Enter New Password</p>
            @csrf
            <div class="flex flex-col gap-2">
                <div class="form-input-container">
                    <label for="password">New Password</label>
                    <input class="form-input" type="password" name="password" id="password">
                    @error('password')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-input-container">
                    <label for="confirm_password">Confirm New Password</label>
                    <input class="form-input" type="password" name="confirm_password" id="confirm_password">
                    @error('confirm_password')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <button class="btn-filled">Change Password</button>

        </form>  
    </div>
</body>
</html>