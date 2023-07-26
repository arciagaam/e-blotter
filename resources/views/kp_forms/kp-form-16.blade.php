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
        <p class="font-bold tracking-[0.35rem]">AMICABLE SETTLEMENT</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="self-start">We, complainant/s and respondent/s in the above-captioned case, do hereby
            agree to settle our dispute as follows:</p>
        <textarea class="w-full h-fit outline-none resize-none underline decoration-0">{{$tagIds['settlement']}}</textarea>
        <p class="self-start">and bind ourselves to comply honestly and faithfully with the above terms of
            settlement.</p>
        <p class="self-start">Entered into this ______ day of __________, 19_______.</p>
    </div>

    <div class="flex flex-row gap-24">
        <div class="flex-1">
            <p class="self-start col-span-2">Complainant/s</p>
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
        </div>
        <div class="flex-1">
            <p class="self-start col-span-2">Respondent/s</p>
            <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="tracking-[0.35rem]">ATTESTATION</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="self-start">I hereby certify that the foregoing amicable settlement was entered into by the
            parties freely and voluntarily, after I had explained to them the nature and
            consequence of such settlement.</p>
        <div class="flex flex-col w-max self-start">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Chairman</p>
        </div>
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

