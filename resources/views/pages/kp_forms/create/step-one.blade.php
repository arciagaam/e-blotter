<x-layout>

    <x-page-header>Issue KP Form</x-page-header>

    <div class="flex flex-col-reverse md:flex-row gap-4">
        <form class="w-full md:w-2/4 xl:w-3/4 flex flex-col justify-center items-center"
            action="{{ route('records.kp-forms.post.step-one') }}" id="kp-form" method="POST">
            @csrf

            <div class="flex flex-col gap-4 w-full">
                @foreach ($kpForms as $key => $kpForm)
                    @php
                        $state = '';
                        
                        if (isset($message['form_ids']) && collect($message['form_ids'])->contains($kpForm->number)) {
                            $state = 1;
                        } elseif ($issuedKpForms->contains($kpForm->number)) {
                            $state = 2;
                        }
                    @endphp
                    
                    <x-kp-form-select state="{{ $state }}" label="KP FORM #{{ $kpForm->number }}" name="kp_form_id"
                        value="{{ $kpForm->id }}" id="{{ $key }}">
                        <span>{{ $kpForm->name }}</span>
                    </x-kp-form-select>
                @endforeach
            </div>

            <input type="hidden" name="record_id" value="{{ $recordId }}">

        </form>

        <div class="w-full flex flex-col md:w-2/4 xl:w-1/4 lg:sticky lg:top-0 h-fit">
            <div class="flex flex-col h-fit border border-slate-400 bg-white rounded-md">
                <div class="flex flex-col border-b border-slate-400 p-4">
                    <ul>
                        <li class="flex flex-row items-center gap-2">
                            <span class="w-3 h-3 bg-slate-400 rounded-full"></span>
                            <span>Not Issued</span>
                        </li>
                        <li class="flex flex-row items-center gap-2">
                            <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                            <span>Issued</span>
                        </li>
                        <li class="flex flex-row items-center gap-2">
                            <span class="w-3 h-3 bg-emerald-500 rounded-full"></span>
                            <span>Recommended</span>
                        </li>
                        <li class="flex flex-row items-center gap-2">
                            <span class="w-3 h-3 bg-project-yellow-default rounded-full"></span>
                            <span>Selected</span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col border-b border-slate-400 p-4">
                    <p class="font-bold">Message</p>
                    <div class="flex flex-col">
                        <p>{{ $message['message'] ?? 'No message at the moment.' }}</p>
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <p class="font-bold">Recommendations</p>
                    <div class="flex flex-col">
                        <p>{{ $message['recommendations'] ?? 'No recommendations at the moment.' }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-end items-center gap-4 p-4">
                <a class="btn-plain" href="{{ route('records.show', ['record' => $recordId]) }}">Cancel</a>
                <button form="kp-form" class="btn-filled">Next</button>
            </div>
        </div>
    </div>

</x-layout>

@vite('resources/js/kp_form_select.js')