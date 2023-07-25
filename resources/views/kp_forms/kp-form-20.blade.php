<x-kp-form-layout :body="false">
    @if (count($relatedForms))
        @foreach ($relatedForms['17'] as $key => $value)
            @if ($key == 'fraud' || $key == 'violence' || $key == 'intimidation')
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
                    <p class="font-bold tracking-[0.35rem]">CERTIFICATION TO FILE ACTION</p>
                </div>
                
                <div class="flex flex-col">
                    <p>This is to certify that:</p>
                    <ol class="list-decimal list-inside">
                        <li>
                            There has been a personal confrontation between the parties before the
                            Punong Barangay/Pangkat ng Tagapagkasundo;
                        </li>
                        
                        <li>A settlement was reached;</li>
                        
                        {{-- Settlements --}}
                        <li>
                            The settlement has been repudiated in a statement sworn to before the
                            Punong Barangay by <span class="underline">{{ $key }}</span> on ground of <span class="underline">{{ $value }}</span>; and 
                        </li>
            
                        <li>
                            Therefore, the corresponding complaint for the dispute may now be filed in
                            court/government office.
                        </li>
                    </ol>
            
            
                </div>
            
                <div class="flex flex-col w-1/4">
                    <p class="self-start">This <span class="underline">{{date('jS', strtotime(now()))}}</span> day of <span class="underline">{{date('F', strtotime(now()))}}</span>, <span class="underline">{{date('Y', strtotime(now()))}}</span>.</p>
                </div>
            
                <div class="flex flex-col w-[35%]">
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-center">Lupon Secretary</p>
                </div>
                <div class="flex flex-col w-[35%]">
                    <p>Attested:</p>
                </div>
                <div class="flex flex-col w-[35%]">
                    <p class="w-full h-6 border-b border-0 border-black"></p>
                    <p class="self-center">Lupon Chairman</p>
                </div>

                <div class="break-after-page"></div>
            @endif
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
            <p class="font-bold tracking-[0.35rem]">CERTIFICATION TO FILE ACTION</p>
        </div>
        
        <div class="flex flex-col">
            <p>This is to certify that:</p>
            <ol class="list-decimal list-inside">
                <li>
                    There has been a personal confrontation between the parties before the
                    Punong Barangay/Pangkat ng Tagapagkasundo;
                </li>
                
                <li>A settlement was reached;</li>
                
                <li>
                    The settlement has been repudiated in a statement sworn to before the
                    Punong Barangay by ______________ on ground of ______________; and 
                </li>

                <li>
                    Therefore, the corresponding complaint for the dispute may now be filed in
                    court/government office.
                </li>
            </ol>


        </div>

        <div class="flex flex-col w-1/4">
            <p class="self-start">This <span class="underline">{{date('jS', strtotime(now()))}}</span> day of <span class="underline">{{date('F', strtotime(now()))}}</span>, <span class="underline">{{date('Y', strtotime(now()))}}</span>.</p>
        </div>

        <div class="flex flex-col w-[35%]">
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-center">Lupon Secretary</p>
        </div>
        <div class="flex flex-col w-[35%]">
            <p>Attested:</p>
        </div>
        <div class="flex flex-col w-[35%]">
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-center">Lupon Chairman</p>
        </div>
    @endif

</x-kp-form-layout>