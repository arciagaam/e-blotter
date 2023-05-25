<x-layout>
    <x-page-header>View Record</x-page-header>

    <div class="flex flex-col gap-3">
        <div class="flex flex-col gap-5">

            <div class="flex flex-col gap-2">
                <div class="flex flex-row justify-between">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="blotter_number" class="flex gap-2 items-center">Blotter No.:</label>
                        </div>
    
                        <input class="form-input bg-white" type="text" name="blotter_number" id="blotter_number"
                            value="{{ $record->id }}" disabled>
                    </div>
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="date" class="flex gap-2 items-center">Date:</label>
                        </div>
    
                        <input value="{{ $record->created_at }}" class="form-input bg-white" type="text" name="date"
                            id="date" disabled>
                    </div>
                </div>

                <div class="flex flex-row justify-end">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="date" class="flex gap-2 items-center">Status:</label>
                        </div>

                        <x-blotter-status id="{{ $record->blotterStatus->id }}" text="{{ $record->blotterStatus->name }}" />
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

                        <input class="form-input bg-white" type="text" name="victim[name]" id="victim_name"
                            value="{{ $record->victim->name }}" disabled>
                        @error('victim.name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_age" class="flex gap-2 items-center">Age:</label>
                        </div>

                        <input class="form-input bg-white" type="number" name="victim[age]" id="victim_age"
                            value="{{ $record->victim->age }}" disabled>
                        @error('victim.age')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_sex" class="flex gap-2 items-center">Sex:</label>
                        </div>

                        <input class="form-input bg-white" type="text" name="victim_sex" id="victim_sex"
                            value="{{ $record->victim->sex == 1 ? 'Male' : ($record->victim->sex == 2 ? 'Female' : 'Not specified') }}"
                            disabled>
                        @error('victim.sex')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_contact_number" class="flex gap-2 items-center">Contact Number:</label>
                        </div>

                        <input class="form-input bg-white" type="text" name="victim[contact_number]"
                            id="victim_contact_number" value="{{ $record->victim->contact_number }}" disabled>
                        @error('victim.contact_number')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-row gap-4">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_address" class="flex gap-2 items-center">Address:</label>
                            </div>

                            <input class="form-input bg-white" type="text" name="victim[address]" id="victim_address"
                                value="{{ $record->victim->address }}" disabled>
                            @error('victim.address')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="purok" class="flex gap-2 items-center">Purok:</label>
                            </div>

                            <input class="form-input bg-white" type="text" name="purok" id="purok"
                                value="{{ $record->purok }}" disabled>
                            @error('purok')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_civil_status" class="flex gap-2 items-center">Civil Status:</label>
                        </div>

                        <input class="form-input bg-white" type="text" name="victim[civil_status_id]"
                            id="victim_civil_status"
                            value="{{ ucfirst($civilStatus[$record->victim->civil_status_id]->name) }}" disabled>

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

                            <input class="form-input bg-white" type="text" name="suspect[name]" id="suspect_name"
                                value="{{ $record->suspect->name }}" disabled>
                            @error('suspect.name')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_sex" class="flex gap-2 items-center">Sex:</label>
                            </div>

                            <input class="form-input bg-white" type="text" name="suspect[sex]" id="suspect_sex"
                                value="{{ $record->suspect->sex == 1 ? 'Male' : ($record->suspect->sex == 2 ? 'Female' : 'Not specified') }}"
                                disabled>
                            @error('suspect.sex')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_address" class="flex gap-2 items-center">Address:</label>
                            </div>

                            <input class="form-input bg-white" type="text" name="suspect[address]"
                                id="suspect_address" value="{{ $record->suspect->address }}" disabled>
                            @error('suspect.address')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container col-span-3">
                        <div class="flex flex-row">
                            <label for="case" class="flex gap-2 items-center">Case:</label>
                        </div>

                        <input class="form-input bg-white" type="text" name="case" id="case"
                            value="{{ $record->case }}" disabled>
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
                        <textarea class="form-input bg-white resize-none" name="narrative" id="narrative" cols="30" rows="5"
                            disabled>{{ $record->narrative }}</textarea>
                        @error('narrative')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- <div class="flex flex-row items-center gap-2">
                    <button
                        class="flex justify-center items-center p-2 rounded-full bg-rose-600 text-white fill-white">
                        <box-icon class="" name='microphone'></box-icon>
                    </button>
                    <p>Click on the microphone icon and being speaking.</p>
                </div> --}}
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Relief/s Be Granted</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input bg-white resize-none" name="reliefs" id="reliefs" cols="30" rows="5"
                            disabled>{{ $record->reliefs }}</textarea>
                        @error('reliefs')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex self-end">
                <div class="flex flex-col ml-auto gap-2">
                    <button class="btn-tinted" type="button">Print</button>
                </div>
            </div>

        </div>
    </div>

</x-layout>
