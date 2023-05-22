<x-layout>
    <x-page-header>New Record</x-page-header>

    <div class="flex flex-col gap-3">
        <form action="{{ route('records.update', ['record' => $record->id]) }}" method="POST" class="flex flex-col gap-5">
            @method('PUT')
            @csrf

            <div class="flex flex-col gap-2">

                <div class="flex flex-row justify-between">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="blotter_number" class="flex gap-2 items-center">Blotter No.:</label>
                        </div>

                        <input class="form-input" type="text" name="blotter_number" id="blotter_number"
                            value="{{ $record->id }}" disabled>
                    </div>
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="date" class="flex gap-2 items-center">Date:</label>
                        </div>

                        <input value="{{ date_format($record->created_at, 'F j, Y') }}" class="form-input"
                            type="text" name="date" id="date" disabled>
                    </div>
                </div>

                <div class="flex flex-row justify-end">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="blotter_status_id" class="flex gap-2 items-center">Status:</label>
                        </div>

                        <select class="form-input" name="blotter_status_id" id="blotter_status_id">
                            @foreach ($blotterStatus as $value)
                                <option value="{{ $value->id }}" @selected($record->blotter_status_id == $value->id)>
                                    {{ ucfirst($value->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Victim Information</p>
                </div>

                <div class="grid grid-cols-2 gap-2">

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_name" class="flex gap-2 items-center">Complainants Name:</label>
                        </div>

                        <input class="form-input" type="text" name="victim[name]" id="victim_name"
                            value="{{ $record->victim->name }}">
                        @error('victim.name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_age" class="flex gap-2 items-center">Age:</label>
                        </div>

                        <input class="form-input" type="number" name="victim[age]" id="victim_age"
                            value="{{ $record->victim->age }}">
                        @error('victim.age')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_sex" class="flex gap-2 items-center">Sex:</label>
                        </div>

                        {{-- <input class="form-input" type="text" name="victim_sex" id="victim_sex"> --}}
                        <select class="form-input" name="victim[sex]" id="victim_sex">
                            <option value="1" @selected($record->victim->sex == 1)>Male</option>
                            <option value="2" @selected($record->victim->sex == 2)>Female</option>
                        </select>
                        @error('victim.sex')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_contact_number" class="flex gap-2 items-center">Contact Number:</label>
                        </div>

                        <input class="form-input" type="text" name="victim[contact_number]"
                            id="victim_contact_number" value="{{ $record->victim->contact_number }}">
                        @error('victim.contact_number')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-row gap-4">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_address" class="flex gap-2 items-center">Address:</label>
                            </div>

                            <input class="form-input" type="text" name="victim[address]" id="victim_address"
                                value="{{ $record->victim->address }}">
                            @error('victim.address')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="purok" class="flex gap-2 items-center">Purok:</label>
                            </div>

                            <input class="form-input" type="text" name="purok" id="purok"
                                value="{{ $record->purok }}">
                            @error('purok')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_civil_status" class="flex gap-2 items-center">Civil Status:</label>
                        </div>

                        <select class="form-input" name="victim[civil_status_id]" id="victim_civil_status">
                            @foreach ($civilStatus as $value)
                                <option value="{{ $value->id }}" @selected($record->victim->civil_status == $value->id)>
                                    {{ ucfirst($value->name) }}</option>
                            @endforeach
                        </select>

                        @error('victim.civil_status_id')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Suspect Information</p>
                </div>

                <div class="flex flex-col gap-2">

                    <div class="flex flex-row gap-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_name" class="flex gap-2 items-center">Suspect Name:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[name]" id="suspect_name"
                                value="{{ $record->suspect->name }}">
                            @error('suspect.name')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_sex" class="flex gap-2 items-center">Sex:</label>
                            </div>
                            <select class="form-input" name="suspect[sex]" id="suspect_sex">
                                <option value="1" @selected($record->suspect->sex == 1)>Male</option>
                                <option value="2" @selected($record->suspect->sex == 2)>Female</option>
                            </select>
                            @error('suspect.sex')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_address" class="flex gap-2 items-center">Address:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[address]" id="suspect_address"
                                value="{{ $record->suspect->address }}">
                            @error('suspect.address')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container col-span-3">
                        <div class="flex flex-row">
                            <label for="case" class="flex gap-2 items-center">Case:</label>
                        </div>

                        <input class="form-input" type="text" name="case" id="case"
                            value="{{ $record->case }}">
                        @error('case')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Narrative</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input resize-none" name="narrative" id="narrative" cols="30" rows="5">{{ $record->narrative }}</textarea>
                        @error('narrative')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <button
                        class="flex justify-center items-center p-2 rounded-full bg-rose-600 text-white fill-white">
                        <box-icon class="" name='microphone'></box-icon>
                    </button>
                    <p>Click on the microphone icon and being speaking.</p>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Relief/s Be Granted</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input resize-none" name="reliefs" id="reliefs" cols="30" rows="5">{{ $record->reliefs }}</textarea>
                        @error('reliefs')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex self-end">
                <div class="flex flex-col ml-auto gap-2">
                    <button class="btn-filled" type="button">Schedule of Reconciliation</button>
                    <button class="btn-tinted" type="button">Print</button>
                    <button class="btn-tinted danger" type="button">Clear</button>
                    <button class="btn-tinted success" type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>

</x-layout>

@vite('resources/js/table.js')
