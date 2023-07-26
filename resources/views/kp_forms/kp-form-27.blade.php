<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{ $issuedForm->record->victim->name ?? '' }}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{ $issuedForm->record->suspect->name ?? '' }}</p>
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{ $issuedForm->record->id ?? '' }}</p>
                </div>

                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{ $issuedForm->record->case ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE OF EXECUTION</p>
    </div>

    <div class="flex flex-col">
        <p class="self-start text-justify indent-4">
            {{-- Hearing date --}}
            {{-- Missing evening span --}}
            You are hereby required to appear before me on <span
                class="underline">{{ date('jS', strtotime($tagIds['hearing'])) }}</span> day of <span
                class="underline">{{ date('F', strtotime($tagIds['hearing'])) }}</span>, <span
                class="underline">{{ date('Y', strtotime($tagIds['hearing'])) }}</span>, at <span
                class="underline">{{ date('h:i', strtotime($tagIds['hearing'])) }}</span> o’clock in the <span
                @class([
                    'underline' => date('a', strtotime($tagIds['hearing'])) == 'am',
                ])>morning</span>/<span @class([
                    'underline' => date('a', strtotime($tagIds['hearing'])) == 'pm',
                ])>afternoon</span>/
            evening for the hearing of the motion for execution, copy of which is
            attached hereto, filed by <span
                @class(['underline' => isset($issuedForm->record->victim->name)])>{{ $issuedForm->record->victim->name ?? str_repeat('_', 12) }}</span>,
            <span @class(['underline' => isset($issuedForm->record->suspect->name)])>{{ $issuedForm->record->suspect->name ?? str_repeat('_', 12) }}</span>
            (Name of complainant/s/
            respondent/s)
        </p>
        <textarea class="w-full h-full outline-none resize-none underline text-justify indent-4" readonly>{{ $tagIds['relief'] ?? '' }}</textarea>
        <p>The said settlement/award is now final and executory;</p>
        <p>
            WHEREAS, the party obliged <span
                @class(['underline' => isset($issuedForm->record->suspect->name)])>{{ $issuedForm->record->suspect->name ?? str_repeat('_', 12) }}</span>
            (name) has not
            complied voluntarily with the aforestated amicable settlement/
            arbitration award, within the period of five (5) days from the date of
            hearing on the motion for execution;
            NOW, THEREFORE, in behalf of the Lupong Tagapamayapa and by
            virtue of the powers vested in me and the Lupon by the Katarungang
            Pambarangay Law and Rules, I shall cause to be realized from the
            goods and personal property of <span
                @class(['underline' => isset($issuedForm->record->suspect->name)])>{{ $issuedForm->record->suspect->name ?? str_repeat('_', 12) }}</span>
            (name of party
            obliged) the sum of <span @class(['underline' => isset($tagIds['relief'])])
                class="underline">{{ $tagIds['relief'] ?? str_repeat('_', 12) }}</span> (state amount of settlement
            or award) upon in the said amicable settlement [or adjudged in the said
            arbitration award], unless voluntary compliance of said settlement or
            award shall have been made upon receipt hereof.
        </p>
    </div>

    <div class="break-inside-avoid">
        <p class="self-start">Signed this <span
                class="underline">{{ date('jS', strtotime($issuedForm->created_at ?? now())) }}</span> day of <span
                class="underline">{{ date('F', strtotime($issuedForm->created_at ?? now())) }}</span>, <span
                class="underline">{{ date('Y', strtotime($issuedForm->created_at ?? now())) }}</span>.</p>

        <div class="flex flex-row gap-6 w-fit">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">{{ $issuedForm->record->suspect->name ?? '' }}</p>
                <p class="self-center">Punong Barangay/s</p>
            </div>
        </div>

        <div class="flex flex-col">
            <p>Copy furnished:</p>
            <div class="flex flex-row w-full gap-16 items-center">
                <div class="flex flex-col w-1/4">
                    <p class="w-full h-6 border-b border-0 border-black">{{ $issuedForm->record->victim->name ?? '' }}
                    </p>
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-start">Complainant/s</p>
                </div>

                <div class="flex flex-col w-1/4">
                    <p class="w-full h-6 border-b border-0 border-black">{{ $issuedForm->record->suspect->name ?? '' }}
                    </p>
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-start">Respondents/s</p>
                </div>
            </div>
        </div>
    </div>
</x-kp-form-layout>


