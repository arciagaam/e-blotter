<x-kp-form-submit>
    <div class="form-input-container">
        <div class="flex flex-row">
            <label for="settlement">We, complainant/s and respondent/s in the above-captioned case, do
                hereby agree to settle our dispute as follows:</label>
        </div>
        <textarea name="settlement" id="settlement" cols="30" rows="5" class="form-input">{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'settlement')->value('value') : '' }}</textarea>

        @error('settlement')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>