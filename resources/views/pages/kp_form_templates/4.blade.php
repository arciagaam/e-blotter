@php
    if (session()->has('editing_kp_form')) {
        $members = $issuedKpForm->issuedKpFormFields->where('tag_id', 'members')->values();
    }
@endphp

<x-kp-form-submit>

    <div class="flex flex-col gap-5">
        @error('members')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
        
        <div class="grid grid-cols-2 gap-5">
            @for ($i=0; $i<20; $i++)
                <div class="form-input-container">
                    <div class="flex flex-row">
                        <label for="member-{{$i+1}}" class="flex gap-2 items-center">Lupon Member #{{$i+1}}:</label>
                    </div>
                    <input class="form-input" type="text" name="members[]" id="member-{{$i+1}}" value="{{ session()->has('editing_kp_form') ? ($members->has($i) ? $members[$i]->value : '') : '' }}">
                </div>
            @endfor
        </div>
        
    </div>
    
</x-kp-form-submit>
    