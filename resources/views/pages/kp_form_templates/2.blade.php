<x-kp-form-submit>

    <div class="flex flex-col gap-5">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="to" class="flex gap-2 items-center">To:</label>
            </div>
            <input class="form-input" type="text" name="to" id="to" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'to')->value('value') : '' }}">
            @error('to')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    </x-kp-form-submit>
    