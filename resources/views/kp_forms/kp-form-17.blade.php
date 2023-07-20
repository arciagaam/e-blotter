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
        <p class="font-bold tracking-[0.35rem]">REPUDIATION</p>
    </div>

    {{-- Add choices --}}
    <div class="flex flex-col">
        <div class="flex flex-col">
            <p class="self-start text-justify indent-4">I/WE hereby repudiate the settlement/agreement for arbitration on the ground that my/our consent was vitiated by:</p>
            <p class="self-start text-justify indent-4">(Check out whichever is applicable)</p>
        </div>

        <div class="flex flex-col ml-4">
            <div class="grid grid-cols-[3rem_1fr]">
                <p>[ ]</p>
                <div class="flex flex-col">
                    <p>Fraud. (State details)
                        <span class="underline">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, sit tempora! Itaque, rem. Ab, minima! Blanditiis, sed consectetur similique at, vel ullam ut provident sunt facilis reprehenderit eos accusantium, commodi molestiae ipsum totam veniam delectus tempora voluptate quaerat aut. Cupiditate nihil, sapiente nemo laboriosam corrupti dignissimos porro unde omnis odit?</span>
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-[3rem_1fr]">
                <p>[ ]</p>
                <div class="flex flex-col">
                    <p>Violence. (State details)
                        <span class="underline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, ad itaque officiis, beatae minima similique cupiditate culpa repudiandae magni aut tempore! Architecto dignissimos quos dolore, commodi blanditiis rerum consequuntur optio mollitia non vel aliquam distinctio minus alias doloribus doloremque impedit in eveniet accusantium quam incidunt itaque. Quasi commodi placeat nesciunt!</span>
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-[3rem_1fr]">
                <p>[ ]</p>
                <div class="flex flex-col">
                    <p>Intimidation. (State details)
                        <span class="underline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae mollitia numquam, quo sit accusamus enim eum beatae laboriosam vel est fugiat aliquam dignissimos commodi nihil qui dolor laudantium veniam provident soluta illo, reiciendis tempore. Sit cum, labore eaque incidunt delectus aperiam quasi voluptatum aliquid quis soluta omnis laborum voluptatem ipsum.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <p class="self-start">This <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span>.</p>

    <div class="flex w-full items-center">
        <div class="flex flex-row gap-2 w-2/4">
            <p>TO:</p>
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->victim->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Complainant/s</p>
            </div>
        </div>

        <div class="flex flex-row gap-2 w-2/4">
            <div class="flex flex-col w-3/4">
                <p class="w-full h-6 border-b border-0 border-black">{{$issuedForm->record->suspect->name ?? ''}}</p>
                <p class="w-full h-6 border-b border-0 border-black"></p>
                <p class="self-start">Respondents/s</p>
            </div>
        </div>
    </div>

    {{-- No value on "at" yet --}}
    <p class="self-start">SUBSCRIBED AND SWORN TO before me this <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span> at _____</p>

    <div class="flex flex-col w-max self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay/Pangkat Chairman/Member</p>
    </div>

    <p class="self-start">Received and filed * this <span class="underline">{{date('jS', strtotime($issuedForm->created_at ?? now()))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at ?? now()))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at ?? now()))}}</span> at _____</p>

    <div class="flex flex-col w-1/4 self-start">
        <p class="w-full h-4 border-b border-0 border-black"></p>
        <p class="self-start">Punong Barangay</p>
    </div>

    <div class="flex flex-col self-start">
        <p class="self-start">
            * Failure to repudiate the settlement or the arbitration agreement within
            the time limits respectively set (ten [10] days from the date of
            settlement and five[5] days from the date of arbitration agreement)
            shall be deemed a waiver of the right to challenge on said grounds.
        </p>
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
@vite('/resources/js/print_window.js')