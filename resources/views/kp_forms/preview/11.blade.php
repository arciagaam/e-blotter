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
        <p class="font-bold tracking-[0.35rem]">NOTICE FOR CONSTITUTION OF PANGKAT</p>
    </div>
    
    <p class="self-end">_________________________</p>
    <p>TO:____________</p>

    <div class="flex flex-col items-center">
        <p class="self-start text-justify">Notice is hereby given that you have been chosen member of the
            Pangkat ng Tagapagkasundo amicably conciliate the dispute between
            the par in the above-entitled case.</p>
    </div>

    <div class="flex flex-col w-max">
        <p class="w-full h-6 border-b border-0 border-black">{{  auth()->user()->barangays[0]->captain_first_name . " " . auth()->user()->barangays[0]->captain_last_name }}</p>
            <p class="self-start" for="">Punong Barangay/Lupon Chairman</p>
    </div>

    <p class="self-start">Received this __________ day of __________, 20___.</p>
    <div class="flex flex-col">
        <p>_______________</p>
        <p>Pangkat Member</p>
    </div>


</x-kp-form-preview-layout>

