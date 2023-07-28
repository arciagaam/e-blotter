<x-kp-form-submit>
    <div class="form-input-container">
        <label for="hearing">You are hereby required to appear before the Pangkat on</label>
        <input class="form-input" type="datetime-local" name="hearing" id="hearing" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'hearing')->value('value'))) : '' }}">
        <label for="hearing">for a hearing of the above-entitled case.</label>

        @error('hearing')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>
