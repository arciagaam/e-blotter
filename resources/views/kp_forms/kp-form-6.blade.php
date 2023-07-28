@php $ctr = 1; @endphp

<x-kp-form-layout>

    <div class="self-end">
        <p>________________________</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">WITHDRAWAL OF APPOINTMENT</p>
    </div>

    <div class="flex flex-col gap-4">
        <div class="flex flex-row">
            <p>To:
                <span class="underline">____________</span>
            </p>
        </div>

        <p>After due hearing and with the concurrence of a majority of all the
            Lupong Tagapamayapa members of this Barangay, your appointment
            as member thereof is hereby withdrawn effective upon receipt hereof,
            on the following ground/s:</p>

        <p>
            [ ]
            <span class="inline">incapacity to discharge the duties of your office as shown by <span
                    class="break-all">__________________________________________</span></span>
        </p>

        <p>
            [ ]
            <span class="inline">unsuitability by reason of <span class="break-all">__________________________________________</span>
            (Check whichever is applicable and detail or specify the act/s or omission/s constituting the ground/s for withdrawal.)</span>
        </p>

        <div class="flex flex-col w-max mt-4">
            <p class="w-full border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Chairman</p>
        </div>

        <p>CONFORME (Signatures):</p>
        <ol class="grid grid-rows-[repeat(6,_minmax(0,_1fr))] grid-flow-col list-decimal list-inside gap-y-2 w-3/4">
            @while ($ctr <= 11)
                <li>
                    <p class="inline-block border-b border-black flex-1 w-5/6"></p>
                </li>
                @php $ctr += 1; @endphp
            @endwhile
        </ol>

        <p>Received this __________ day of _____________, ______.</p>

        <div class="flex flex-col w-max mt-4">
            <p class="w-full border-b border-0 border-black"></p>
            <p class="self-start">Signature</p>
        </div>
    </div>

</x-kp-form-layout>
