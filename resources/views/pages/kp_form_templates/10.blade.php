<x-kp-form-submit>
    <div class="form-input-container">
        <label for="summon">You are hereby required to summon before me on</label>
        <input class="form-input" type="datetime-local" name="summon" id="summon" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'summon')->value('value'))) : '' }}">
        <label for="summon">for the constitution of the Pangkat ng Tagapagkasundo which shallconciliate your dispute.</label>

        @error('summon')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-kp-form-submit>
