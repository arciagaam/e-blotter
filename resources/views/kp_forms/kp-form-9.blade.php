<x-kp-form-layout>

    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black"></p>
                </div>

                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black"></p>
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
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-start col-span-2">Respondents</p>
        </div>
    </div>

    <div class="flex flex-col gap-4 items-center">
        <p class="self-start">You are hereby summoned to appear before me in person, together with your
            witnesses, on the _______ day of _________, 19___ at ____________
            o’clock in the morning/afternoon, then and there to answer to a complaint
            made before me, copy of which is attached hereto, for mediation/conciliation
            of your dispute with complainant/s.</p>
        <p class="self-start">You are hereby warned that if you refuse or willfully fail to appear in
            obedience to this summons, you may be barred from filing any counterclaim
            arising from said complaint.</p>
        <p class="self-start">FAIL NOT or else face punishment as for contempt of court.</p>
        <p class="self-start">This _______ day of ____________, 19___.</p>
        <div class="flex flex-col w-max self-start">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Chairman</p>
        </div>
    </div>

</x-kp-form-layout>

<script type="text/javascript">
    textareas = document.querySelectorAll("textarea").forEach(textarea => {
        textarea.addEventListener('input', autoResize, false);
    });

    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }
</script>
