<style media="print">
    body {
        visibility: hidden;
    }

    body>* {
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

@props(['office' => 'OFFICE OF THE LUPONG TAGAPAMAYAPA'])

<div id="main" class="print-area relative flex flex-col gap-8 font-serif w-[595pt]">
    @empty(!auth()->user()->barangays[0]->logo)
        <img class="absolute inset-2 object-fit w-full max-w-[5rem] aspect-square" id="logo"
            src="{{ asset('assets/' . auth()->user()->barangays[0]->logo) }}">
    @endempty

    <div class="flex flex-col gap-2">
        <div class="flex flex-col items-center">
            <p>Republic of The Philippines</p>
            <p>Province Of Laguna</p>
            <p>Municipality Of Pila</p>
            <p>Barangay {{ auth()->user()->barangays[0]->name ?? '____________' }}</p>
        </div>

        <p class="self-center">{{ strtoupper($office) }}</p>
    </div>

    {{ $slot }}
</div>
