<x-kp-form-submit>
    <div class="flex flex-col gap-2">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="witness_1" class="flex gap-2 items-center">Witness 1:</label>
            </div>
            <input type="text" class="form-input" name="witness_1" id="witness_1" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'witness_1')->value('value') : '' }}">
    
            @error('witness_1')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="witness_2" class="flex gap-2 items-center">Witness 2:</label>
            </div>
            <input type="text" class="form-input" name="witness_2" id="witness_2" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'witness_2')->value('value') : '' }}">
    
            @error('witness_2')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="witness_3" class="flex gap-2 items-center">Witness 3:</label>
            </div>
            <input type="text" class="form-input" name="witness_3" id="witness_3" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'witness_3')->value('value') : '' }}">
    
            @error('witness_3')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="witness_4" class="flex gap-2 items-center">Witness 4:</label>
            </div>
            <input type="text" class="form-input" name="witness_4" id="witness_4" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'witness_4')->value('value') : '' }}">
    
            @error('witness_4')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <label for="hearing">You are hereby commanded to appear before me on</label>
            <input class="form-input" type="datetime-local" name="hearing" id="hearing" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'hearing')->value('value'))) : '' }}">
            <label for="hearing">then and there to testify in the hearing of the above-captioned case.</label>
    
            @error('hearing')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-submit>
