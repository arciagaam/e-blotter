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
        <div class="flex flex-col gap-2">
            <div class="flex flex-col items-center">
                <p>Republic of The Philippines</p>
                <p>Province Of __________</p>
                <p>CITY/MUNICIPALITY OF __________</p>
                <p>Barangay __________</p>
            </div>

            <p class="self-center">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
        </div>

        {{ $slot }}
    </div>
</body>

</html>
