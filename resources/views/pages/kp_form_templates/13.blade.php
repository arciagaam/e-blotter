<x-kp-form-submit>
    <div class="flex flex-col gap-2">
        <div class="flex flex-col gap-2" data-type="input-container">
            @if (session()->has('editing_kp_form'))
                @foreach ($issuedKpForm->issuedKpFormFields->where('tag_id', 'witness')->values() as $key => $value)
                    @if ($key == 0)
                        <div class="form-input-container w-full">
                            <div class="flex flex-row">
                                <label for="witness_{{$key + 1}}" class="flex gap-2 items-center">Witness Name:</label>
                            </div>
                            <input type="text" class="form-input" name="witness[]" id="witness_{{$key + 1}}" data-count="{{ $key + 1 }}" value="{{ $value->value }}">
    
                            @error('witness')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div class="flex flex-row gap-2 lg:w-2/4">
                            <div class="form-input-container w-full">
                                <div class="flex flex-row">
                                    <label for="witness_{{ $key + 1 }}" class="flex gap-2 items-center">Witness Name:</label>
                                </div>
                                <input type="text" class="form-input" name="witness[]" id="witness_{{ $key + 1 }}" data-count="{{ $key + 1 }}" value="{{ $value->value }}">
                            </div>
                            <button type="button" class="btn-outline danger h-fit mt-auto" data-type="delete">Delete</button>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="form-input-container w-full">
                    <div class="flex flex-row">
                        <label for="witness_1" class="flex gap-2 items-center">Witness Name:</label>
                    </div>
                    <input type="text" class="form-input" name="witness[]" id="witness_1" data-count="1">
    
                    @error('witness')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>
    
        <button type="button" class="btn-outline mt-4 w-fit" data-type="add">Add</button>

        <div class="form-input-container">
            <label for="hearing">You are hereby commanded to appear before me on</label>
            <input class="form-input" type="datetime-local" name="hearing" id="hearing" value="{{ session()->has('editing_kp_form') ? date('Y-m-d H:i', strtotime($issuedKpForm->issuedKpFormFields->where('tag_id', 'hearing')->value('value'))) : '' }}">
            <label for="hearing">then and there to testify in the hearing of the above-captioned case.</label>
    
            @error('hearing')
                <p class="text-xs text-red-500 italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-kp-form-submit>

@vite('resources/js/dynamic_input.js')
