<x-layout>
    <x-page-header>Blotter Dashboard</x-page-header>

    <div class="flex flex-col gap-10">
        <div class="flex gap-5">
            <p id="intervalDate">--</p>
            <p id="intervalTime">--</p>
        </div>

        <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
            <div class="flex gap-5 items-center self-center">
                <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-project-blue-dark">
                    <box-icon color="white" name='folder' size="3em"></box-icon>
                </div>

                <div class="flex flex-col">
                    <p class="text-lg">Total Blotter Cases</p>
                </div>
            </div>

            <hr>

            <p class="self-center text-2xl font-bold">{{$totalCases}}</p>
        </div>

        <div class="flex w-full">
            <p class="text-lg">Blotter Cases per Barangay</p>
        </div>

        <div class="grid grid-cols-3 gap-5">

            @foreach ($barangays as $barangay)  
                <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                    <div class="flex gap-5 items-center">
                        <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-project-blue-dark">
                            <box-icon color="white" name='building-house' size="3em"></box-icon>
                        </div>

                        <div class="flex flex-col">
                            {{-- <p class="text-project-gray-default/60 text-sm">Province</p> --}}
                            <p class="text-lg">Barangay {{$barangay->name}}</p>
                        </div>
                    </div>

                    <hr>

                    <p class="self-center text-2xl font-bold">{{$barangay->records_count}}</p>
                </div>
            @endforeach         
        </div>
    </div>
</x-layout>

@vite('resources/js/datetime.js')