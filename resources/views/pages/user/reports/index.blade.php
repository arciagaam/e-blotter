<x-layout>
    <x-page-header>Generate Reports</x-page-header>

    <form action="{{ route('reports.store') }}" method="POST" class="flex flex-col gap-5" target="_blank">
        @csrf

        <div class="border-b-2 border-project-gray-default ">
            <p class="font-bold text-lg">Options</p>
        </div>

        <div class="flex flex-row gap-2">
            <div class="form-input-container flex-col">
                <div class="flex flex-row">
                    <label for="from" class="flex gap-2 items-center">From:</label>
                </div>
                <input value="{{ date('Y-m-d') }}" class="form-input" type="date" name="from" id="from">
                @error('from')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-input-container flex-col">
                <div class="flex flex-row">
                    <label for="to" class="flex gap-2 items-center">To:</label>
                </div>
                <input value="{{ date('Y-m-d') }}" class="form-input" type="date" name="to" id="to">
                @error('to')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="border-project-gray-default ">
                <p class="font-bold text-lg">Order</p>
            </div>

            <div class="flex flex-row gap-2">
                <div class="form-input-container flex-row items-center gap-2">
                    <input type="radio" class="form-input" name="order" value="asc" id="asc">
                    <div class="flex flex-row">
                        <label for="asc" class="flex gap-2 items-center">Ascending</label>
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-2">
                <div class="form-input-container flex-row items-center gap-2">
                    <input type="radio" class="form-input" name="order" value="desc" id="desc"
                        @selected(true)>
                    <div class="flex flex-row">
                        <label for="desc" class="flex gap-2 items-center">Descending</label>
                    </div>
                </div>
            </div>
            @error('order')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <div class="border-project-gray-default ">
                <p class="font-bold text-lg">Contents</p>
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-row items-center gap-2">
                        <input type="checkbox" class="form-input" name="contents[]" id="complainant" value="complainant">
                        <div class="flex flex-row">
                            <label for="complainant" class="flex gap-2 items-center">Complainant</label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-row items-center gap-2">
                        <input type="checkbox" class="form-input" name="contents[]" id="respondent" value="respondent">
                        <div class="flex flex-row">
                            <label for="respondent" class="flex gap-2 items-center">Respondent</label>
                        </div>
                    </div>
                </div>
            </div>
            @error('contents')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <div class="border-project-gray-default ">
                <p class="font-bold text-lg">Blotter Status</p>
            </div>

            <div class="flex flex-col gap-2">
                @foreach ($blotterStatus as $status)
                    <div class="flex flex-row gap-2">
                        <div class="form-input-container flex-row items-center gap-2">
                            <input type="checkbox" class="form-input" name="blotter_status[]"
                                value="{{ $status->id }}" id="{{ $status->name }}">
                            <div class="flex flex-row">
                                <label for="{{ $status->name }}"
                                    class="flex gap-2 items-center">{{ ucfirst($status->name) }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('blotter_status')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn-filled w-fit" type="submit">Generate Report</button>
    </form>

</x-layout>
