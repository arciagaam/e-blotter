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
            border: 1px solid #ff000025;
        }

        @page {
            height: 842pt;
            width: 595pt;
        }

        html, body {
            height: 842pt;
            width: 595pt;
            
        }

        #main {
            margin: 1cm 1.4cm;
        }
    </style>
</head>
<body>
    <div id="main" class="flex flex-col">
        {{$slot}}
    </div>
</body>
</html>