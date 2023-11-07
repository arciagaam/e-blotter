<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->victim->first_name ?? '', $issuedForm->record->victim->middle_name ?? null, $issuedForm->record->victim->last_name ?? '')}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->suspect->first_name ?? '', $issuedForm->record->suspect->middle_name ?? null, $issuedForm->record->suspect->last_name ?? '')}}</p>
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->record->id ?? ''}}</p>
                </div>

                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->record->case ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">CERTIFICATION TO FILE ACTION</p>
    </div>
    
    <div class="flex flex-col">
        <p>This is to certify that:</p>
        <ol class="list-decimal list-inside">
            <li>
                There was a personal confrontation between the parties before the Punong
                Barangay but mediation failed;
            </li>
            
            <li>
                The Punong Barangay set the meeting of the parties for the constitution of
                the Pangkat;
            </li>
            
            <li>
                The respondent willfully failed or refused to appear without justifiable
                reason at the conciliation proceedings before the Pangkat; and
            </li>

            <li>
                Therefore, the corresponding complaint for the dispute may now be filed in
                court/government office.
            </li>
        </ol>

    </div>

    <div class="flex flex-col w-[35%]">
        <p class="w-full h-6 border-b border-0 border-black"></p>
        <p class="self-center">Pangkat Secretary</p>
    </div>
    <div class="flex flex-col w-[35%]">
        <p>Attested:</p>
    </div>
    <div class="flex flex-col w-[35%]">
        <p class="w-full h-6 border-b border-0 border-black"></p>
        <p class="self-center">Pangkat Chairman</p>
    </div>


</x-kp-form-layout>