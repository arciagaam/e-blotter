<x-kp-form-preview-layout>

    <div class="flex flex-row gap-2">
        <p>TO:</p>
        <div class="flex flex-col w-1/5">
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-end">Complainant/s</p>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE OF HEARING</p>
        <p class="font-bold tracking-[0.35rem]">(MEDIATION PROCEEDINGS)</p>
    </div>
    <div class="flex flex-col items-center">
        <p class="self-start text-justify">You are hereby required to appear before me on the ________ day of ________,
           __________ at ____________ o’clock in the morning/afternoon for the hearing of your complaint.</p>
    </div>

    <div>
        <p>This __________ day of __________, __________.</p>
    </div>

    <div class="flex flex-col w-max">
        <p class="w-full h-6 border-b border-0 border-black">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
            <p class="self-start" for="">Punong Barangay/Lupon Chairman</p>
    </div>

    <div>
        <p>Notified this __________ day of __________, __________.</p>
    </div>

    <div class="flex flex-col w-max">
        <p>Complainant/s</p>
        <p class="w-full h-6 border-b border-0 border-black"></p>
        <p class="w-full h-6 border-b border-0 border-black"></p>
    </div>

</x-kp-form-preview-layout>

