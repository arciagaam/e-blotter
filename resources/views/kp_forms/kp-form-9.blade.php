<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{ $issuedForm->record->victim->name }}</p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{ $issuedForm->record->suspect->name }}</p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{ $issuedForm->id }}</p>
                </div>

                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{ $issuedForm->record->case }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">SUMMONS</p>
    </div>

    <div class="flex flex-row w-full gap-8">
        <p>TO:</p>
        <div class="grid grid-cols-2 w-full gap-x-16">
            <p class="w-full border-b border-0 border-black">{{ $issuedForm->record->suspect->name }}</p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-start col-span-2">Respondents</p>
        </div>
    </div>

    <div class="flex flex-col gap-4 items-center">

        <p class="self-start text-justify">You are hereby summoned to appear before me in person, together with your
            witnesses, on the <span class="underline">{{ date('jS', strtotime($relatedForms['8']['hearing'])) }}</span>
            day of
            <span class="underline">{{ date('F', strtotime($relatedForms['8']['hearing'])) }}</span>, <span
                class="underline">{{ date('Y', strtotime($relatedForms['8']['hearing'])) }}</span> at <span
                class="underline">{{ date('h:i', strtotime($relatedForms['8']['hearing'])) }}</span>
            o’clock in the <span @class([
                'underline' => date('a', strtotime($relatedForms['8']['hearing'])) == 'am',
            ])>morning</span>/<span
                @class([
                    'underline' => date('a', strtotime($relatedForms['8']['hearing'])) == 'pm',
                ])>afternoon</span>, then and there to answer to a complaint
            made before me, copy of which is attached hereto, for mediation/conciliation
            of your dispute with complainant/s.
        </p>

        <p class="self-start text-justify">You are hereby warned that if you refuse or willfully fail to appear in obedience to this
            summons, you may be barred from filing any counterclaim arising from said complaint.</p>

        <p class="self-start">FAIL NOT or else face punishment as for contempt of court.</p>

        <p class="self-start">This <span class="underline">{{date('jS', strtotime($relatedForms['7']['created_at']))}}</span> day of <span class="underline">{{date('F', strtotime($relatedForms['7']['created_at']))}}</span>, <span class="underline">{{date('Y', strtotime($relatedForms['7']['created_at']))}}</span>.</p>

        <div class="flex flex-col w-max self-start">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Chairman</p>
        </div>
    </div>

    <div class="break-before-page"></div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">OFFICER’S RETURN</p>
    </div>

    <div class="flex flex-col gap-4 items-center">
        <p class="self-start">I served this summons upon respondent <span class="underline underline-offset-4">{{ $issuedForm->record->suspect->name }}</span> on
            the ______ day of ______________, ____ by:</p>
        <p class="self-start">(Write name/s of respondent/s before mode by which he/they was/were
            served.)</p>
        <div class="grid grid-cols-2 w-full gap-x-12">
            <p class="col-span-2">Respondent/s</p>

            <div class="flex flex-row w-full">
                <p class="w-full h-5 border-b border-black"></p>
                <p class="">1.</p>
            </div>
            <p>handing to him/them said summons in person, or</p>

            <div class="flex flex-row w-full">
                <p class="w-full h-5 border-b border-black"></p>
                <p class="">2.</p>
            </div>
            <p>handing to him/them said summons and he/they refused to receive it, or</p>

            <div class="flex flex-row w-full">
                <p class="w-full h-5 border-b border-black"></p>
                <p class="">3.</p>
            </div>
            <p>leaving said summons at his/their dwelling with __________ (name) a person of suitable age and discretion
                residing therein, or</p>

            <div class="flex flex-row w-full">
                <p class="w-full h-5 border-b border-black"></p>
                <p class="">4.</p>
            </div>
            <p>leaving said summons at his/their office/place of business with ________, ( name) a competent person in
                charge thereof.</p>

            <div class="col-span-2 flex-col self-start">
                <p class="w-1/4 border-b border-0 border-black">{{ $tagIds['officer'] }}</p>
                <p class="self-start">Officer</p>
            </div>
        </div>
    </div>

    <p>Received by Respondent/s representative/s:</p>

    <div class="grid grid-cols-2 w-2/4 gap-8 mt-4">
        <p class="border-t border-black text-center">Signature</p>
        <p class="border-t border-black text-center">Date</p>

        <p class="border-t border-black text-center">Signature</p>
        <p class="border-t border-black text-center">Date</p>
    </div>

</x-kp-form-layout>

<script type="text/javascript">
    window.addEventListener('load', () => {
        document.querySelectorAll("textarea").forEach(textarea => {
            if (textarea.scrollHeight > textarea.clientHeight) {
                textarea.style.height = textarea.scrollHeight + 'px';
            }
        });
    });
</script>

@vite('/resources/js/print_window.js')
