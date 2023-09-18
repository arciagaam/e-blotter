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

@props(['body' => true, 'office' => 'OFFICE OF THE LUPONG TAGAPAMAYAPA'])

<body>
    <div id="main" class="flex flex-col gap-8">
        @if ($body)
            <div class="flex flex-col gap-2">
                <div class="flex flex-col items-center">
                    <p>Republic of The Philippines</p>
                    <p>Province Of Laguna</p>
                    <p>Municipality Of Pila</p>
                    <p>Barangay {{ auth()->user()->barangays[0]->name ?? "____________" }}</p>
                </div>

                <p class="self-center">{{ strtoupper($office) }}</p>
            </div>
        @endif

        {{ $slot }}
    </div>
</body>

</html>

@vite('/resources/js/print_window.js')