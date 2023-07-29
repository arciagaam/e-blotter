<x-kp-form-layout>

    <div class="flex flex-row gap-2">
        <p>TO:</p>
        <div class="flex flex-col w-1/5">
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-end">Complainant/s</p>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE OF HEARING</p>
        <p class="font-bold tracking-[0.35rem]">(MEDIATION PROCEEDINGS)</p>
    </div>
    <div class="flex flex-col items-center">
        <p class="self-start text-justify">You are hereby required to appear before me on the <span class="underline">{{date('jS', strtotime($tagIds['hearing']))}}</span> day of <span class="underline">{{date('F', strtotime($tagIds['hearing']))}}</span>,
            <span class="underline">{{date('Y', strtotime($tagIds['hearing']))}}</span> at <span class="underline">{{date('h:i', strtotime($tagIds['hearing']))}}</span> o’clock in the <span @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'am'])>morning</span>/<span  @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'pm'])>afternoon</span> for the hearing of your
            complaint.</p>
    </div>

    <div>
        <p>This <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('jS', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span> day of <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('F', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span>, <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('Y', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span>.</p>
    </div>

    <div class="flex flex-col w-max">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Lupon Chairman</p>
    </div>

    <div>
        <p>Notified this <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('jS', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span> day of <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('F', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span>, <span @class(['underline' => isset($relatedForms['7'])])>{{ isset($relatedForms['7']) ? date('Y', strtotime($relatedForms['7']['created_at'])) : str_repeat('_', 6)}}</span>.</p>
    </div>

    <div class="flex flex-col w-max">
        <p>Complainant/s</p>
        <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
        <p class="w-full h-6 border-b border-0 border-black"></p>
    </div>

</x-kp-form-layout>

