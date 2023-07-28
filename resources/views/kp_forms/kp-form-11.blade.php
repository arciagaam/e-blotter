<x-kp-form-layout :body="false">
    @if (isset($tagIds['lupon']))
        @foreach ($tagIds['lupon'] as $lupon)
            <div class="flex flex-col gap-2">
                <div class="flex flex-col items-center">
                    <p>Republic of The Philippines</p>
                    <p>Province Of Laguna</p>
                    <p>CITY/MUNICIPALITY OF __________</p>
                    <p>Barangay <span
                            class="underline underline-offset-4">{{ auth()->user()->barangays[0]->name }}</span></p>
                </div>

                <p class="self-center">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
            </div>

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
                <p class="font-bold tracking-[0.35rem]">NOTICE FOR CONSTITUTION OF PANGKAT</p>
            </div>
            
            <p class="self-end">{{ date('F j, Y', strtotime($issuedForm->created_at)) }}</p>
            <p>TO:<span class="underline underline-offset-4">{{ $lupon }}</span></p>

            <div class="flex flex-col items-center">
                <p class="self-start text-justify">Notice is hereby given that you have been chosen member of the
                    Pangkat ng Tagapagkasundo amicably conciliate the dispute between
                    the par in the above-entitled case.</p>
            </div>

            <div class="flex flex-col w-max">
                <p class="w-full h-4 border-b border-0 border-black"></p>
                <p class="self-start">Punong Barangay/Lupon Chairman</p>
            </div>

            <p class="self-start">Received this __________ day of __________, 20___.</p>
            <div class="flex flex-col w-max">
                <p class="border-b border-0 border-black w-full">{{ $lupon }}</p>
                <p>Pangkat Member</p>
            </div>

            <div class="break-after-page"></div>
        @endforeach
    @else
        <div class="flex flex-col gap-2">
            <div class="flex flex-col items-center">
                <p>Republic of The Philippines</p>
                <p>Province Of Laguna</p>
                <p>CITY/MUNICIPALITY OF __________</p>
                <p>Barangay <span
                        class="underline underline-offset-4">{{ auth()->user()->barangays[0]->name }}</span></p>
            </div>

            <p class="self-center">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
        </div>

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
            <p class="font-bold tracking-[0.35rem]">NOTICE FOR CONSTITUTION OF PANGKAT</p>
        </div>
        
        <p class="self-end">_______________________</p>
        <p>TO:___________________</p>

        <div class="flex flex-col items-center">
            <p class="self-start text-justify">Notice is hereby given that you have been chosen member of the
                Pangkat ng Tagapagkasundo amicably conciliate the dispute between
                the par in the above-entitled case.</p>
        </div>

        <div class="flex flex-col w-max">
            <p class="w-full h-4 border-b border-0 border-black"></p>
            <p class="self-start">Punong Barangay/Lupon Chairman</p>
        </div>

        <p class="self-start">Received this __________ day of __________, 20___.</p>
        <div class="flex flex-col">
            <p>_______________</p>
            <p>Pangkat Member</p>
        </div>
    @endif
</x-kp-form-layout>

