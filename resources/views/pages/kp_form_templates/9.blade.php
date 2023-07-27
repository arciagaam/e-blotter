<x-kp-form-submit>
    <div class="flex flex-col gap-2">
        <div class="form-input-container">
            <label for="hearing">You are hereby required to appear before me on</label>
            <input class="form-input" type="datetime-local" name="hearing" id="hearing" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'hearing')->value('value'))) : '' }}">
            <label for="hearing">for the hearing of your complaint.</label>
    
            @error('hearing')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="officer" class="flex gap-2 items-center">Officer:</label>
            </div>
            <input type="text" class="form-input" name="officer" id="officer" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'officer')->value('value') : '' }}">
    
            @error('officer')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-submit>
