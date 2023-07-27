<x-kp-form-submit>
    <div class="form-input-container">
        <label for="hearing">You are hereby required to appear before me on</label>
        <input class="form-input" type="datetime-local" name="hearing" id="hearing" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'hearing')->value('value'))) : '' }}" >
        <label for="hearing">for the hearing of your complaint.</label>
        @error('hearing')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>