<x-layout>
    <x-page-header>New Record</x-page-header>

    <div class="flex flex-col gap-3">
        <form action="{{ url('#') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            <div class="flex flex-row justify-between">
                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="blotter_number" class="flex gap-2 items-center">Blotter No.:</label>
                    </div>

                    <input class="form-input" type="text" name="blotter_number" id="blotter_number" disabled>
                </div>
                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="date" class="flex gap-2 items-center">Date:</label>
                    </div>

                    <input value="{{ date('F j, Y') }}" class="form-input" type="text" name="date" id="date"
                        disabled>
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

                        <input class="form-input" type="text" name="victim_name" id="victim_name">
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_age" class="flex gap-2 items-center">Age:</label>
                        </div>

                        <input class="form-input" type="text" name="victim_age" id="victim_age">
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_sex" class="flex gap-2 items-center">Sex:</label>
                        </div>

                        <input class="form-input" type="text" name="victim_sex" id="victim_sex">
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_contact_number" class="flex gap-2 items-center">Contact Number:</label>
                        </div>

                        <input class="form-input" type="text" name="victim_contact_number"
                            id="victim_contact_number">
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_address" class="flex gap-2 items-center">Address:</label>
                        </div>

                        <input class="form-input" type="text" name="victim_address" id="victim_address">
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_civil_status" class="flex gap-2 items-center">Civil Status:</label>
                        </div>

                        <input class="form-input" type="text" name="victim_civil_status" id="victim_civil_status">
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

                            <input class="form-input" type="text" name="suspect_name" id="suspect_name">
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_sex" class="flex gap-2 items-center">Sex:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect_sex" id="suspect_sex">
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_address" class="flex gap-2 items-center">Address:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect_address" id="suspect_address">
                        </div>
                    </div>

                    <div class="form-input-container col-span-3">
                        <div class="flex flex-row">
                            <label for="case" class="flex gap-2 items-center">Case:</label>
                        </div>

                        <input class="form-input" type="text" name="case" id="case">
                    </div>

                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Narrative</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input resize-none" name="narrative" id="narrative" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <button class="flex justify-center items-center p-2 rounded-full bg-rose-600 text-white fill-white">
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
                        <textarea class="form-input resize-none" name="reliefs" id="reliefs" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="flex self-end">
                <div class="flex flex-col ml-auto gap-2">
                    <button class="btn-filled" type="button">Schedule of Reconciliation</button>
                    <button class="btn-tinted" type="button">Print</button>
                    <button class="btn-tinted danger" type="button">Clear</button>
                    <button class="btn-tinted success" type="button">Save</button>
                </div>
            </div>

        </form>
    </div>

</x-layout>

@vite('resources/js/table.js')
