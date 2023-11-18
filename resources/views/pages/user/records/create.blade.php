<x-layout>
    <x-page-header>New Record</x-page-header>

    <div class="flex flex-col gap-3">
        <form action="{{ route('records.store') }}" method="POST" class="flex flex-col gap-5"
            enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col xl:flex-row gap-2 justify-between">
                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="blotter_number" class="flex gap-2 items-center">Blotter No.:</label>
                    </div>

                    <input class="form-input" type="text" name="blotter_number" id="blotter_number"
                        value="{{ $blotterNumber }}" disabled>
                </div>
                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="date" class="flex gap-2 items-center">Date:</label>
                    </div>

                    <input value="{{ date('F j, Y') }}" class="form-input" type="text" name="date" id="date"
                        disabled>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Assign to:</p>
                </div>

                <div class="flex flex-row gap-4">
                    <div class="flex flex-row gap-2">
                        <div class="flex flex-row">
                            <label for="barangay" class="flex gap-2 items-center">Barangay:</label>
                        </div>

                        <input class="form-input" type="text" name="barangay" id="barangay"
                            value="{{ auth()->user()->barangays[0]->name }}"
                            disabled>
                        @error('barangay')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="flex flex-row">
                            <label for="purok" class="flex gap-2 items-center">Purok:</label>
                        </div>

                        <input list="puroks" name="purok" id="purok" class="form-input">

                        <datalist id="puroks">
                            @foreach (auth()->user()->barangays[0]->puroks as $purok)
                                <option value="{{$purok->purok_number}}">{{$purok->name}}</option>

                            @endforeach
                        </datalist>

                        @error('purok')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Victim Information</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-2">

                    <div class="form-input-container col-span-2 xl:col-span-1">
                        <div class="flex flex-col xl:flex-row gap-2">
                            <div class="flex flex-col flex-1">
                                <div class="flex flex-row">
                                    <label for="victim_first_name" class="flex gap-2 items-center">First
                                        Name:</label>
                                </div>

                                <input class="form-input" type="text" name="victim[first_name]"
                                    id="victim_first_name" value="{{ old('victim.first_name') }}">
                                @error('victim.first_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col flex-1">
                                <div class="flex flex-row">
                                    <label for="victim_middle_name" class="flex gap-2 items-center">Middle
                                        Name:</label>
                                </div>
                                <input class="form-input" type="text" name="victim[middle_name]"
                                    id="victim_middle_name" value="{{ old('victim.middle_name') }}">
                                @error('victim.middle_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col flex-1">
                                <div class="flex flex-row">
                                    <label for="victim_last_name" class="flex gap-2 items-center">Last
                                        Name:</label>
                                </div>
                                <input class="form-input" type="text" name="victim[last_name]" id="victim_last_name"
                                    value="{{ old('victim.last_name') }}">
                                @error('victim.last_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_age" class="flex gap-2 items-center">Age:</label>
                        </div>

                        <input min=0 class="form-input" type="number" name="victim[age]" id="victim_age"
                            value="{{ old('victim.age') }}">
                        @error('victim.age')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container col-span-2 xl:col-span-1">
                        <div class="flex flex-row">
                            <label for="victim_sex" class="flex gap-2 items-center">Sex:</label>
                        </div>

                        {{-- <input class="form-input" type="text" name="victim_sex" id="victim_sex"> --}}
                        <select class="form-input" name="victim[sex]" id="victim_sex">
                            <option value="1" @selected(old('victim.sex') == 1)>Male</option>
                            <option value="2" @selected(old('victim.sex') == 2)>Female</option>
                        </select>
                        @error('victim.sex')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-container">
                        <div class="flex flex-row">
                            <label for="victim_contact_number" class="flex gap-2 items-center">Contact Number:</label>
                        </div>

                        <div
                            class="group flex items-center gap-2 border overflow-clip border-project-gray-default/30 rounded-md text-sm transition-all duration-300 ease-in-out font-normal focus-within:border-project-blue-default bg-white">
                            <span
                                class="group-focus-within:border-project-blue-default bg-gray-100 py-1 px-2 border-r border-r-project-gray-default/30">+63</span>
                            <input class="w-full focus-visible:outline-none" type="text" max="10"
                                name="victim[contact_number]" id="victim_contact_number"
                                value="{{ old('victim.contact_number') }}">
                        </div>

                        @error('victim.contact_number')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 col-span-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_purok" class="flex gap-2 items-center">Purok:</label>
                            </div>

                            <input class="form-input" type="text" name="victim[purok]" id="victim_purok"
                                value="{{ old('victim.purok') }}">
                            @error('victim.purok')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_barangay" class="flex gap-2 items-center">Barangay:</label>
                            </div>

                            <input class="form-input" type="text" name="victim[barangay]" id="victim_barangay"
                                value="{{ old('victim.barangay') ? old('victim.barangay') : auth()->user()->barangays[0]->name }}">
                            @error('victim.barangay')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_municipality" class="flex gap-2 items-center">Municipality:</label>
                            </div>

                            <input class="form-input" type="text" name="victim[municipality]"
                                id="victim_municipality"
                                value="{{ old('victim.municipality') ? old('victim.municipality') : 'Pila' }}">
                            @error('victim.municipality')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="victim_province" class="flex gap-2 items-center">Province:</label>
                            </div>

                            <input class="form-input" type="text" name="victim[province]" id="victim_province"
                                value="{{ old('victim.province') ? old('victim.province') : 'Laguna' }}">
                            @error('victim.province')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-input-container">
                    <div class="flex flex-row">
                        <label for="victim_civil_status" class="flex gap-2 items-center">Civil Status:</label>
                    </div>

                    <select class="form-input" name="victim[civil_status_id]" id="victim_civil_status">
                        @foreach ($civilStatus as $value)
                            <option value="{{ $value->id }}" @selected(old('victim.civil_status') == $value->id)>
                                {{ ucfirst($value->name) }}
                            </option>
                        @endforeach
                    </select>

                    @error('victim.civil_status_id')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Suspect Information</p>
                </div>

                <div class="flex flex-col gap-2">

                    <div class="flex flex-col xl:flex-row gap-2">
                        <div class="form-input-container flex-2">
                            <div class="flex flex-row gap-2">
                                <div class="flex flex-col flex-1">
                                    <div class="flex flex-row">
                                        <label for="suspect_first_name" class="flex gap-2 items-center">First
                                            Name:</label>
                                    </div>

                                    <input class="form-input" type="text" name="suspect[first_name]"
                                        id="suspect_first_name" value="{{ old('suspect.first_name') }}">
                                    @error('suspect.first_name')
                                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col flex-1">
                                    <div class="flex flex-row">
                                        <label for="suspect_middle_name" class="flex gap-2 items-center">Middle
                                            Name:</label>
                                    </div>
                                    <input class="form-input" type="text" name="suspect[middle_name]"
                                        id="suspect_middle_name" value="{{ old('suspect.middle_name') }}">
                                    @error('suspect.middle_name')
                                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col flex-1">
                                    <div class="flex flex-row">
                                        <label for="suspect_last_name" class="flex gap-2 items-center">Last
                                            Name:</label>
                                    </div>
                                    <input class="form-input" type="text" name="suspect[last_name]"
                                        id="suspect_last_name" value="{{ old('suspect.last_name') }}">
                                    @error('suspect.last_name')
                                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_sex" class="flex gap-2 items-center">Sex:</label>
                            </div>
                            <select class="form-input" name="suspect[sex]" id="suspect_sex">
                                <option value="1" @selected(old('suspect.sex') == 1)>Male</option>
                                <option value="2" @selected(old('suspect.sex') == 2)>Female</option>
                            </select>
                            @error('suspect.sex')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 col-span-2">
                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_barangay" class="flex gap-2 items-center">Barangay:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[barangay]" id="suspect_barangay"
                                value="{{ old('suspect.barangay') ? old('suspect.barangay') : auth()->user()->barangays[0]->name }}">
                            @error('suspect.barangay')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_municipality"
                                    class="flex gap-2 items-center">Municipality:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[municipality]"
                                id="suspect_municipality"
                                value="{{ old('suspect.municipality') ? old('suspect.municipality') : 'Pila' }}">
                            @error('suspect.municipality')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-input-container flex-1">
                            <div class="flex flex-row">
                                <label for="suspect_province" class="flex gap-2 items-center">Province:</label>
                            </div>

                            <input class="form-input" type="text" name="suspect[province]" id="suspect_province"
                                value="{{ old('suspect.province') ? old('suspect.province') : 'Laguna' }}">
                            @error('suspect.province')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input-container col-span-3">
                        <div class="flex flex-row">
                            <label for="case" class="flex gap-2 items-center">Nature of Incident:</label>
                        </div>

                        <input class="form-input" type="text" name="case" id="case" list="cases"
                            value="{{ old('case') }}">
                        @error('case')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Narrative</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input resize-none" name="narrative" id="narrative" cols="30" rows="5">{{ old('narrative') }}</textarea>
                        @error('narrative')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <button id="record" type="button"
                        class="disabled:bg-slate-400 flex justify-center items-center p-2 rounded-full bg-rose-600 text-white fill-white relative">
                        <box-icon id="record-state" class="bx bx-sm bx-microphone" name='microphone'></box-icon>
                    </button>
                    <p>Click on the microphone icon and start speaking.</p>

                    <input type="file" name="narrative_file" id="narrative_file" hidden accept="audio/*">
                    <audio id="recording" src="" controls></audio>
                    @error('narrative_file')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="border-b-2 border-project-gray-default ">
                    <p class="font-bold text-lg">Relief/s Be Granted</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="form-input-container">
                        <textarea class="form-input resize-none" name="reliefs" id="reliefs" cols="30" rows="5">{{ old('reliefs') }}</textarea>
                        @error('reliefs')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex self-end">
                <div class="flex flex-col ml-auto gap-2">
                    <button class="btn-outline danger" type="button" id="clear-input-btn">Clear</button>
                    <a href="{{ route('records.index') }}" class="btn-outline">Cancel</a>
                    <button class="btn-filled" type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>

</x-layout>

<datalist id="cases">
    <option value="Paglalathala at pamamahayag nang labag sa batas"></option>
    <option value="Mga pananakot at paninirang-puri"></option>
    <option value="Paggamit ng huwad na katibayan"></option>
    <option value="Paggamit ng hindi totoong pangalan at pagtatago ng totoong pangalan"></option>
    <option value="Paggamit ng mga uniporme at sagisag na labag sa batas"></option>
    <option value="Pinsala sa katawan dala ng marahas na pag-aaway"></option>
    <option value="Pagtulong sa naganap na pagpapatiwakal"></option>
    <option
        value="Pananagutan ng mga sangkot sa isang labanan kapag nagkaroon lang ng mga pinsala sa katawan o wala mang nangyaring pinsala">
    </option>
    <option value="Mga hindi gaanong malalang pinsala sa katawan"></option>
    <option value="Mga bahagyang pinsala sa katawan at pagmamalupit"></option>
    <option value="Pagdakip nang labag sa batas"></option>
    <option value="Paghimok sa isang menor de edad na lumayas sa kanyang tahanan"></option>
    <option value="Pag-iwan sa isang taong nasa panganib at pag-iwan sa isang naging biktima"></option>
    <option value="Pagpapabaya sa isang menor de edad (isang bata na mababa ang edad sa pitong (7) taong gulang)">
    </option>
    <option
        value="Pag-iwan ng mga taong pinagkatiwalaang magaalaga sa isang menor de edad; kawalan ng pagmamalasakit ng mga magulang">
    </option>
    <option value="Pagpasok sa isang tirahan nang walang pahintulot (hindi gumamit ng dahas at pananakot)"></option>
    <option value="Mga ibang anyo nang pagpasok na walang pahintulot"></option>
    <option value="Magaan na mga pagbabanta"></option>
    <option value="Iba pang magaan na pagbabanta"></option>
    <option value="Grabeng pamumuwersa"></option>
    <option value="Hindi grabeng pamumuwersa"></option>
    <option
        value="Iba pang katulad na pamumuwersa (sapilitang pagbili ng mga paninda at pagbabayad ng suweldo sa pamamagitan ng pagsingil ng utang na loob)">
    </option>
    <option
        value="Pagbubuo, pananatili at pagbabawal ng pagsasanib ng puhunan at lakas-paggawa sa pamamagitan ng dahas at pananakot">
    </option>
    <option value="Pag-alam ng lihim nang sapilitan at sa pamamagitan ng kasunduan"></option>
    <option value="Pagsisiwalat ng lihim nang mga pang-aabuso ng kapangyarihan"></option>
    <option value="Pagnanakaw (kung ang halaga ng ninakaw na ariarian ay hindi hihigit sa p50.00)"></option>
    <option value="Pagnanakaw (kung ang halaga ay hindi hihigit sa p500)"></option>
    <option value="Pagsakop ng mga tigil na ari-arian o sapilitang pagkuha ng karapatan sa ari-arian"></option>
    <option value="Paglilipat ng mga hangganan o muhon"></option>
    <option value="Pandaraya o panggagantso (kung ang halaga ay hindi hihigit sa p200.00)"></option>
    <option value="Iba pang anyo ng pandaraya"></option>
    <option value="Pandaraya sa isang menor de edad"></option>
    <option value="Iba pang panloloko"></option>
    <option value="Pagtanggal, pagbebenta o pagpeprenda ng nakasanlang pag-aari"></option>
    <option
        value="Mga kakaibang kaso ng panlolokong may masamang hangarin (kung ang halaga ng nasirang ari-arian ay hindi hihigit sa p1,000.00)">
    </option>
    <option value="Iba pang kalokohan (kung ang halaga ng nasirang ari-arian ay hindi hihigit sa p1,000.00)"></option>
    <option value="Simpleng panunulsol"></option>
    <option value="Paggawa ng kahalayan na mayroong pagsang-ayon na naagrabyadong partido"></option>
    <option value="Pagbanta na isisiwalat at alok na pagpigil sa pagsisiwalat na may kabayaran"></option>
    <option value="Pagpigil sa paglalathala ng mga gawaing tinutukoy sa panahon ng opisyal na proseso"></option>
    <option value="Pagdadawit sa mga inosenteng tao"></option>
    <option value="Mga pakana laban sa dangal"></option>
    <option value="Paglalabas ng tseke nang walang sapat na pondo"></option>
    <option value="Pagbili ng nakaw na ari-arian kung ang halaga ng ari-ariang sangkot ay hindi hihigit sa p50.00">
    </option>
</datalist>

@vite('resources/js/audio_record.js')
@vite('resources/js/clear.js')
