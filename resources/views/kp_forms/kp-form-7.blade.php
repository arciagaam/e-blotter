<x-kp-form-layout>

    <div class="flex flex-col gap-2">
        <p>KP Form # 7</p>
    
        <div class="flex flex-col items-center">
            <p>Republic of The Philippines</p>
            <p>Province Of __________</p>
            <p>CITY/MUNICIPALITY OF __________</p>
            <p>Barangay __________</p>
        </div>
    
        <p class="self-center">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
    </div>

    <div class="flex gap-[6rem]">
        <div class="flex flex-1 flex-col gap-10">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-end" for="">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black"></p>
                <p class="self-end" for="">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-[2] flex-col gap-10">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap" for="">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black"></p>
                </div>

                <div class="flex">
                    <p for="">For:</p>
                    <p class="w-full border-b border-0 border-black"></p>
                </div>
            </div>

            <div class="flex flex-col gap-8">
                <div class="flex">
                    <p class="w-full border-b border-0 border-black"></p>
                </div>

                <div class="flex">
                    <p class="w-full border-b border-0 border-black"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold">COMPLAINT</p>
        <p>I/WE hereby complain against above named respondent/s for violating my/our
            rights and interests in the following manner:</p>
        <textarea class="w-full h-fit leading-8 outline-none resize-none underline"></textarea>
    </div>

    <div class="flex flex-col items-center">
        <p>THEREFORE, I/WE pray that the following relief/s be granted to me/us in
            accordance with law and/or equity:</p>
        <textarea rows="3" class="w-full leading-8 outline-none resize-none underline"></textarea>
    </div>

    <div>
        <p>Made this ____ day of _______, 19___.</p>
    </div>

    <div class="flex flex-col w-1/4">
        <p class="w-full border-b border-0 border-black"></p>
        <p class="self-start" for="">Complainant/s</p>
    </div>

    <div>
        <p>Received and filed this ________ day of __________, 19____.</p>
    </div>

    <div class="flex flex-col w-max">
        <p class="w-full border-b border-0 border-black"></p>
        <p class="self-start" for="">Punong Barangay/Lupon Chairman</p>
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