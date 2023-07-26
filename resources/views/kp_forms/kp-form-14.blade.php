<x-kp-form-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
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
        <p class="font-bold tracking-[0.35rem]">AGREEMENT FOR ARBITRATION</p>
    </div>

    <p class="self-start text-justify">We hereby agree to submit our dispute for arbitration to the Punong
        Barangay/Pangkat ng Tagapagkasundo (Please cross out whichever is
        not applicable) and bind ourselves to comply with the award that may
        be rendered thereon. We have made this agreement freely with a full
        understanding of its nature and consequences.
    </p>

    <p class="self-start">Entered into this <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>

    <div class="flex justify-between w-full gap-16 items-center">
        <div class="flex flex-row gap-2 w-3/4">
            <div class="flex flex-col w-3/4">
                <p class="self-start">Complainant/s</p>
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
            </div>
        </div>

        <div class="flex flex-row gap-4 w-3/4">
            <div class="flex flex-col w-3/4">
                <p class="self-start">Respondents/s</p>
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <p>ATTESTATION</p>
        <p class="self-start text-justify">
            I hereby certify that the foregoing Agreement for Arbitration was
            entered into by the parties freely and voluntarily, after I had explained
            to them the nature and the consequences of such agreement.
        </p>
    </div>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Lupon Chairman</p>
        <p>(Cross out whichever is not applicable.)</p>
    </div>

</x-kp-form-layout>

