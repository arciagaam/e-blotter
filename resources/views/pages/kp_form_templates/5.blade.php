<x-kp-form-submit>

    <div class="flex flex-col gap-5">
        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="name_of_lupon" class="flex gap-2 items-center">Name of Lupon Member</label>
            </div>
            <input class="form-input" type="text" name="name_of_lupon" id="name_of_lupon" value="{{ session()->has('editing_kp_form') ? $issuedKpForm->issuedKpFormFields->where('tag_id', 'name_of_lupon')->value('value') : '' }}">
            @error('name_of_lupon')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-input-container">
            <div class="flex flex-row">
                <label for="subscribed" class="flex gap-2 items-center">SUBSCRIBED AND SWORN to (or AFFIRMED) before me this</label>
            </div>
            <input class="form-input" type="date" name="subscribed" id="subscribed" value="{{ session()->has('editing_kp_form') ? date('Y-m-d', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'subscribed')->value('value'))) : '' }}">
            @error('subscribed')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    
</x-kp-form-submit>
    