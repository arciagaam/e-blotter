<x-kp-form-preview-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1"></p>
                </div>
                
                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">SUBPOENA</p>
    </div>

    <div class="flex gap-5">
        <p>TO:</p>
        <div class="grid grid-cols-2 gap-5 w-full">
            <p class="w-full border-b border-0 border-black">{{$tagIds['witness_1'] ?? ''}}</p>
            <p class="w-full border-b border-0 border-black">{{$tagIds['witness_2'] ?? ''}}</p>
            <p class="w-full border-b border-0 border-black">{{$tagIds['witness_3'] ?? ''}}</p>
            <p class="w-full border-b border-0 border-black">{{$tagIds['witness_4'] ?? ''}}</p>
        </div>
    </div>

    <p class="self-center">Witnesses</p>

    <p class="self-start text-justify">You are hereby required to appear before me on the ________ day of ________,
       __________ at ____________ o’clock in the morning/afternoon, then and there to testify
        in the hearing of the above-captioned case.</p>

    <p class="self-start">This ________ day of __________, _________.</p>
    
    <div class="flex flex-col w-max self-start">
        <p class="w-full h-6 border-b border-0 border-black">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
            <p class="self-start" for="">Punong Barangay/Lupon Chairman</p>
        <p>(Cross out whichever is not applicable.)</p>
    </div>
</x-kp-form-preview-layout>

