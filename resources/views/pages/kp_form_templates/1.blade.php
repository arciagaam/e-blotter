<x-kp-form-submit>

<div class="flex flex-col gap-5">
    <p class="text-sm italic text-black/50 mb-5">You can leave the lupon member blank if empty.</p>
    @error('members')
        <p class="text-xs text-red-500 italic">{{ $message }}</p>
    @enderror
    
    <div class="grid grid-cols-2 gap-5">
        @for ($i=0; $i<25; $i++)
            <div class="form-input-container">
                <div class="flex flex-row">
                    <label for="member-{{$i+1}}" class="flex gap-2 items-center">Lupon Member #{{$i+1}}:</label>
                </div>
                <input class="form-input" type="text" name="members[]" id="member-{{$i+1}}" >
            </div>
        @endfor
    </div>
    
    <div class="form-input-container">
        <div class="flex flex-row">
            <label for="hearing" class="flex gap-2 items-center">All persons are hereby enjoined to immediately inform me and of their opposition to or endorsement of any or all the proposed members or recommend to me other persons not included in the list but not later than</label>
        </div>
        <input class="form-input" type="date" name="hearing" id="hearing" >
        <p>(the last day for posting this notice)</p>
        @error('hearing')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</div>

</x-kp-form-submit>
