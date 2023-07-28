<x-kp-form-submit>
    <div class="flex flex-col gap-2">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="fraud">Fraud</label>
            </div>
            <textarea name="fraud" id="fraud" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'fraud')->value('value') : '' }}</textarea>
    
            @error('fraud')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="violence">Violence</label>
            </div>
            <textarea name="violence" id="violence" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'violence')->value('value') : '' }}</textarea>
    
            @error('violence')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="intimidation">Intimidation</label>
            </div>
            <textarea name="intimidation" id="intimidation" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'intimidation')->value('value') : '' }}</textarea>
    
            @error('intimidation')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-submit>