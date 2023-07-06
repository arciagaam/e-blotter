<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
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
        <p class="font-bold tracking-[0.35rem]">NOTICE OF HEARING</p>
        <p class="font-bold tracking-[0.35rem]">(RE: MOTION FOR EXECUTION)</p>
    </div>

    <div class="flex justify-between w-full gap-16 items-center">
        <div class="flex flex-row gap-2 w-3/4">
            <p>TO:</p>
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Complainant/s</p>
            </div>
        </div>

        <div class="flex flex-row justify-end gap-2 w-3/4">
            <p>TO:</p>
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Respondents/s</p>
            </div>
        </div>
    </div>

    <p class="self-start text-justify indent-4">
        You are hereby required to appear before me on _________ day of
        _________ 19____ at _________ o’clock in the morning/afternoon/
        evening for the hearing of the motion for execution, copy of which is
        attached hereto, filed by ____________ (Name of complainant/s/
        respondent/s)
    </p>

    <div class="flex flex-col w-1/4">
        <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
        <p class="self-center">Date</p>
    </div>

    <p class="self-start">This <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span>.</p>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Lupon Chairman</p>
    </div>

    <p class="self-start">Notified this <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span>.</p>

    <div class="flex flex-row gap-6 w-fit">
        <div class="flex flex-col">
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
            <p class="self-center">(Signature)</p>
            <p class="self-center">Complainant/s</p>
        </div>

        <div class="flex flex-col">
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
            <p class="self-center">(Signature)</p>
            <p class="self-center">Respondent/s</p>
        </div>
    </div>
</x-kp-form-layout>

@vite('/resources/js/print_window.js')