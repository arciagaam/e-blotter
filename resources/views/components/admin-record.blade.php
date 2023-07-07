<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print KP Form</title>
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            text-decoration-skip-ink: none;
            /* border: 1px solid #ff000025; */
        }

        @page {
            height: 842pt;
            width: 595pt;
        }

        html,
        body {
            /* height: 842pt; */
            width: 595pt;
        }
    </style>
</head>

<body>
    <div id="main" class="flex flex-col gap-8">
        {{ $slot }}
    </div>
</body>

</html>
