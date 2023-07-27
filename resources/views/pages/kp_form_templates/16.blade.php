<x-kp-form-create>
    <div class="form-input-container">
        <div class="flex flex-row">
            <label for="settlement">We, complainant/s and respondent/s in the above-captioned case, do
                hereby agree to settle our dispute as follows:</label>
        </div>
        <textarea name="settlement" id="settlement" cols="30" rows="5" class="form-input"></textarea>

        @error('settlement')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-create>