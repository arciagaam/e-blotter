<x-kp-form-create>
    <div class="flex flex-col gap-2">
        <div class="form-input-container">
            <label for="hearing">You are hereby required to appear before me on</label>
            <input class="form-input" type="datetime-local" name="hearing" id="hearing">
            <label for="hearing">for the hearing of your complaint.</label>
    
            @error('hearing')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="officer" class="flex gap-2 items-center">Officer:</label>
            </div>
            <input type="text" class="form-input" name="officer" id="officer">
    
            @error('officer')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-create>
