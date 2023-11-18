<x-layout>
    <x-page-header>Generate Reports</x-page-header>

    <form action="{{ route('reports.store') }}" method="POST" class="flex flex-col gap-5" target="_blank">
        @csrf

        <div class="border-b-2 border-project-gray-default ">
            <p class="font-bold text-lg">Options</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="flex flex-col gap-5">
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

                {{-- <div class="flex flex-col gap-2">
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
            </div> --}}
            <div class="flex flex-col gap-2">
                <div class="border-project-gray-default ">
                    <p class="font-bold text-lg">Addressee Information</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex flex-col flex-1">
                        <div class="flex flex-row">
                            <label for="addressee_to" class="flex gap-2 items-center">To:</label>
                        </div>

                        <input class="form-input" type="text" name="addressee_to" id="addressee_to" value="{{ old('addressee_to') }}">
                        @error('addressee_to')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col flex-1">
                        <div class="flex flex-row">
                            <label for="addressee_company" class="flex gap-2 items-center">Designation:</label>
                        </div>

                        <input class="form-input" type="text" name="addressee_company" id="addressee_company" value="{{ old('addressee_company') }}">
                        @error('addressee_company')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col flex-1">
                        <div class="flex flex-row">
                            <label for="addressee_address" class="flex gap-2 items-center">Address:</label>
                        </div>

                        <input class="form-input" type="text" name="addressee_address" id="addressee_address" value="{{ old('addressee_address') }}">
                        @error('addressee_address')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="flex flex-col gap-2">
            <div class="border-project-gray-default ">
                <p class="font-bold text-lg">Contents</p>
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-row items-center gap-2">
                        <input type="checkbox" class="form-input" name="contents[]" id="complainant"
                            value="complainant">
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
        </div> --}}
        </div>

        <div class="flex flex-col gap-2">
            <div class="border-project-gray-default flex flex-row items-center gap-4">
                <p class="font-bold text-lg">Blotter Status</p>
                <button class="btn-outline w-fit" data-button-type="add-all" type="button">Add All</button>
            </div>

            <div class="flex flex-col gap-2" data-input="checkbox">
                @foreach ($blotterStatus as $status)
                <div class="flex flex-row gap-2">
                    <div class="form-input-container flex-row items-center gap-2">
                        <input type="checkbox" class="form-input" name="blotter_status[]" value="{{ $status->id }}" id="{{ $status->name }}">
                        <div class="flex flex-row">
                            <label for="{{ $status->name }}" class="flex gap-2 items-center">{{ ucfirst($status->name) }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @error('blotter_status')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
        </div>



        <button class="btn-filled w-fit" type="submit">Generate Report</button>
    </form>

</x-layout>

<script>
    const addAllButtons = document.querySelectorAll("button[data-button-type='add-all']");

    addAllButtons.forEach((button) => {
        const parent = button.parentNode.parentNode;
        const checkboxInputContainer = parent.querySelector("div[data-input='checkbox']");
        const checkboxInputs = checkboxInputContainer.querySelectorAll("input[type='checkbox']");

        button.addEventListener('click', () => {
            checkboxInputs.forEach((input) => {
                input.checked = true;
            });
        });
    });
</script>
