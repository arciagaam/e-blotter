<x-layout>
    <x-page-header>View Record</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row gap-4">
            <x-nav-button url="{{ route('records.show', ['record' => $record->id]) }}">Details</x-nav-button>
            <x-nav-button url="{{ route('records.kp-forms.index', ['record' => $record->id]) }}">
                Issued Certificate
                <p id="issuedKpFormsBadge" class="hidden absolute -top-[10%] left-[95%] flex items-center justify-center h-6 text-xs rounded-full aspect-square bg-red-400 text-white font-medium" data-url={{route('records.kp-forms.getNewKpForms', ['record' => $record->id])}}>0</p>
            </x-nav-button>
        </div>

        <div class="flex flex-col gap-5">

            <div class="flex flex-col gap-2">
                <div class="flex flex-col lg:flex-row gap-2 justify-between">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="blotter_number" class="flex gap-2 items-center">Blotter No.:</label>
                        </div>

                        <input class="form-input bg-white" type="text" name="blotter_number" id="blotter_number"
                            value="{{ $record->barangay_blotter_number }}" disabled>
                    </div>
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="date" class="flex gap-2 items-center">Date:</label>
                        </div>

                        <input value="{{ $record->created_at }}" class="form-input bg-white" type="text"
                            name="date" id="date" disabled>
                    </div>
                </div>

                <div class="flex flex-row justify-start lg:justify-end">
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-center items-center">
                            <label for="date" class="flex gap-2 items-center">Remarks:</label>
                        </div>

                        <x-blotter-status id="{{ $record->blotterStatus->id }}"
                            text="{{ $record->blotterStatus->name }}" />
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
                            value="{{ formatName($record->victim->first_name ?? '', $record->victim->middle_name ?? null, $record->victim->last_name ?? '') }}"
                            disabled>
                        @error('victim.name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_age" class="flex gap-2 items-center">Age:</label>
                        </div>

                        <input class="form-input bg-white" type="number" name="victim[age]" id="victim_age"
                            value="{{ $record->victim->age ?? '' }}" disabled>
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

                        <div class="group flex items-center gap-2 border overflow-clip border-project-gray-default/30 rounded-md text-sm transition-all duration-300 ease-in-out font-normal focus-within:border-project-blue-default bg-white">
                            <span class="group-focus-within:border-project-blue-default bg-gray-100 py-1 px-2 border-r border-r-project-gray-default/30">+63</span>
                            <input class="w-full focus-visible:outline-none" type="text" name="victim[contact_number]" id="victim_contact_number" max="10" value="{{ $record->victim->contact_number }}" disabled>
                        </div>

                        @error('victim.contact_number')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 col-span-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_purok" class="flex gap-2 items-center">Purok:</label>
                            </div>

                            <input disabled class="form-input bg-white" type="text" name="victim[purok]" id="victim_purok" value="{{ $record->victim->purok }}">
                            @error('victim.purok')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_barangay" class="flex gap-2 items-center">Barangay:</label>
                            </div>

                            <input disabled class="form-input bg-white" type="text" name="victim[barangay]" id="victim_barangay" value="{{ $record->victim->barangay  }}">
                            @error('victim.barangay')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_municipality" class="flex gap-2 items-center">Municipality:</label>
                            </div>

                            <input disabled class="form-input bg-white" type="text" name="victim[municipality]" id="victim_municipality" value="{{ $record->victim->municipality  }}">
                            @error('victim.municipality')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_province" class="flex gap-2 items-center">Province:</label>
                            </div>

                            <input disabled class="form-input bg-white" type="text" name="victim[province]" id="victim_province" value="{{ $record->victim->province  }}">
                            @error('victim.province')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
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

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Suspect Information</p>
                </div>

                <div class="flex flex-col gap-2">

                    <div class="flex flex-col xl:flex-row gap-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_name" class="flex gap-2 items-center">Suspect Name:</label>
                            </div>

                            <input class="form-input bg-white" type="text" name="suspect[name]" id="suspect_name"
                                value="{{ formatName($record->suspect->first_name, $record->suspect->middle_name, $record->suspect->last_name) }}"
                                disabled>
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
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 col-span-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_barangay" class="flex gap-2 items-center">Barangay:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[barangay]" id="suspect_barangay" value="{{ $record->suspect->barangay }}">
                            @error('suspect.barangay')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_municipality" class="flex gap-2 items-center">Municipality:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[municipality]" id="suspect_municipality" value="{{ $record->suspect->municipality }}">
                            @error('suspect.municipality')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_province" class="flex gap-2 items-center">Province:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[province]" id="suspect_province" value="{{ $record->suspect->province }}">
                            @error('suspect.province')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container col-span-3">
                        <div class="flex flex-row">
                            <label for="case" class="flex gap-2 items-center">Nature of Incident:</label>
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

                <div class="flex flex-row items-center gap-2">
                    {{-- <button
                        class="flex justify-center items-center p-2 rounded-full bg-rose-600 text-white fill-white">
                        <box-icon class="" name='microphone'></box-icon>
                    </button>
                    <p>Click on the microphone icon and being speaking.</p> --}}
                    <audio id="recording"
                        src="{{ isset($record->narrative_file) ? url('assets\\' . $record->narrative_file) : '' }}"
                        controls></audio>
                </div>
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
                    <a href="{{ route('records.kp-forms.get.step-one', ['id' => $record->id]) }}" class="btn-filled"
                        data-target="#print" type="button">Issue KP Form</a>
                    {{-- <button data-target="#upload-form" data-form-id="{{ $record->id }}"
                        class="btn-outline flex justify-center items-center">
                        Upload KP Form
                    </button> --}}
                    <button class="btn-outline" data-target="#schedule" type="button">Schedule of
                        Reconciliation</button>
                    <a class="btn-outline text-center"
                        href="{{ route('records.edit', ['record' => $record->id]) }}">Edit</a>
                    <a class="btn-outline success" target="_blank"
                        href="{{ route('records.print', ['record' => $record->id]) }}">Print</a>
                    <button data-target="#delete" data-form-id="{{ $record->id }}"
                        class="btn-outline danger">Archive</button>
                </div>
            </div>

        </div>
    </div>

    @vite('resources/js/kp_forms_notifications')

</x-layout>

<x-modal id="delete">
    <x-slot:heading>
        Archive Record
    </x-slot:heading>

    <form action="#" method="POST" id="delete-record-form"
        data-action="{{ route('records.destroy', ['record' => ':id']) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to archive this record?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled danger" form="delete-record-form">Archive</button>
    </x-slot:footer>
</x-modal>

{{-- <x-modal id="upload-form">
    <x-slot:heading>
        Upload KP Form
    </x-slot:heading>

    <form action="#" method="POST" id="upload-kp-form" class="flex flex-col gap-2"
        data-action="{{ route('records.kp-forms.store', ['recordId' => ':id']) }}" enctype="multipart/form-data"
        data-file-upload="true">

        <div class="form-input-container">
            <input type="file" name="kp-form" id="kp-form"
                class="w-fit file:mr-4 file:py-2 file:px-4 file:rounded-full file:text-sm file:font-semibold file:btn-outline file:cursor-pointer">
            @error('logo')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </form>

    <x-slot:footer>
        <button class="btn-filled" form="upload-kp-form">Upload</button>
    </x-slot:footer>
</x-modal> --}}

<x-modal id="schedule">
    <x-slot:heading>
        Schedules
    </x-slot:heading>

    <ul class="flex flex-col h-96 max-h-96 overflow-auto divide-y">
        @empty($hearingDates)
            <p>No hearing dates.</p>
        @else
            @foreach ($hearingDates as $key => $date)
                <li class="flex flex-col py-4 first:pt-0 last:pb-0">
                    <span class="font-bold flex flex-row items-center gap-2">
                        KP FORM #{{ $date->kp_form_id }}
                        <span class="font-normal text-sm text-gray-400">Issued at
                            {{ date('F j, Y', strtotime($date->created_at)) }}</span>
                    </span>
                    <p>{{ date('F j, Y', strtotime($date->value)) }}</p>
                </li>
            @endforeach
        @endempty
    </ul>
</x-modal>
