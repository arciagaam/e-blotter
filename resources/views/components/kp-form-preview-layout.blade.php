<style media="print">
    body {
        visibility: hidden;
    }

    body > * {
        margin-left: -4rem;
        overflow: unset !important;
    }

    #main {
        visibility: visible;
        position: absolute;
        top: 0;
        left: 0;
        margin-left: -4rem;
    }
</style>

<div id="main" class="print-area flex flex-col gap-8 font-serif w-[595pt]">
    <div class="flex flex-col gap-2">
        <div class="flex flex-col items-center">
            <p>Republic of The Philippines</p>
            <p>Province Of Laguna</p>
            <p>CITY/MUNICIPALITY OF ______________</p>
            <p>Barangay ___________________</p>
        </div>

        <p class="self-center">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
    </div>

    {{ $slot }}
</div>