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
                @if(!count($issuedKpForms))
                    <div class='flex flex-row text-center w-full min-w-[16rem] p-4 border border-slate-400 bg-gray-200 rounded-md'>
                        <p>No KP Form issued.</p>
                    </div>
                @else
                    @foreach ($issuedKpForms as $key => $form)
                        <div class='flex flex-row items-center w-full min-w-[16rem] p-4 border border-slate-400 bg-white rounded-md'>
                            <label class="flex flex-col gap-2 w-full">
                                <span class="font-bold flex flex-row items-center gap-4">
                                    KP FORM #{{ $form->kpForm->number }}
                                    <span class="font-normal text-sm text-gray-400">Issued at {{ date('F j, Y', strtotime($form->created_at)) }}</span>
                                </span>
                                <span>{{ $form->kpForm->name }}</span>
                            </label>
                            <a class="btn-outline" target="_blank"
                                href="{{ route('records.kp-forms.show', ['recordId' => $record, 'issuedKpFormId' => $form->id]) }}">Print</a>
                        </div>
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
                            <p>{{ $message['recommendations'] ?? 'No recommendations at the moment.' }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('records.kp-forms.get.step-one', ['id' => $record]) }}" class="btn-filled" data-target="#print" type="button">Issue KP Form</a>
            </div>
        </div>


        {{-- <div class="w-full flex">
                {{$records->links()}}
            </div> --}}
    </div>

</x-layout>
