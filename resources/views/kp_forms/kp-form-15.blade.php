<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{formatName($issuedForm->record->victim->first_name ?? '', $issuedForm->record->victim->middle_name ?? null, $issuedForm->record->victim->last_name ?? '')}}</p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{formatName($issuedForm->record->suspect->first_name ?? '', $issuedForm->record->suspect->middle_name ?? null, $issuedForm->record->suspect->last_name ?? '')}}</p>
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
        <p class="font-bold tracking-[0.35rem]">ARBITRATION AWARD</p>
    </div>

    <div class="flex flex-col">
        <p>After hearing the testimonies given and careful examination of the
            evidence presented in this case, award is hereby made as follows:
        </p>

        <textarea class="w-full self-center outline-none resize-none underline text-justify indent-4 underline-offset-2 decoration-0" readonly>{{$tagIds['arbitration_award']}}</textarea>
    </div>

    <p class="self-start">Made this <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Pangkat Chairman *</p>
    </div>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Member</p>
    </div>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Member</p>
    </div>

    <p class="self-start">ATTESTED:</p>

    <div class="flex flex-col">
        <div class="flex flex-col w-max self-start">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Secretary **</p>
        </div>
        <p>* To be signed by either, whoever made the arbitration award.</p>
        <p>** To be signed by the Punong Barangay if the award is made by the
            Pangkat Chairman, and by the Lupon Secretary if the award is made by
            the Punong Barangay.</p>
    </div>



</x-kp-form-layout>
<script type="text/javascript"> 
    window.addEventListener('load', () => {
        document.querySelectorAll("textarea").forEach(textarea => {
            if(textarea.scrollHeight > textarea.clientHeight) {
                textarea.style.height = textarea.scrollHeight + 'px';
            }
        });
    });
</script>

