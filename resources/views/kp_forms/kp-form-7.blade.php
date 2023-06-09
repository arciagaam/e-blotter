<x-kp-form-layout>

    <div class="flex flex-row justify-between gap-24">
        <div class="flex flex-col gap-6 w-2/5">
            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->victim->name}}</p>
                <p class="self-end">Complainant/s</p>
            </div>

            <p class="ml-auto w-fit">--- against ---</p>

            <div class="flex flex-col">
                <p class="w-full border-b border-0 border-black">{{$issuedForm->record->suspect->name}}</p>
                <p class="self-end">Respondent/s</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 w-3/5">
            <div class="flex flex-col">
                <div class="flex">
                    <p class="whitespace-nowrap">Barangay Case No.</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->id}}</p>
                </div>
                
                <div class="flex">
                    <p>For:</p>
                    <p class="w-full border-b border-0 border-black indent-1">{{$issuedForm->record->case}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">COMPLAINT</p>
    </div>
    <div class="flex flex-col items-center">
        <p class="self-start">I/WE hereby complain against above named respondent/s for violating my/our
            rights and interests in the following manner:</p>
        <textarea class="w-full h-full outline-none resize-none underline text-justify indent-4" readonly>{{$tagIds['complain']}}</textarea>
    </div>

    <div class="flex flex-col items-center">
        <p class="self-start">THEREFORE, I/WE pray that the following relief/s be granted to me/us in
            accordance with law and/or equity:</p>
        <textarea class="w-full h-full outline-none resize-none underline text-justify indent-4" readonly>{{$tagIds['relief']}}</textarea>
    </div>

    <div class="break-inside-avoid flex flex-col gap-4">
        <div>
            <p>Made this <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span></p>
        </div>
    
        <div class="flex flex-col w-1/4">
            <p class="w-full border-b border-0 border-black">{{$issuedForm->record->victim->name}}</p>
            <p class="self-start" for="">Complainant/s</p>
        </div>

        {{-- {{dd(date('jS', strtotime($issuedForm->created_at)))}} --}}
    
        <div>
            <p>Received and filed this <span class="underline">{{date('jS', strtotime($issuedForm->created_at))}}</span> day of <span class="underline">{{date('F', strtotime($issuedForm->created_at))}}</span>, <span class="underline">{{date('Y', strtotime($issuedForm->created_at))}}</span>.</p>
        </div>
    
        <div class="flex flex-col w-max">
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-start" for="">Punong Barangay/Lupon Chairman</p>
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

        window.print();
        setTimeout(window.close, 500); 	
    });
</script>
