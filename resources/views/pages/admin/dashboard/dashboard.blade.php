<x-layout>
    <x-page-header>Blotter Dashboard</x-page-header>

    <div class="flex flex-col gap-10">
        <div class="flex gap-5">
            <p id="intervalDate">--</p>
            <p id="intervalTime">--</p>
        </div>

        <div class="flex flex-col items-center justify-center rounded-md w-full overflow-hidden">
            <p class="flex flex-1 text-lg">
                Total Blotter Cases
            </p>
            <p class="flex flex-[2] text-2xl bg-project-gray-light w-full justify-center py-10 px-5">
                25
            </p>
        </div>

        <div class="grid grid-cols-3 gap-5">
            <div class="flex flex-col items-center justify-center rounded-md w-full overflow-hidden">
                <p class="flex flex-1 text-lg">
                    Total Blotter Cases
                </p>
                <p class="flex flex-[2] text-2xl bg-project-gray-light w-full justify-center py-10 px-5">
                    25
                </p>
            </div>
            
            <div class="flex flex-col items-center justify-center rounded-md w-full overflow-hidden">
                <p class="flex flex-1 text-lg">
                    Total Blotter Cases
                </p>
                <p class="flex flex-[2] text-2xl bg-project-gray-light w-full justify-center py-10 px-5">
                    25
                </p>
            </div>

            <div class="flex flex-col items-center justify-center rounded-md w-full overflow-hidden">
                <p class="flex flex-1 text-lg">
                    Total Blotter Cases
                </p>
                <p class="flex flex-[2] text-2xl bg-project-gray-light w-full justify-center py-10 px-5">
                    25
                </p>
            </div>
        </div>
    </div>
</x-layout>

@vite('resources/js/datetime.js')