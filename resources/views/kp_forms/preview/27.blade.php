<x-kp-form-preview-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">_________________</p>
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1"></p>
                </div>

                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE OF EXECUTION</p>
    </div>

    <div class="flex flex-col">
        <p class="self-start text-justify indent-4">
            You are hereby required to appear before me on ______________ day of ____________, _____________, at ____________ o’clock in the morning/afternoon/evening for the hearing of the motion for execution, copy of which is
            attached hereto, filed by ______________, __________________ (Name of complainant/s/respondent/s)
        </p>
        <span class="indent-4 break-all">{{str_repeat('_', 256)}}</span>

        <p>The said settlement/award is now final and executory;</p>
        <p>
            WHEREAS, the party obliged ______________
            (name) has not
            complied voluntarily with the aforestated amicable settlement/
            arbitration award, within the period of five (5) days from the date of
            hearing on the motion for execution;
            NOW, THEREFORE, in behalf of the Lupong Tagapamayapa and by
            virtue of the powers vested in me and the Lupon by the Katarungang
            Pambarangay Law and Rules, I shall cause to be realized from the
            goods and personal property of _____________ (name of party
            obliged) the sum of _________________ (state amount of settlement
            or award) upon in the said amicable settlement [or adjudged in the said
            arbitration award], unless voluntary compliance of said settlement or
            award shall have been made upon receipt hereof.
        </p>
    </div>

    <div class="break-inside-avoid">
        <p class="self-start">Signed this ______________ day of ____________, _________________.</p>

        <div class="flex flex-row gap-6 w-fit">
            <div class="flex flex-col">
                <p class="w-full h-6 border-b border-0 border-black">_________________</p>
                <p class="self-center">Punong Barangay/s</p>
            </div>
        </div>

        <div class="flex flex-col">
            <p>Copy furnished:</p>
            <div class="flex flex-row w-full gap-16 items-center">
                <div class="flex flex-col w-1/4">
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-start">Complainant/s</p>
                </div>

                <div class="flex flex-col w-1/4">
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-start">Respondents/s</p>
                </div>
            </div>
        </div>
    </div>
</x-kp-form-preview-layout>


