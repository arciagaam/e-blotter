<x-kp-form-submit>

    <div class="flex flex-col gap-5">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="summon" class="flex gap-2 items-center">You may take your oath of office before the Punong Barangay on </label>
            </div>
            <input class="form-input" type="date" name="summon" id="summon" value="{{ session()->has('editing_kp_form') ? date('Y-m-d', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'summon')->value('value'))) : '' }}">
            @error('summon')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
</x-kp-form-submit>
    