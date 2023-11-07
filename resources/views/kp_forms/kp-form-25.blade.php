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
        <p class="font-bold tracking-[0.35rem]">MOTION FOR EXECUTION</p>
    </div>
    
    <div class="flex flex-col">
        <ol class="list-decimal list-inside">
            <li>On 
                @if (isset($relatedForms[15]))
                    <span class="underline">{{$relatedForms[15]['created_at']->format('Y-m-d')}}</span>
                @elseif (isset($relatedForms[16]))
                    <span class="underline">{{$relatedForms[16]['created_at']->format('Y-m-d')}}</span>
                @else
                    {{ str_repeat('_', 12) }}
                @endif 
                the parties in this case signed an
                amicable settlement/received the arbitration award rendered by the
                Lupon/Chairman/Pangkat ng Tagapagkasundo;
            </li>
            
            <li>The period of ten (10) days from the above-stated date has expired
                without any of the parties filing a sworn statement of repudiation of the
                settlement before the Lupon Chairman a petition for nullification of the
                arbitration award in court; and
            </li>
            
            <li>The amicable settlement/arbitration award is now final and
                executory.
            </li>
        </ol>
    
        <p>WHEREFORE, Complainant/s/Respondent/s request that the
            corresponding writ of execution be issued by the Lupon Chairman in
            this case.
        </p>
    </div>

    <div class="flex flex-col w-1/4">
        <p class="w-full h-6 border-b border-0 border-black"></p>
        <p class="self-center">Date</p>
    </div>

    <div class="flex flex-col w-[35%]">
        <p class="w-full h-6 border-b border-0 border-black"></p>
        <p class="self-center">Complainant/s Respondent/s</p>
    </div>


</x-kp-form-layout>