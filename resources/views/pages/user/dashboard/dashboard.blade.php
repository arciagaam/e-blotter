<x-layout>
    <x-page-header>Dashboard</x-page-header>

    <div class="flex flex-col gap-10">
        <div class="flex flex-col gap-2">
            <div class="flex gap-5">
                <div class="flex flex-row gap-2 justify-center">
                    <p>Date: </p>
                    <p id="intervalDate">--</p>
                </div>
                <div class="flex flex-row gap-2 justify-center">
                    <p>Time: </p>
                    <p id="intervalTime">--</p>
                </div>
            </div>

            <div class="flex flex-row gap-1 text-xl">
                <p class="w-fit">
                    Welcome, Barangay Secretary {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}!
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-3 items-center self-center">
                    <div class="flex self-start items-center justify-center p-2 rounded-full bg-project-blue-dark">
                        <box-icon color="white" name="folder" size="1em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Total Blotter Recorded</p>
                    </div>
                </div>

                <hr class="mt-auto">

                <p class="self-center text-2xl font-bold">{{ $records }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-3 items-center self-center">
                    <div class="flex self-start items-center justify-center p-2 rounded-full bg-emerald-600">
                        <box-icon color="white" name="folder" size="1em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Settled Cases</p>
                    </div>
                </div>

                <hr class="mt-auto">

                <p class="self-center text-2xl font-bold">{{ $blotterStatusCount['settled'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-3 items-center self-center">
                    <div class="flex self-start items-center justify-center p-2 rounded-full bg-neutral-500">
                        <box-icon color="white" name="folder" size="1em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Unresolved Cases</p>
                    </div>
                </div>

                <hr class="mt-auto">

                <p class="self-center text-2xl font-bold">{{ $blotterStatusCount['unresolved'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-3 items-center self-center">
                    <div class="flex self-start items-center justify-center p-2 rounded-full bg-rose-600">
                        <box-icon color="white" name="folder" size="1em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">KP Cases</p>
                    </div>
                </div>

                <hr class="mt-auto">

                <p class="self-center text-2xl font-bold">{{ $blotterStatusCount['kp_cases'] }}</p>
            </div>

            <div class="flex flex-col p-5 gap-4 rounded-md w-full overflow-hidden shadow-lg">
                <div class="flex gap-3 items-center self-center">
                    <div class="flex self-start items-center justify-center p-2 rounded-full bg-project-yellow-default">
                        <box-icon color="white" name="folder" size="1em"></box-icon>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-lg">Endorsed Cases</p>
                    </div>
                </div>

                <hr class="mt-auto">

                <p class="self-center text-2xl font-bold">{{ $blotterStatusCount['endorsed'] }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <div>
                <canvas id="graph" data-route="{{ route('dashboard.get-reports') }}"></canvas>
            </div>
            <div>
                <canvas id="graph-purok" data-route="{{ route('dashboard.get-hearing-dates-per-purok') }}"></canvas>
            </div>
        </div>

        <x-page-header>Schedules for Conciliation</x-page-header>

        <div id="calendar" data-route="{{ route('dashboard.get-hearing-dates') }}"></div>
    </div>
</x-layout>

@vite('resources/js/datetime.js')
@vite('resources/js/calendar.js')
@vite('resources/js/user_chart.js')
