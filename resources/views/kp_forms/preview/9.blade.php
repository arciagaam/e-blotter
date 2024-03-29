<x-kp-form-preview-layout>
    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
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
        <p class="font-bold tracking-[0.35rem]">SUMMONS</p>
    </div>

    <div class="flex flex-row w-full gap-8">
        <p>TO:</p>
        <div class="grid grid-cols-2 w-full gap-x-16">
            <p class="w-full border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-start col-span-2">Respondents</p>
        </div>
    </div>

    <div class="flex flex-col gap-4 items-center">

        <p class="self-start text-justify">You are hereby summoned to appear before me in person, together with your
            witnesses, on the ________________ day of _____________, ____________ at _______________
            o’clock in the morning/afternoon, then and there to answer to a complaint
            made before me, copy of which is attached hereto, for mediation/conciliation
            of your dispute with complainant/s.
        </p>

        <p class="self-start text-justify">You are hereby warned that if you refuse or willfully fail to appear in obedience to this
            summons, you may be barred from filing any counterclaim arising from said complaint.</p>

        <p class="self-start">FAIL NOT or else face punishment as for contempt of court.</p>

        <p class="self-start">This __________ day of __________, __________.</p>

        <div class="flex flex-col w-max self-start">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/<span class="line-through">Lupon Chairman</span></p>
        </div>
    </div>

    <div class="break-before-page"></div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">OFFICER’S RETURN</p>
    </div>

    <div class="flex flex-col gap-4 items-center">
        <p class="self-start">I served this summons upon respondent <span class="underline underline-offset-4"></span> on
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
        </div>
    </div>

    <div class="col-span-2 flex-col self-start text-center">
        <p>{{ str_repeat('_', 32) }}</p>
        <p class="self-center">Officer</p>
    </div>

    <p>Received by Respondent/s representative/s:</p>

    <div class="grid grid-cols-2 w-2/4 gap-8 mt-4">
        <p class="border-t border-black text-center">Signature</p>
        <p class="border-t border-black text-center">Date</p>

        <p class="border-t border-black text-center">Signature</p>
        <p class="border-t border-black text-center">Date</p>
    </div>

</x-kp-form-preview-layout>

