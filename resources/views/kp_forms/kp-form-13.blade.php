<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->victim->name}}</p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->suspect->name}}</p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->record->id}}</p>
                </div>
                
                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->record->case}}</p>
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

    <p class="self-start text-justify">You are hereby required to appear before me on the <span class="underline">{{date('jS', strtotime($tagIds['hearing']))}}</span> day of <span class="underline">{{date('F', strtotime($tagIds['hearing']))}}</span>,
        <span class="underline">{{date('Y', strtotime($tagIds['hearing']))}}</span> at <span class="underline">{{date('h:i', strtotime($tagIds['hearing']))}}</span> o’clock in the <span @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'am'])>morning</span>/<span  @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'pm'])>afternoon</span>, then and there to testify
        in the hearing of the above-captioned case.</p>

    <p class="self-start">This <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>
    
    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Lupon Chairman</p>
        <p>(Cross out whichever is not applicable.)</p>
    </div>
</x-kp-form-layout>
@vite('/resources/js/print_window.js')
