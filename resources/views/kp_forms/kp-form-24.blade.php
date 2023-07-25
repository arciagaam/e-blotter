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
        <p class="font-bold tracking-[0.35rem]">CERTIFICATION TO BAR COUNTERCLAIM</p>
    </div>

    <p class="self-start text-justify indent-4">
        This is to certify that after prior notice and hearing, the respondent/s
        __________________ (name) and _________________ (name) have
        been found to have willfully failed or refused to appear without
        justifiable reason before the Punong Barangay/Pangkat ng
        Tagapagkasundo and therefore respondent/s is/are barred from filing
        his/their counterclaim (if any) arising from the complaint in court/
        government office.
        {{-- You are hereby required to appear before me/the Pangkat on the <span class="underline">{{date('jS', strtotime($tagIds['hearing']))}}</span> day of <span class="underline">{{date('F', strtotime($tagIds['hearing']))}}</span>, <span class="underline">{{date('Y', strtotime($tagIds['hearing']))}}</span>, at <span class="underline">{{date('h:i', strtotime($tagIds['hearing']))}}</span> o’clock in the
        <span @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'am'])>morning</span>/<span  @class(['underline' => date('a', strtotime($tagIds['hearing'])) == 'pm'])>afternoon</span> to explain why you failed to appear for mediation/
        conciliation scheduled on <span class="underline">{{date('F j, Y', strtotime($relatedForms['8']['hearing']))}}</span> and why your
        complaint should not be dismissed, a certificate to bar the filing of your
        action on court/government office should not be issued, and contempt
        proceedings should not be initiated in court for willful failure or refusal
        to appear before the Punong Barangay/Pangkat ng Tagapagkasundo. --}}
    </p>

    <p class="self-start">This <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span>.</p>

    <div class="flex flex-col gap-6 w-fit">
        <div class="flex flex-col">
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
            <p>Lupon Secretary/Pangkat Secretary</p>
        </div>

        <p>Attested:</p>

        <div class="flex flex-col">
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
            <p>Lupon Chairman/Pangkat Chairman</p>
        </div>
    </div>
</x-kp-form-layout>

@vite('/resources/js/print_window.js')