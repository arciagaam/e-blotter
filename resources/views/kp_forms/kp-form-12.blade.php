<x-kp-form-layout>
    <div class="flex justify-between w-full gap-16 items-center">
        <div class="flex flex-row gap-2 w-3/4">
            <p>TO:</p>
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->victim->first_name ?? '', $issuedForm->record->victim->middle_name ?? null, $issuedForm->record->victim->last_name ?? '')}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Complainant/s</p>
            </div>
        </div>

        <div class="flex flex-row justify-end gap-2 w-3/4">
            <p>TO:</p>
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->suspect->first_name ?? '', $issuedForm->record->suspect->middle_name ?? null, $issuedForm->record->suspect->last_name ?? '')}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Respondents/s</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE FOR CONSTITUTION OF PANGKAT</p>
        <p class="font-bold tracking-[0.35rem]">(CONCILIATION PROCEEDINGS)</p>
    </div>

    <p class="self-start text-justify">You are hereby required to appear before me on the <span class="underline">{{date('jS', strtotime($tagIds['hearing']))}}</span> day of <span class="underline">{{date('F', strtotime($tagIds['hearing']))}}</span>,
        <span class="underline">{{date('Y', strtotime($tagIds['hearing']))}}</span> at <span class="underline">{{date('h:i', strtotime($tagIds['hearing']))}}</span> o’clock in the <span @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'am'])>morning</span>/<span  @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'pm'])>afternoon</span> for a hearing of
        the above-entitled case</p>

    <p class="self-start">This <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>
    
    <div class="flex flex-col w-max">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Pangkat Chairman</p>
    </div>

    <div>
        <p>Notified this <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>
    </div>

    <div class="flex justify-between w-full gap-16 items-center">
        <div class="flex flex-row gap-2 w-3/4">
            <div class="flex flex-col w-3/4">
                <p class="self-start">Complainant/s</p>
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->victim->first_name ?? '', $issuedForm->record->victim->middle_name ?? null, $issuedForm->record->victim->last_name ?? '')}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
            </div>
        </div>

        <div class="flex flex-row justify-end gap-2 w-3/4">
            <div class="flex flex-col w-3/4">
                <p class="self-end">Respondents/s</p>
                <p class="w-full h-6 border-b border-0 border-black">{{formatName($issuedForm->record->suspect->first_name ?? '', $issuedForm->record->suspect->middle_name ?? null, $issuedForm->record->suspect->last_name ?? '')}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
            </div>
        </div>
    </div>
</x-kp-form-layout>

