@php $ctr = 1; @endphp

<x-kp-form-preview-layout office="OFFICE OF THE PUNONG BARANGAY">

    <div class="self-end">
        <p>________________________</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">LIST OF APPOINTED LUPON MEMBERS</p>
    </div>

    <div class="flex flex-col gap-4">    
        <p>Listed hereunder are the duly appointed members of the Lupong
            Tagapamayapa in this Barangay who shall serve as such upon taking
            their oath of office and until a new Lupon is constituted on the third
            year following their appointment.</p>

        <ol class="grid grid-rows-[repeat(10,_minmax(0,_1fr))] grid-flow-col list-decimal list-inside gap-y-2">
            @while ($ctr <= 20)
                <li>
                    <p class="inline-block border-b border-black flex-1 w-5/6"></p>
                </li>
                @php $ctr += 1; @endphp
            @endwhile
        </ol>

        <div class="flex flex-col gap-4 mt-4">
            <div class="flex flex-col w-max">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-start">Punong Barangay</p>
            </div>
    
            <p>ATTESTED:</p>
    
            <div class="flex flex-col w-max">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-start">Barangay/Lupon Secretary</p>
            </div>
        </div>
    
        <div>
            <p>IMPORTANT: The list shall be posted in three (3) conspicuous places
                in the barangay for the duration of the terms of office of those named
                above.
            </p>
            <p>WARNING: Tearing or defacing this notice shall be subject to
                punishment according to law.
            </p>
        </div>
    </div>


</x-kp-form-preview-layout>
