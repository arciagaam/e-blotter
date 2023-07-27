<x-kp-form-submit>
    <div class="form-input-container">
        <label for="hearing">You are hereby required to appear before me/the Pangkat on the</label>
        <input class="form-input" type="datetime-local" name="hearing" id="hearing">

        @error('hearing')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>