<x-layout>
    <x-page-header>Issued Certificates</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row gap-4">
            <x-nav-button url="{{ route('records.show', ['record' => $record]) }}">Details</x-nav-button>
            <x-nav-button url="{{ route('records.kp-forms.index', ['record' => $record]) }}">Issued Certificate
            </x-nav-button>
        </div>

        <div class="flex flex-col-reverse lg:flex-row gap-4">
            <div class="flex flex-col gap-4 w-full lg:w-3/4">
                @if (!count($issuedKpForms))
                    <div
                        class='flex flex-row text-center w-full min-w-[16rem] p-4 border border-slate-400 bg-gray-200 rounded-md'>
                        <p>No KP Form issued.</p>
                    </div>
                @else
                    @foreach ($issuedKpForms as $key => $form)
                        @switch($form)
                            @case(collect($form)->has('kp_form_id'))
                                <div
                                    class='flex flex-row items-center w-full min-w-[16rem] p-4 border border-slate-400 bg-white rounded-md'>
                                    <label class="flex flex-col gap-2 w-full">
                                        <span class="font-bold flex flex-row items-center gap-4">
                                            KP FORM #{{ $form->kpForm->number }}
                                            <span class="font-normal text-sm text-gray-400">Issued at
                                                {{ date('F j, Y', strtotime($form->created_at)) }}</span>
                                        </span>
                                        <span>{{ $form->kpForm->name }}</span>
                                    </label>
                                    <div class="flex flex-row gap-2">
                                        <a class="btn-outline success" target="_blank"
                                            href="{{ route('records.kp-forms.show', ['recordId' => $record, 'issuedKpFormId' => $form->id]) }}">Print</a>
                                        <a class="btn-outline"
                                            href="{{ route('records.kp-forms.edit', ['recordId' => $record, 'issuedKpFormId' => $form->id]) }}">Edit</a>
                                        <button data-target="#delete" data-form-record-id="{{ $record }}"
                                            data-form-issued-kp-form-id="{{ $form->id }}"
                                            class="btn-outline danger">Delete</button>
                                    </div>
                                </div>
                            @break

                            @case(collect($form)->has('path'))
                                <div
                                    class='flex flex-row items-center w-full min-w-[16rem] p-4 border border-slate-400 bg-white rounded-md'>
                                    <label class="flex flex-col gap-2 w-full">
                                        <span class="font-bold flex flex-row items-center gap-4">
                                            {{ $form->name }}
                                            <span class="font-normal text-sm text-gray-400">Issued at
                                                {{ date('F j, Y', strtotime($form->created_at)) }}</span>
                                        </span>
                                        <span>Uploaded document.</span>
                                    </label>
                                    <div class="flex flex-row gap-2">
                                        <a class="btn-outline success" target="_blank"
                                            href="{{ route('records.kp-forms.file.show', ['recordId' => $record, 'issuedKpFormId' => $form->id]) }}">Print</a>
                                        <button data-target="#delete-file" data-form-record-id="{{ $record }}"
                                            data-form-issued-kp-form-id="{{ $form->id }}"
                                            class="btn-outline danger">Delete</button>
                                    </div>
                                </div>
                            @break

                            @default
                        @endswitch
                    @endforeach
                @endif
            </div>

            <div class="flex flex-col w-full lg:w-1/4 gap-4">
                <div class="h-fit border border-slate-400 bg-white rounded-md">
                    <div class="flex flex-col border-b border-slate-400 p-4">
                        <p class="font-bold">Message</p>
                        <div class="flex flex-col">
                            <p>{{ $message['message'] ?? 'No message at the moment.' }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col p-4">
                        <p class="font-bold">Recommendations</p>
                        <div class="flex flex-col">
                            @if (array_key_exists('recommendations', $message) && is_array($message['recommendations']))
                                <ul class="list-disc list-inside">
                                    @foreach ($message['recommendations'] as $value)
                                        <li>{{ $value }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ $message['recommendations'] ?? 'No recommendations at the moment.' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('records.kp-forms.get.step-one', ['id' => $record]) }}" class="btn-filled"
                    data-target="#print" type="button">Issue KP Form</a>
            </div>
        </div>
    </div>

</x-layout>

<x-modal id="delete">
    <x-slot:heading>
        Delete Issued KP Form
    </x-slot:heading>

    <form action="#" method="POST" id="delete-kp-form"
        data-action="{{ route('records.kp-forms.destroy', ['recordId' => ':recordid', 'issuedKpFormId' => ':issuedkpformid']) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this KP Form?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled danger" form="delete-kp-form">Delete</button>
    </x-slot:footer>
</x-modal>

<x-modal id="delete-file">
    <x-slot:heading>
        Delete Uploaded KP Form
    </x-slot:heading>

    <form action="#" method="POST" id="delete-kp-form-file"
        data-action="{{ route('records.kp-forms.file.destroy', ['recordId' => ':recordid', 'issuedKpFormId' => ':issuedkpformid']) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this KP Form?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled danger" form="delete-kp-form-file">Delete</button>
    </x-slot:footer>
</x-modal>
