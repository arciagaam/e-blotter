<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col gap-10">

        <div class="flex flex-row gap-5">
            <div class="form-input-container flex-row gap-5">
                <div class="flex flex-row justify-between items-center">
                    <label for="blotter_number" class="flex gap-2 items-center">Blotter Number</label>
                </div>

                <input class="form-input flex-1" type="text" id="blotter_number" name="blotter_number" disabled>
            </div>

            <div class="form-input-container flex-row gap-5">
                <div class="flex flex-row justify-between items-center">
                    <label for="date" class="flex gap-2 items-center">Date</label>
                </div>

                <input class="form-input flex-1" type="text" id="date" name="date" disabled>
            </div>

            <div class="form-input-container flex-row gap-5">
                <div class="flex flex-row justify-between items-center">
                    <label for="status" class="flex gap-2 items-center">Status</label>
                </div>

                <input class="form-input flex-1" type="text" id="status" name="status" disabled>
            </div>
        </div>

        <div class="flex flex-col">

            <div class="flex flex-1 p-2 items-center justify-center">
                <p>Victim's Information</p>
            </div>

            <div class="grid grid-cols-2 gap-3">

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_name" class="flex gap-2 items-center">Complainants Name</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_name" name="complainants_name" disabled>
                </div>
                
                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_age" class="flex gap-2 items-center">Age</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_age" name="complainants_age" disabled>
                </div>

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_sex" class="flex gap-2 items-center">Sex</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_sex" name="complainants_sex" disabled>
                </div>

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_contact_number" class="flex gap-2 items-center">Contact Number</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_contact_number" name="complainants_contact_number" disabled>
                </div>

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_address" class="flex gap-2 items-center">Address</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_address" name="complainants_address" disabled>
                </div>

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-between items-center">
                        <label for="complainants_civil_status" class="flex gap-2 items-center">Civil Status</label>
                    </div>
    
                    <input class="form-input flex-1" type="text" id="complainants_civil_status" name="complainants_civil_status" disabled>
                </div>

            </div>
        </div>

        <div class="flex flex-col">

            <div class="flex flex-1 p-2 items-center justify-center">
                <p>Suspect's Information</p>
            </div>

            <div class="flex gap-3">
                <div class="flex flex-col gap-3 flex-1">
    
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-between items-center">
                            <label for="complainants_name" class="flex gap-2 items-center">Complainants Name</label>
                        </div>
        
                        <input class="form-input flex-1" type="text" id="complainants_name" name="complainants_name" disabled>
                    </div>
    
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-between items-center">
                            <label for="complainants_sex" class="flex gap-2 items-center">Sex</label>
                        </div>
        
                        <input class="form-input flex-1" type="text" id="complainants_sex" name="complainants_sex" disabled>
                    </div>
    
                    <div class="form-input-container flex-row gap-5">
                        <div class="flex flex-row justify-between items-center">
                            <label for="complainants_address" class="flex gap-2 items-center">Address</label>
                        </div>
        
                        <input class="form-input flex-1" type="text" id="complainants_address" name="complainants_address" disabled>
                    </div>
    
                </div>

                <div class="flex flex-1">
                    <div class="form-input-container flex-row gap-5 w-full">
                        <div class="flex flex-row justify-between items-center">
                            <label for="case" class="flex gap-2 items-center">Case</label>
                        </div>
                        <textarea class="form-input flex-1 resize-none" name="case" id="case" cols="auto" rows="5" disabled></textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex flex-col">
            <div class="flex flex-1 p-2 items-center justify-center">
                <p>Narrative</p>
            </div>

            <div class="flex">
                <p class="flex-1">
                    asdasd
                </p>
                <button>Audio</button>
            </div>
        </div>

        <div class="flex">
            <div class="flex flex-col w-full">
                <div class="flex flex-1 p-2 items-center justify-center">
                    <p>Relief/s Be Granted</p>
                </div>

                <p>asdasdasdsa</p>
            </div>
            <button>Print</button>
        </div>

    </div>

</x-layout>