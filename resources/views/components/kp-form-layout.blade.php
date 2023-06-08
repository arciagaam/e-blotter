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
            /* border: 1px solid #ff000025; */
            -webkit-print-color-adjust: exact;   /* Chrome, Safari 6 – 15.3, Edge */
            color-adjust: exact;                 /* Firefox 48 – 96 */
            print-color-adjust: exact;           /* Firefox 97+, Safari 15.4+ */
        }

        @page {
            height: 842pt;
            width: 595pt;
        }

        html,
        body {
            height: 842pt;
            width: 595pt;

        }

        #main {
            margin: 1cm 1.4cm;
        }

        /* https://stackoverflow.com/questions/9468153/textarea-with-horizontal-rule */
        /* .notes {
            background-image:
                repeating-linear-gradient(#ffffff, #ffffff 28px, #000000 28px, #ffffff 29px);
        } */
        .notes {
            /* background-attachment: local; */
            background-image:
                repeating-linear-gradient(#ffffff, #ffffff 28px, #000000 28px, #ffffff 29px);
        }
    </style>
</head>

<body>
    <div id="main" class="flex flex-col gap-4">
        {{ $slot }}
    </div>
</body>

</html>
