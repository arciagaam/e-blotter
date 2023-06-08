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

    <div class="flex gap-12">
        <div class="flex flex-1 flex-col gap-10">
            <div class="flex flex-col">
                <input class="w-full border-b-2" type="text">
                <label class="self-end" for="">Complainant/s</label>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <input class="w-full border-b-2" type="text">
                <label class="self-end" for="">Respondent/s</label>
            </div>
        </div>

        <div class="flex-1 flex flex-col gap-10">
            <div class="flex flex-col">
                <div class="flex">
                    <label class="whitespace-nowrap" for="">Barangay Case No.</label>
                    <input class="w-full border-b-2" type="text">
                </div>

                <div class="flex">
                    <label for="">For:</label>
                    <input class="w-full border-b-2" type="text">
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex">
                    <input class="w-full border-b-2" type="text">
                </div>

                <div class="flex">
                    <input class="w-full border-b-2" type="text">
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold">COMPLAINT</p>
        <p>I/WE hereby complain against above named respondent/s for violating my/our
            rights and interests in the following manner:</p>
        <textarea rows="3" class="w-full leading-8 outline-none resize-none notes"></textarea>
    </div>

    <div class="flex flex-col items-center">
        <p>THEREFORE, I/WE pray that the following relief/s be granted to me/us in
            accordance with law and/or equity:</p>
        <textarea rows="3" class="w-full leading-8 outline-none resize-none notes"></textarea>
    </div>

    <div>
        <p>Made this ____ day of _______, 19___.</p>
    </div>

    <div class="flex flex-col w-1/4">
        <input class="w-full border-b-2" type="text">
        <label class="self-start" for="">Complainant/s</label>
    </div>

    <div>
        <p>Received and filed this ________ day of __________, 19____.</p>
    </div>

    <div class="flex flex-col w-max">
        <input class="w-full border-b-2" type="text">
        <label class="self-start" for="">Punong Barangay/Lupon Chairman</label>
    </div>

</x-kp-form-layout>