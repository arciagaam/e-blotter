<x-kp-form-submit>
    <div class="flex flex-col gap-2">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="complain" class="flex gap-2 items-center">I/WE hereby complain against above named respondent/s for violating my/our
                    rights and interests in the following manner:</label>
            </div>
            <textarea name="complain" id="complain" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'complain')->value('value') : (array_key_exists("complain", $relatedData) ? $relatedData["complain"] : "") }}</textarea>
            @error('complain')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="relief" class="flex gap-2 items-center">THEREFORE, I/WE pray that the following relief/s be granted to me/us in
                    accordance with law and/or equity:</label>
            </div>
            <textarea name="relief" id="relief" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'relief')->value('value') : (array_key_exists("relief", $relatedData) ? $relatedData["relief"] : "") }}</textarea>
    
            @error('relief')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-submit>
