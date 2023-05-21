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
    <div class="flex items-center justify-center min-h-screen text-project-gray-default bg-project-blue-dark">
        
        <div class="flex flex-col min-w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            <p class="text-lg font-bold">Success!</p>
            <p>Your password has been changed successfully.</p>
            <a class="btn-filled" href="{{ url('/') }}">Proceed to Login</a>
        </div>  
    </div>
</body>
</html>