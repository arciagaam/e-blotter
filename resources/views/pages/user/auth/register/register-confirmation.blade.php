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
    <div class="flex items-center justify-center min-h-screen bg-project-blue-default">
        <form method="POST" action="{{ url('/authenticate') }}"
            class="flex flex-col w-[30%] gap-5 shadow-md py-10 px-6 rounded-md bg-white">
            @csrf
            <p class="text-lg font-bold">Barangay Officer Registration</p>
            <p class="">Your account needs to be verified by the ABC President. An email will be sent to you if the account is
                successfully verified.</p>
            <a class="btn-filled" href="{{ url('/') }}">I Understand</a>
        </form>
    </div>
</body>

</html>
