<x-kp-form-submit>

    <div class="flex flex-col gap-5">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="to" class="flex gap-2 items-center">Name of Lupon Member</label>
            </div>
            <input class="form-input" type="text" name="to" id="to" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'to')->value('value') : '' }}">
            @error('to')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <p>After due hearing and with the concurrence of a majority of all the Lupong Tagapamayapa members of this Barangay, your appointment as member thereof is hereby withdrawn effective upon receipt hereof, on the following ground/s:</p>
            <p class="text-sm italic text-black/50">Enter which field is applicable.</p>
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="incapacity_to_discharge" class="flex gap-2 items-center">Incapacity to discharge the duties of your office as shown by</label>
            </div>
            <input class="form-input" type="text" name="incapacity_to_discharge" id="incapacity_to_discharge" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'incapacity_to_discharge')->value('value') : '' }}">
            @error('incapacity_to_discharge')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="unsuitability" class="flex gap-2 items-center">Unsuitability by reason of</label>
            </div>
            <input class="form-input" type="text" name="unsuitability" id="unsuitability" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'unsuitability')->value('value') : '' }}">
            @error('unsuitability')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>


    </div>
    
    
</x-kp-form-submit>

