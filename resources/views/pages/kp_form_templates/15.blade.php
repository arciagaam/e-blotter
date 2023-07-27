<x-kp-form-submit>
    <div class="form-input-container">
        <div class="flex flex-row">
            <label for="arbitration_award">After hearing the testimonies given and careful examination of the
                evidence presented in this case, award is hereby made as follows:</label>
        </div>
        <textarea name="arbitration_award" id="arbitration_award" cols="30" rows="5" class="form-input"></textarea>

        @error('arbitration_award')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>