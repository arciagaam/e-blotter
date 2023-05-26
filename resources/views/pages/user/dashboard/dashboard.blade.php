<x-layout>
    <x-page-header>Dashboard</x-page-header>

    <div class="flex flex-col gap-10">
        <div class="flex gap-5">
            <p id="intervalDate">--</p>
            <p id="intervalTime">--</p>
        </div>

        <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
            <div class="flex gap-5 items-center self-center">
                <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-project-blue-dark">
                    <box-icon color="white" name="folder" size="3em"></box-icon>
                </div>

                <div class="flex flex-col">
                    <p class="text-lg">Blotter Record Summary</p>
                </div>
            </div>

            <hr>

            <p class="self-center textt-2xl font-bold">{{ $records }}</p>
        </div>

        {{-- <div class="flex flex-col items-center justify-center rounded-md w-full overflow-hidden">
            <p class="flex flex-1 text-lg">
                Total Blotter Cases
            </p>
            <p class="flex flex-[2] text-2xl bg-project-gray-light w-full justify-center py-10 px-5">
                25
            </p>
        </div> --}}

        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-5 items-center">
                    <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-emerald-600">
                        <box-icon color="white" name="folder" size="3em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Settled Cases</p>
                    </div>
                </div>

                <hr>

                <p class="self-center textt-2xl font-bold">{{ $blotterStatusCount['settled'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-5 items-center">
                    <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-rose-600">
                        <box-icon color="white" name="folder" size="3em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Dismissed Cases</p>
                    </div>
                </div>

                <hr>

                <p class="self-center textt-2xl font-bold">{{ $blotterStatusCount['dismissed'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-5 items-center">
                    <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-project-yellow-default">
                        <box-icon color="white" name="folder" size="3em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">In Prosecution</p>
                    </div>
                </div>

                <hr>

                <p class="self-center textt-2xl font-bold">{{ $blotterStatusCount['inProsecution'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-5 items-center">
                    <div class="flex items-center justify-center w-[5em] h-[5em] rounded-full bg-neutral-500">
                        <box-icon color="white" name="folder" size="3em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Unresolved</p>
                    </div>
                </div>

                <hr>

                <p class="self-center textt-2xl font-bold">{{ $blotterStatusCount['unresolved'] }}</p>
            </div>
        </div>

        <x-page-header>Schedules for Conciliation</x-page-header>

        <div id="calendar"></div>
    </div>
</x-layout>

@vite('resources/js/datetime.js')
@vite('resources/js/calendar.js')
