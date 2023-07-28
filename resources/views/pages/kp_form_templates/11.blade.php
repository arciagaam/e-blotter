<x-kp-form-submit>
    <div class="flex flex-col gap-2" data-type="input-container">
        @if (session()->has('editing_kp_form'))
            @foreach ($issuedKpForm->issuedKpFormFields->where('tag_id', 'lupon')->values() as $key => $value)
                @if ($key == 0)
                    <div class="form-input-container w-full">
                        <div class="flex flex-row">
                            <label for="lupon_{{$key + 1}}" class="flex gap-2 items-center">Lupon Name:</label>
                        </div>
                        <input type="text" class="form-input" name="lupon[]" id="lupon_{{$key + 1}}" data-count="{{ $key + 1 }}" value="{{ $value->value }}">

                        @error('lupon')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                @else
                    <div class="flex flex-row gap-2 lg:w-2/4">
                        <div class="form-input-container w-full">
                            <div class="flex flex-row">
                                <label for="lupon_{{ $key + 1 }}" class="flex gap-2 items-center">Lupon Name:</label>
                            </div>
                            <input type="text" class="form-input" name="lupon[]" id="lupon_{{ $key + 1 }}" data-count="{{ $key + 1 }}" value="{{ $value->value }}">
                        </div>
                        <button type="button" class="btn-outline danger h-fit mt-auto" data-type="delete">Delete</button>
                    </div>
                @endif
            @endforeach
        @else
            <div class="form-input-container w-full">
                <div class="flex flex-row">
                    <label for="lupon_1" class="flex gap-2 items-center">Lupon Name:</label>
                </div>
                <input type="text" class="form-input" name="lupon[]" id="lupon_1" data-count="1">

                @error('lupon')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
        @endif
    </div>

    <button type="button" class="btn-outline mt-4 w-fit" data-type="add">Add</button>

</x-kp-form-submit>

@vite('resources/js/dynamic_input.js')